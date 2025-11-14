<?php

namespace Database\Factories;
use Illuminate\Support\Facades\Http;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        

       $skip = rand(0, 90);

        $response = Http::get("https://dummyjson.com/products?limit=1&skip={$skip}");
        $data = $response->json()['products'][0];

        return [
            'name'        => $data['title'],
            'price'       => $data['price'],
            'stock'       => rand(5, 50),
            'image'       => $data['thumbnail'],  // just one image
            'category_id' => Category::factory(),
        ];
    }
}
