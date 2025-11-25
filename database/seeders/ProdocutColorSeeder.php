<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Color;
use App\Models\ProductColor;

class ProdocutColorSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $colorIds = Color::pluck('id')->toArray();

        foreach ($products as $product) {

            // Choose 1–3 random colors for every product
            $randomColors = collect($colorIds)->random(rand(1, 3));

            foreach ($randomColors as $colorId) {
                ProductColor::firstOrCreate([
                    'product_id' => $product->id,
                    'color_id'   => $colorId,
                ]);
            }
        }
    }
}
