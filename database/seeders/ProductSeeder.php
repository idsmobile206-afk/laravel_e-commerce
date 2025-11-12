<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
    ->count(5) // 5 categories: Men, Women, Kids, Accessories, Shoes
    ->create()
    ->each(function ($category) {
        Product::factory()
            ->count(10) // 10 products per category
            ->create(['category_id' => $category->id]);
    });
    }
}
