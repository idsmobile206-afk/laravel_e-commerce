<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $response = Http::get('https://api.escuelajs.co/api/v1/products');

        if (!$response->ok()) {
            dd("API is not responding");
        }

        $products = $response->json();

        foreach ($products as $p) {

            // Ensure category exists or create it
            $category = Category::firstOrCreate(
                ['name' => $p['category']['name']]
            );

            Product::create([
                'name'        => $p['title'],
                'price'       => $p['price'],
                'stock'       => rand(10, 100),
                'image'       => $p['images'][0] ,
                'category_id' => $category->id,
            ]);
        }
    }
}
