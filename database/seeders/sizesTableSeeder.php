<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizesTableSeeder extends Seeder
{
    public function run()
    {
        $sizes = [
            // Letter sizes
            ['name' => 'XS', 'type' => 'letter'],
            ['name' => 'S', 'type' => 'letter'],
            ['name' => 'M', 'type' => 'letter'],
            ['name' => 'L', 'type' => 'letter'],
            ['name' => 'XL', 'type' => 'letter'],
            ['name' => 'XXL', 'type' => 'letter'],

            // Numeric sizes
            ['name' => '34', 'type' => 'numeric'],
            ['name' => '36', 'type' => 'numeric'],
            ['name' => '38', 'type' => 'numeric'],
            ['name' => '40', 'type' => 'numeric'],
            ['name' => '42', 'type' => 'numeric'],

            // Kids sizes
            ['name' => '2', 'type' => 'kids'],
            ['name' => '4', 'type' => 'kids'],
            ['name' => '6', 'type' => 'kids'],
            ['name' => '8', 'type' => 'kids'],
            ['name' => '10', 'type' => 'kids'],
        ];

        foreach ($sizes as $size) {
            DB::table('sizes')->insert([
                'name' => $size['name'],
                'type' => $size['type'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
