<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductColor;
use App\Models\ProductColorImage;

class ProdocutColorImageSeeder extends Seeder
{
    public function run(): void
    {
        $productColors = ProductColor::all();

        foreach ($productColors as $pc) {

            // Let's add between 1 and 4 images per color
            $count = rand(1, 4);

            for ($i = 0; $i < $count; $i++) {
                ProductColorImage::create([
                    'product_color_id' => $pc->id,
                    'image_path'       => "products/{$pc->product_id}/color_{$pc->color_id}_{$i}.jpg",
                    'is_main'          => $i === 0, // first image is the main image
                ]);
            }
        }
    }
}
