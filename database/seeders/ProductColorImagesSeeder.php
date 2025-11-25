<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductColor;
use App\Models\ProductColorImage;

class ProductColorImagesSeeder extends Seeder
{
    public function run(): void
    {
        $productColors = ProductColor::all();

        if ($productColors->isEmpty()) {
            return;
        }

        foreach ($productColors as $productColor) {
            
            // 2–4 images per color variation
            $imageCount = rand(2, 4);

            for ($i = 1; $i <= $imageCount; $i++) {

                ProductColorImage::create([
                    'product_color_id' => $productColor->id,
                    'image_path' => "products/{$productColor->product_id}/colors/{$productColor->color_id}/image{$i}.jpg",
                    'is_main' => false,
                ]);
            }

            // Pick one of these images as the main one
            $mainImage = $productColor->images()->inRandomOrder()->first();
            if ($mainImage) {
                $mainImage->update(['is_main' => true]);
            }
        }
    }
}
