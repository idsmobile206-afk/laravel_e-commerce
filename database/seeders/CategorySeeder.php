<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Tops'],
            ['name' => 'Bottoms'],
            ['name' => 'Outerwear'],
            ['name' => 'Shoes'],
            ['name' => 'Accessories'],
            ['name' => 'Dresses'],
            ['name' => 'Underwear'],
            ['name' => 'Sportswear'],
        ];

        Category::insert($categories);
    }
}
