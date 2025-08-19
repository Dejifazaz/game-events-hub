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

        // Only generate stadium-based football events with images
        Event::factory()->count(15)->create();
    }
}
