<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create one admin user if it doesn't already exist
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'admin',
                'remember_token' => Str::random(10),
            ]
        );

        // Create 5 normal users each with 3 events
        User::factory(5)->create()->each(function ($user) {
            Event::factory(3)->create([
                'user_id' => $user->id,
                'approved' => false,
            ]);
        });

        // Create 3 approved events for the admin
        Event::factory(3)->create([
            'user_id' => $admin->id,
            'approved' => true,
        ]);
    }
}
