<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // php artisan db:seed --class=AdminsTableSeeder
        DB::table('admins')->insert([
            [
                'name' => 'Admin',
                'type' => 'admin',
                'mobile' => '1234567890',
                'email' => 'admin@hd-gabion.eu',
                'address' => '123 Main St, Springfield',
                'password' => Hash::make('12345'), // Hash the password
                'image' => '', // or null if not available
                'status' => 1, // Active
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
