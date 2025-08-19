<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $user;
    protected $event;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->admin = User::factory()->create(['role' => 'admin']);
        $this->user = User::factory()->create(['role' => 'user']);
        $this->event = Event::factory()->create([
            'user_id' => $this->user->id,
            'approved' => false
        ]);
    }

    /** @test */
    public function admin_can_view_dashboard()
    {
        $this->actingAs($this->admin);
        
        $response = $this->get('/admin/dashboard');
        
        $response->assertStatus(200);
        $response->assertViewIs('admin.dashboard');
        $response->assertViewHas('pendingCount');
        $response->assertViewHas('recentEvents');
    }

    /** @test */
    public function admin_can_view_pending_events()
    {
        $this->actingAs($this->admin);
        
        $response = $this->get('/admin/events/pending');
        
        $response->assertStatus(200);
        $response->assertViewIs('admin.pending');
        $response->assertSee($this->event->title);
    }

    /** @test */
    public function admin_can_approve_events()
    {
        $this->actingAs($this->admin);
        
        $response = $this->patch("/admin/events/{$this->event->id}/approve");
        
        $response->assertRedirect('/admin/events/pending');
        $this->assertDatabaseHas('events', [
            'id' => $this->event->id,
            'approved' => true
        ]);
    }

    /** @test */
    public function admin_can_decline_events()
    {
        $this->actingAs($this->admin);
        
        $response = $this->patch("/admin/events/{$this->event->id}/decline");
        
        $response->assertRedirect('/admin/events/pending');
        $this->assertDatabaseMissing('events', [
            'id' => $this->event->id
        ]);
    }

    /** @test */
    public function admin_can_view_all_users()
    {
        $this->actingAs($this->admin);
        
        $response = $this->get('/admin/users');
        
        $response->assertStatus(200);
        $response->assertViewIs('admin.users.index');
        $response->assertSee($this->user->name);
        $response->assertSee($this->admin->name);
    }

    /** @test */
    public function admin_can_edit_users()
    {
        $this->actingAs($this->admin);
        
        $response = $this->get("/admin/users/{$this->user->id}/edit");
        
        $response->assertStatus(200);
        $response->assertViewIs('admin.users.edit');
        $response->assertSee($this->user->name);
    }

    /** @test */
    public function admin_can_update_user_roles()
    {
        $this->actingAs($this->admin);
        
        $updateData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'role' => 'admin'
        ];
        
        $response = $this->put("/admin/users/{$this->user->id}", $updateData);
        
        $response->assertRedirect('/admin/users');
        
        // Refresh the user from database to get updated data
        $this->user->refresh();
        
        $this->assertDatabaseHas('users', [
            'id' => $this->user->id,
            'name' => 'Updated Name',
            'role' => 'admin'
        ]);
    }

    /** @test */
    public function admin_can_view_their_own_events()
    {
        $this->actingAs($this->admin);
        
        $adminEvent = Event::factory()->create([
            'user_id' => $this->admin->id,
            'approved' => true
        ]);
        
        $response = $this->get('/admin/my-events');
        
        $response->assertStatus(200);
        $response->assertViewIs('admin.my-events');
        $response->assertSee($adminEvent->title);
    }

    /** @test */
    public function admin_can_see_pending_count_on_dashboard()
    {
        $this->actingAs($this->admin);
        
        // Create additional pending events
        Event::factory()->count(3)->create(['approved' => false]);
        
        $response = $this->get('/admin/dashboard');
        
        $response->assertStatus(200);
        $response->assertViewHas('pendingCount', 4); // 3 new + 1 from setUp
    }

    /** @test */
    public function admin_can_see_recent_events_on_dashboard()
    {
        $this->actingAs($this->admin);
        
        $recentEvent = Event::factory()->create([
            'title' => 'Recent Event',
            'approved' => true
        ]);
        
        $response = $this->get('/admin/dashboard');
        
        $response->assertStatus(200);
        $response->assertViewHas('recentEvents');
        $response->assertSee('Recent Event');
    }

    /** @test */
    public function non_admin_cannot_access_admin_routes()
    {
        $this->actingAs($this->user);
        
        $response = $this->get('/admin/dashboard');
        $response->assertStatus(403);
        
        $response = $this->get('/admin/events/pending');
        $response->assertStatus(403);
        
        $response = $this->get('/admin/users');
        $response->assertStatus(403);
    }

    /** @test */
    public function admin_can_see_approve_button_for_pending_events()
    {
        $this->actingAs($this->admin);
        
        $response = $this->get('/admin/events/pending');
        
        $response->assertStatus(200);
        $response->assertSee('Approve');
    }

    /** @test */
    public function admin_can_see_all_events_in_main_list()
    {
        $this->actingAs($this->admin);
        
        $approvedEvent = Event::factory()->create(['approved' => true]);
        $unapprovedEvent = Event::factory()->create(['approved' => false]);
        
        $response = $this->get('/events');
        
        $response->assertStatus(200);
        $response->assertSee($approvedEvent->title);
        $response->assertSee($unapprovedEvent->title);
    }

    /** @test */
    public function admin_events_are_automatically_approved()
    {
        $this->actingAs($this->admin);
        
        $eventData = [
            'title' => 'Admin Created Event',
            'description' => 'Description',
            'date' => '2025-12-25 18:00:00',
            'location' => 'Location',
            'capacity' => 100
        ];
        
        $response = $this->post('/events', $eventData);
        
        $response->assertRedirect('/events');
        $this->assertDatabaseHas('events', [
            'title' => 'Admin Created Event',
            'user_id' => $this->admin->id,
            'approved' => true
        ]);
    }
}
