<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Example: create 5 categories each with 10 products
        Product::factory()->count(30)->create();

    }
}
