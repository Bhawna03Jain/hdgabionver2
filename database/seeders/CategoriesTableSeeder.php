<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([

            [
                'parent_id' => null,
                'code' => 'parts',
                'category_name' => 'Parts',
                'category_image' => '',
                'description' => ' Parts',
                'url' => 'parts',
                'meta_title' => 'Basket Materials Category',
                'meta_description' => 'Explore the latest Parts.',
                'meta_keywords' => 'Parts',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => null,
                'code' => 'baskets',
                'category_name' => 'Baskets',
                'category_image' => '',
                'description' => 'All Basket items',
                'url' => 'baskets',
                'meta_title' => 'Gabion Basket Category',
                'meta_description' => 'Find the latest Gabion Baskets here.',
                'meta_keywords' => 'gabion Baskets',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => null,
                'code' => 'fences',
                'category_name' => 'Fences',
                'category_image' => '',
                'description' => 'Latest trends',
                'url' => 'fences',
                'meta_title' => 'Fences Category',
                'meta_description' => 'Trendy and stylish.',
                'meta_keywords' => 'others',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => null,
                'code' => 'others',
                'category_name' => 'Others',
                'category_image' => '',
                'description' => 'Latest trends',
                'url' => 'others',
                'meta_title' => 'Fences Category',
                'meta_description' => 'Trendy and stylish.',
                'meta_keywords' => 'others',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
