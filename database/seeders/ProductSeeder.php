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

        $products = $response->json();

        foreach ($products as $product) {
            // Use an existing category or create a default one
            $category = Category::inRandomOrder()->first() ?? Category::create(['name' => 'Default']);

            // Take the first image from the API or fallback
            $image = isset($product['images'][0]) ? $product['images'][0] : 'https://via.placeholder.com/640x480';

            Product::create([
                'name' => $product['title'] ?? 'No Title',
                'price' => $product['price'] ?? 0,
                'stock' => rand(5, 50),
                'image' => $image,
                'category_id' => $category->id,
            ]);
   }}
}
