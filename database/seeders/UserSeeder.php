<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Specific User
        \App\Models\User::insert([
            'name' => 'Full Name',
            'email' => 'email@domain.com',
            'email_verified_at' => now(),
            'user_role' => 'admin',
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);

        // Randomly 100 users
        \App\Models\User::factory(100)->create();
    }
}
