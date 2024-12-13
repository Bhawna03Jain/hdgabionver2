<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'description' => 'Description for Product 1',
                'price' => 99.99,
                'stock' => 50,
                'is_active' => true,
                'category_id' => 1, // Replace with an existing category ID
                'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for Product 2',
                'price' => 149.99,
                'stock' => 30,
                'is_active' => true,
                'category_id' => 1, // Replace with an existing category ID
                'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
