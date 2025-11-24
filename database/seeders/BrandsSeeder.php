<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Zara',
                'slug' => Str::slug('Zara'),
                'description' => 'Modern clothing with minimalist style.',
                'logo_path' => null,
            ],
            [
                'name' => 'H&M',
                'slug' => Str::slug('H&M'),
                'description' => 'Affordable fashion for all genders.',
                'logo_path' => null,
            ],
            [
                'name' => 'Nike',
                'slug' => Str::slug('Nike'),
                'description' => 'Sportswear and performance gear.',
                'logo_path' => null,
            ],
            [
                'name' => 'Adidas',
                'slug' => Str::slug('Adidas'),
                'description' => 'Athletic wear and casual fashion.',
                'logo_path' => null,
            ],
            [
                'name' => 'Pull&Bear',
                'slug' => Str::slug('Pull&Bear'),
                'description' => 'Youth lifestyle clothing.',
                'logo_path' => null,
            ],
        ];

        Brand::insert($brands);
    }
}
