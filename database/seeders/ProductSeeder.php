<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\ProductType;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $brands = Brand::pluck('id')->toArray();
        $categories = Category::with('productTypes')->get();
        $genders = Gender::pluck('id')->toArray();

        $faker = \Faker\Factory::create();

        foreach ($categories as $category) {
            foreach ($category->productTypes as $type) {

                // Create 2 products for each product type
                for ($i = 0; $i < 2; $i++) {

                    Product::create([
                        'name' => $type->name . ' ' . Str::random(5),
                        'description' => $faker->paragraph(),
                        'price' => rand(100, 900) + (rand(0, 99) / 100),

                        'brand_id' => $faker->randomElement($brands),
                        'category_id' => $category->id,
                        'gender_id' => $faker->randomElement($genders),
                        'product_type_id' => $type->id,
                    ]);
                }
            }
        }
    }
}
