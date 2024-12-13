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
                'parent_id' => 1,
                'code' => 'basket_materials',
                'category_name' => 'Basket Materials',
                'category_image' => '',
                'description' => 'Latest Basket Parts',
                'url' => 'basket-materials',
                'meta_title' => 'Basket Materials Category',
                'meta_description' => 'Explore the latest Basket Materials.',
                'meta_keywords' => 'Basket Materials',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => null,
                'code' => 'fences',
                'category_name' => 'Fences',
                'category_image' => '',
                'description' => 'Latest trends in fences',
                'url' => 'fences',
                'meta_title' => 'Fences Category',
                'meta_description' => 'Trendy and stylish fences.',
                'meta_keywords' => 'fences',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 3,
                'code' => 'fence_materials',
                'category_name' => 'Fence Materials',
                'category_image' => '',
                'description' => 'Latest Fence Parts',
                'url' => 'fence-materials',
                'meta_title' => 'Fence Materials Category',
                'meta_description' => 'Explore the latest Fence Materials.',
                'meta_keywords' => 'Fence Materials',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
