<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class EventTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $admin;
    protected $event;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create test users
        $this->user = User::factory()->create(['role' => 'user']);
        $this->admin = User::factory()->create(['role' => 'admin']);
        
        // Create a test event
        $this->event = Event::factory()->create([
            'user_id' => $this->user->id,
            'approved' => true
        ]);
    }

    /** @test */
    public function guests_can_view_events_index()
    {
        $response = $this->get('/events');
        
        $response->assertStatus(200);
        $response->assertViewIs('events.index');
        $response->assertViewHas('events');
    }

    /** @test */
    public function guests_can_view_approved_events()
    {
        $approvedEvent = Event::factory()->create(['approved' => true]);
        $unapprovedEvent = Event::factory()->create(['approved' => false]);
        
        $response = $this->get('/events');
        
        $response->assertSee($approvedEvent->title);
        $response->assertDontSee($unapprovedEvent->title);
    }

    /** @test */
    public function guests_can_view_individual_approved_events()
    {
        $event = Event::factory()->create(['approved' => true]);
        
        $response = $this->get("/events/{$event->id}");
        
        $response->assertStatus(200);
        $response->assertViewIs('events.show');
        $response->assertSee($event->title);
    }

    /** @test */
    public function guests_cannot_access_unapproved_events()
    {
        $event = Event::factory()->create(['approved' => false]);
        
        $response = $this->get("/events/{$event->id}");
        
        $response->assertStatus(403);
    }

    /** @test */
    public function authenticated_users_can_create_events()
    {
        $this->actingAs($this->user);
        
        $eventData = [
            'title' => 'Test Event',
            'description' => 'Test Description',
            'date' => '2025-12-25 18:00:00',
            'location' => 'Test Location',
            'capacity' => 100
        ];
        
        $response = $this->post('/events', $eventData);
        
        $response->assertRedirect('/events');
        $this->assertDatabaseHas('events', [
            'title' => 'Test Event',
            'user_id' => $this->user->id,
            'approved' => false // Non-admin events are not auto-approved
        ]);
    }

    /** @test */
    public function admin_events_are_automatically_approved()
    {
        $this->actingAs($this->admin);
        
        $eventData = [
            'title' => 'Admin Event',
            'description' => 'Admin Description',
            'date' => '2025-12-25 18:00:00',
            'location' => 'Admin Location',
            'capacity' => 100
        ];
        
        $response = $this->post('/events', $eventData);
        
        $response->assertRedirect('/events');
        $this->assertDatabaseHas('events', [
            'title' => 'Admin Event',
            'user_id' => $this->admin->id,
            'approved' => true // Admin events are auto-approved
        ]);
    }

    /** @test */
    public function users_can_edit_their_own_events()
    {
        $this->actingAs($this->user);
        $event = Event::factory()->create(['user_id' => $this->user->id]);
        
        $response = $this->get("/events/{$event->id}/edit");
        
        $response->assertStatus(200);
        $response->assertViewIs('events.edit');
    }

    /** @test */
    public function users_cannot_edit_others_events()
    {
        $this->actingAs($this->user);
        $otherEvent = Event::factory()->create(['user_id' => $this->admin->id]);
        
        $response = $this->get("/events/{$otherEvent->id}/edit");
        
        $response->assertStatus(403);
    }

    /** @test */
    public function users_can_update_their_own_events()
    {
        $this->actingAs($this->user);
        $event = Event::factory()->create(['user_id' => $this->user->id]);
        
        $updateData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'date' => '2025-12-26 19:00:00',
            'location' => 'Updated Location',
            'capacity' => 150
        ];
        
        $response = $this->put("/events/{$event->id}", $updateData);
        
        $response->assertRedirect('/events');
        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'title' => 'Updated Title'
        ]);
    }

    /** @test */
    public function users_can_delete_their_own_events()
    {
        $this->actingAs($this->user);
        $event = Event::factory()->create(['user_id' => $this->user->id]);
        
        $response = $this->delete("/events/{$event->id}");
        
        $response->assertRedirect('/events');
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }

    /** @test */
    public function admins_can_approve_events()
    {
        $this->actingAs($this->admin);
        $unapprovedEvent = Event::factory()->create(['approved' => false]);
        
        $response = $this->patch("/admin/events/{$unapprovedEvent->id}/approve");
        
        $response->assertRedirect('/admin/events/pending');
        $this->assertDatabaseHas('events', [
            'id' => $unapprovedEvent->id,
            'approved' => true
        ]);
    }

    /** @test */
    public function admins_can_view_pending_events()
    {
        $this->actingAs($this->admin);
        Event::factory()->create(['approved' => false]);
        
        $response = $this->get('/admin/events/pending');
        
        $response->assertStatus(200);
        $response->assertViewIs('admin.pending');
    }

    /** @test */
    public function admins_can_view_all_events_in_main_list()
    {
        $this->actingAs($this->admin);
        $approvedEvent = Event::factory()->create(['approved' => true]);
        $unapprovedEvent = Event::factory()->create(['approved' => false]);
        
        $response = $this->get('/events');
        
        $response->assertSee($approvedEvent->title);
        $response->assertSee($unapprovedEvent->title);
    }

    /** @test */
    public function search_functionality_works()
    {
        $event1 = Event::factory()->create(['title' => 'Football Match', 'approved' => true]);
        $event2 = Event::factory()->create(['title' => 'Concert', 'approved' => true]);
        
        $response = $this->get('/events?search=Football');
        
        $response->assertSee($event1->title);
        $response->assertDontSee($event2->title);
    }

    /** @test */
    public function location_filter_works()
    {
        $event1 = Event::factory()->create(['location' => 'Stadium A', 'approved' => true]);
        $event2 = Event::factory()->create(['location' => 'Stadium B', 'approved' => true]);
        
        $response = $this->get('/events?location=Stadium+A');
        
        $response->assertSee($event1->title);
        $response->assertDontSee($event2->title);
    }

    /** @test */
    public function event_creation_requires_validation()
    {
        $this->actingAs($this->user);
        
        $response = $this->post('/events', []);
        
        $response->assertSessionHasErrors(['title', 'description', 'date', 'location', 'capacity']);
    }

    /** @test */
    public function image_upload_works()
    {
        Storage::fake('public');
        
        $this->actingAs($this->user);
        
        $file = UploadedFile::fake()->image('event.jpg');
        
        $eventData = [
            'title' => 'Test Event',
            'description' => 'Test Description',
            'date' => '2025-12-25 18:00:00',
            'location' => 'Test Location',
            'capacity' => 100,
            'image' => $file
        ];
        
        $response = $this->post('/events', $eventData);
        
        $response->assertRedirect('/events');
        $this->assertDatabaseHas('events', [
            'title' => 'Test Event',
            'image' => 'events/' . $file->hashName()
        ]);
        
        Storage::disk('public')->assertExists('events/' . $file->hashName());
    }

    /** @test */
    public function home_redirects_to_events()
    {
        $response = $this->get('/');
        
        $response->assertRedirect('/events');
    }
}
