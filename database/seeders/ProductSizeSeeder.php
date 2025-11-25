<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Size;
use App\Models\ProductSize;

class ProductSizeSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $sizes = Size::all();

        foreach ($products as $product) {
            // Sprinkle 1–4 random sizes on each product
            $assignedSizes = $sizes->random(rand(1, 4));

            foreach ($assignedSizes as $size) {
                ProductSize::create([
                    'product_id' => $product->id,
                    'size_id' => $size->id,
                ]);
            }
        }
    }
}
