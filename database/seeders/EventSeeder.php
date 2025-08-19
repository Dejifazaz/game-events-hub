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

        // Create a mix of different football event types using specific factory states
        Event::factory()->leagueMatch()->count(3)->create();
        Event::factory()->cupMatch()->count(3)->create();
        Event::factory()->friendly()->count(3)->create();
        Event::factory()->training()->count(3)->create();
        Event::factory()->tournament()->count(3)->create();
        
        // Create a few additional random events
        Event::factory()->count(5)->create();
    }
}
