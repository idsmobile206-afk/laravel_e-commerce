<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $clothes = [
            'T-Shirt', 'Jeans', 'Hoodie', 'Jacket', 'Sweater', 
            'Dress', 'Skirt', 'Shorts', 'Blouse', 'Coat'
        ];

        return [
            'name' => $this->faker->randomElement($clothes),
            'price' => $this->faker->randomFloat(2, 10, 200), 
            'stock' => $this->faker->numberBetween(0, 50),
            'image' => $this->faker->imageUrl(640, 480, 'fashion', true),
            'category_id' => Category::factory(),
        ];
    }
}
