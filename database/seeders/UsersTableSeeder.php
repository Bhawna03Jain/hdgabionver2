<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'user@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345'), // Hash the password
                'status' => 1, // Active
                'address' => '123 Main St, Springfield',
                'country' => 'USA',
                'state' => 'Illinois',
                'mobile' => '1234567890',
                'image' => 'john_image.jpg', // Or null if not available
                'remember_token' => Str::random(10), // Generate random token
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
