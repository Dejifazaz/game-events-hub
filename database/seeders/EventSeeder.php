<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure there are users to assign events to
        if (User::count() === 0) {
            User::factory()->count(5)->create();
        }

        // Create a mix of different football event types
        $categories = ['league_match', 'cup_match', 'friendly', 'training', 'tournament'];
        
        // Create 3 events of each category for a good mix
        foreach ($categories as $category) {
            Event::factory()->count(3)->create(['category' => $category]);
        }
        
        // Create a few additional random events
        Event::factory()->count(5)->create();
    }
}
