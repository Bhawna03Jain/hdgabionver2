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
                'name' => 'weight_per_unit',
                'value' => '0.000986',
                'product_id' => 1, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'unit_price',
                'value' => '1',
                'product_id' => 1, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'code',
                'value' => 'rods',
                'product_id' => 1, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'weight_per_unit',
                'value' => '0.004706',
                'product_id' => 2, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'unit_price',
                'value' => '1',
                'product_id' => 2, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'code',
                'value' => 'channels',
                'product_id' => 2, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'weight_per_unit',
                'value' => '0.004706',
                'product_id' => 3, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'unit_price',
                'value' => '1',
                'product_id' => 3, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'code',
                'value' => 'poles_on_c',
                'product_id' => 3, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'weight_per_unit',
                'value' => '0.004706',
                'product_id' => 4, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'unit_price',
                'value' => '1',
                'product_id' => 4, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'code',
                'value' => 'base_plate_on_c',
                'product_id' => 4, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'weight_per_unit',
                'value' => '0.004706',
                'product_id' => 5, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'unit_price',
                'value' => '1',
                'product_id' => 5, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'code',
                'value' => 'poles_in_c',
                'product_id' => 5, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'weight_per_unit',
                'value' => '0.004706',
                'product_id' => 6, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'unit_price',
                'value' => '1',
                'product_id' => 6, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'code',
                'value' => 'polecovers',
                'product_id' => 6, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'weight_per_unit',
                'value' => '0.004706',
                'product_id' => 7, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'unit_price',
                'value' => '1',
                'product_id' => 7, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'code',
                'value' => 'brackets',
                'product_id' => 7, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'weight_per_unit',
                'value' => '0.004706',
                'product_id' => 8, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'unit_price',
                'value' => '1',
                'product_id' => 8, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'code',
                'value' => 'spacers',
                'product_id' => 8, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'weight_per_unit',
                'value' => '0.004706',
                'product_id' => 9, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'unit_price',
                'value' => '1',
                'product_id' => 9, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'code',
                'value' => 'carriage_bolts_and_nuts_M6x25',
                'product_id' => 9, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'weight_per_unit',
                'value' => '0.004706',
                'product_id' => 10, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'unit_price',
                'value' => '1',
                'product_id' => 10, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'code',
                'value' => 'bolts_for_brackets_M6x30',
                'product_id' => 10, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'weight_per_unit',
                'value' => '0.004706',
                'product_id' => 11, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'unit_price',
                'value' => '1',
                'product_id' => 11, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'code',
                'value' => 'spirals',
                'product_id' => 11, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'unit_price',
                'value' => '1',
                'product_id' => 12, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'no',
                'value' => '1',
                'product_id' => 12, // Replace with an existing product ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
