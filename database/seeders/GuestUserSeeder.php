<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class GuestUserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'guest@example.com'],
            [
                'name' => 'Guest User',
                'password' => bcrypt('guestpassword'), // unused
                'role' => 'guest',
            ]
        );
    }
}
