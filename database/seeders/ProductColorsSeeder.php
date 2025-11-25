<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Color;
use App\Models\ProductColor;

class ProductColorsSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $colors = Color::all();

        if ($products->isEmpty() || $colors->isEmpty()) {
            return;
        }

        foreach ($products as $product) {

            // Assign 1–4 random colors to each product
            $randomColors = $colors->random(rand(1, 4));

            foreach ($randomColors as $color) {
                ProductColor::firstOrCreate([
                    'product_id' => $product->id,
                    'color_id'   => $color->id,
                ]);
            }
        }
    }
}
