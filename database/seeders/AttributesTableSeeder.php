<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attributes')->insert([
            [
                'name' => 'length',
                'value' => '',
                'product_id' => 1, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'depth',
                'value' => '',
                'product_id' => 1, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'height',
                'value' => '',
                'product_id' => 1, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'maze',
                'value' => '',
                'product_id' => 1, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
