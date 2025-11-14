<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $categories = [
            'Phones',
            'Laptops',
            'Fragrances',
            'Skincare',
            'Groceries',
            'Home Decoration',
            'Furniture',
        ];

        return [
            'name' => $this->faker->randomElement($categories), // removed unique()
        ];
    }
}
