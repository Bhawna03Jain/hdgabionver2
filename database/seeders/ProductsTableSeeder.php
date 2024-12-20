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
                'category_id' => 1, // Replace with an existing category ID
                'article_no' => '1000001',
                'hs_code' => '',
                'sku' => '1000001',
                'name' => 'Rods',
                'total_price' => 99.99,
                'stock' => 50,
                'is_active' => true,
                 'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'category_id' => 1, // Replace with an existing category ID
                'article_no' => '1000002',
                'hs_code' => '',
                'sku' => '1000002',
                'name' => 'Channels',
                'total_price' => 99.99,
                'stock' => 50,
                'is_active' => true,
                 'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'category_id' => 1, // Replace with an existing category ID
                'article_no' => '1000003',
                'hs_code' => '',
                'sku' => '1000003',
                'name' => 'Poles ( On C)',
                'total_price' => 99.99,
                'stock' => 50,
                'is_active' => true,
                 'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'category_id' => 1, // Replace with an existing category ID
                'article_no' => '1000004',
                'hs_code' => '',
                'sku' => '1000004',
                'name' => 'Base Plate (On C)',
                'total_price' => 99.99,
                'stock' => 50,
                'is_active' => true,
                 'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'category_id' => 1, // Replace with an existing category ID
                'article_no' => '1000005',
                'hs_code' => '',
                'sku' => '1000005',
                'name' => 'Poles ( In C)',
                'total_price' => 99.99,
                'stock' => 50,
                'is_active' => true,
                 'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'category_id' => 1, // Replace with an existing category ID
                'article_no' => '1000006',
                'hs_code' => '',
                'sku' => '1000006',
                'name' => 'Polecovers',
                'total_price' => 99.99,
                'stock' => 50,
                'is_active' => true,
                 'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'category_id' => 1, // Replace with an existing category ID
                'article_no' => '1000007',
                'hs_code' => '',
                'sku' => '1000007',
                'name' => 'Brackets',
                'total_price' => 99.99,
                'stock' => 50,
                'is_active' => true,
                 'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'category_id' => 1, // Replace with an existing category ID
                'article_no' => '1000008',
                'hs_code' => '',
                'sku' => '1000008',
                'name' => 'Spacers',
                'total_price' => 99.99,
                'stock' => 50,
                'is_active' => true,
                 'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'category_id' => 1, // Replace with an existing category ID
                'article_no' => '1000009',
                'hs_code' => '',
                'sku' => '1000009',
                'name' => 'Carriage Bolts and Nuts M6 x 25',
                'total_price' => 99.99,
                'stock' => 50,
                'is_active' => true,
                 'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'category_id' => 1, // Replace with an existing category ID
                'article_no' => '1000010',
                'hs_code' => '',
                'sku' => '1000010',
                'name' => 'Bolts for Brackets M6 x 30',
                'total_price' => 99.99,
                'stock' => 50,
                'is_active' => true,
                 'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //    'category_id' => 1, // Replace with an existing category ID
            //     'article_no' => '1000011',
            //     'hs_code' => '',
            //     'sku' => '1000011',
            //     'name' => 'Rods-4mm',
            //     'total_price' => 99.99,
            //     'stock' => 50,
            //     'is_active' => true,
            //      'main_image' => 'images/products/main_image.jpg',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //    'category_id' => 1, // Replace with an existing category ID
            //     'article_no' => '1000012',
            //     'hs_code' => '',
            //     'sku' => '1000012',
            //     'name' => 'Rods-4mm',
            //     'total_price' => 99.99,
            //     'stock' => 50,
            //     'is_active' => true,
            //      'main_image' => 'images/products/main_image.jpg',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //    'category_id' => 1, // Replace with an existing category ID
            //     'article_no' => '1000013',
            //     'hs_code' => '',
            //     'sku' => '1000013',
            //     'name' => 'Rods-4mm',
            //     'total_price' => 99.99,
            //     'stock' => 50,
            //     'is_active' => true,
            //      'main_image' => 'images/products/main_image.jpg',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //    'category_id' => 1, // Replace with an existing category ID
            //     'article_no' => '1000014',
            //     'hs_code' => '',
            //     'sku' => '1000014',
            //     'name' => 'Rods-4mm',
            //     'total_price' => 99.99,
            //     'stock' => 50,
            //     'is_active' => true,
            //      'main_image' => 'images/products/main_image.jpg',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //    'category_id' => 1, // Replace with an existing category ID
            //     'article_no' => '1000015',
            //     'hs_code' => '',
            //     'sku' => '1000015',
            //     'name' => 'Rods-4mm',
            //     'total_price' => 99.99,
            //     'stock' => 50,
            //     'is_active' => true,
            //      'main_image' => 'images/products/main_image.jpg',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //    'category_id' => 1, // Replace with an existing category ID
            //     'article_no' => '1000016',
            //     'hs_code' => '',
            //     'sku' => '1000016',
            //     'name' => 'Rods-4mm',
            //     'total_price' => 99.99,
            //     'stock' => 50,
            //     'is_active' => true,
            //      'main_image' => 'images/products/main_image.jpg',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
               'category_id' => 1, // Replace with an existing category ID
                'article_no' => '1000011',
                'hs_code' => '',
                'sku' => '1000011',
                'name' => 'Spirals',
                 'total_price' => 99.99,
                 'stock' => 50,
                'is_active' => true,
                 'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
               'category_id' => 1, // Replace with an existing category ID
                'article_no' => '1000012',
                'hs_code' => '',
                'sku' => '1000018',
                'name' => 'part1',
                'total_price' => 99.99,
               'stock' => 50,
                'is_active' => true,
                 'main_image' => 'images/products/main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
