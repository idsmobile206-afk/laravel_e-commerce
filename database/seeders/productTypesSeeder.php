<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\ProductType;

class ProductTypesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Tops' => [
                'T-Shirts', 'Polos', 'Shirts', 'Blouses', 'Hoodies',
                'Sweatshirts', 'Tank Tops', 'Crop Tops', 'Long Sleeve Tops',
                'Knitwear', 'Sweaters', 'Cardigans', 'Sports Tops',
                'Jerseys', 'Vests'
            ],

            'Bottoms' => [
                'Jeans', 'Pants', 'Sweatpants', 'Shorts', 'Leggings',
                'Skirts', 'Cargo Pants', 'Dress Pants', 'Chinos',
                'Joggers', 'Culottes'
            ],

            'Outerwear' => [
                'Jackets', 'Coats', 'Parkas', 'Blazers', 'Denim Jackets',
                'Leather Jackets', 'Windbreakers', 'Tracksuits',
                'Puffer Jackets'
            ],

            'Shoes' => [
                'Sneakers', 'Boots', 'Sandals', 'Heels', 'Flats',
                'Running Shoes', 'Loafers', 'Slippers'
            ],

            'Accessories' => [
                'Bags', 'Backpacks', 'Belts', 'Caps', 'Hats', 'Scarves',
                'Gloves', 'Wallets', 'Socks', 'Sunglasses', 'Jewelry',
                'Watches'
            ],

            'Dresses' => [
                'Mini Dress', 'Midi Dress', 'Maxi Dress', 'Evening Dress',
                'Casual Dress', 'Bodycon Dress'
            ],

            'Underwear' => [
                'Boxers', 'Briefs', 'Bras', 'Lingerie', 'Undershirts'
            ],

            'Sportswear' => [
                'Gym Tops', 'Gym Shorts', 'Compression Wear', 'Swimwear',
                'Tracksuit Pants', 'Sports Bras'
            ],
        ];

        foreach ($data as $categoryName => $types) {

            $category = Category::where('name', $categoryName)->first();

            if (!$category) {
                // Create category if not exist
                $category = Category::create(['name' => $categoryName]);
            }

            foreach ($types as $type) {
                ProductType::create([
                    'name' => $type,
                    'slug' => Str::slug($type),
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
