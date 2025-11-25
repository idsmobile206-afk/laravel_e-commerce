<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name' => 'Black',        'hex_code' => '#000000'],
            ['name' => 'White',        'hex_code' => '#FFFFFF'],
            ['name' => 'Gray',         'hex_code' => '#808080'],
            ['name' => 'Light Gray',   'hex_code' => '#D3D3D3'],
            ['name' => 'Dark Gray',    'hex_code' => '#4A4A4A'],

            ['name' => 'Red',          'hex_code' => '#FF0000'],
            ['name' => 'Dark Red',     'hex_code' => '#8B0000'],
            ['name' => 'Pink',         'hex_code' => '#FFC0CB'],
            ['name' => 'Hot Pink',     'hex_code' => '#FF69B4'],
            ['name' => 'Burgundy',     'hex_code' => '#800020'],

            ['name' => 'Orange',       'hex_code' => '#FFA500'],
            ['name' => 'Brown',        'hex_code' => '#8B4513'],
            ['name' => 'Beige',        'hex_code' => '#F5F5DC'],
            ['name' => 'Cream',        'hex_code' => '#FFFDD0'],

            ['name' => 'Yellow',       'hex_code' => '#FFFF00'],
            ['name' => 'Mustard',      'hex_code' => '#FFDB58'],

            ['name' => 'Green',        'hex_code' => '#008000'],
            ['name' => 'Dark Green',   'hex_code' => '#006400'],
            ['name' => 'Light Green',  'hex_code' => '#90EE90'],
            ['name' => 'Olive',        'hex_code' => '#808000'],
            ['name' => 'Mint',         'hex_code' => '#98FF98'],

            ['name' => 'Blue',         'hex_code' => '#0000FF'],
            ['name' => 'Navy',         'hex_code' => '#000080'],
            ['name' => 'Sky Blue',     'hex_code' => '#87CEEB'],
            ['name' => 'Royal Blue',   'hex_code' => '#4169E1'],
            ['name' => 'Turquoise',    'hex_code' => '#40E0D0'],

            ['name' => 'Purple',       'hex_code' => '#800080'],
            ['name' => 'Lavender',     'hex_code' => '#E6E6FA'],
            ['name' => 'Violet',       'hex_code' => '#8A2BE2'],
        ];

        foreach ($colors as $color) {
            Color::firstOrCreate(
                ['hex_code' => $color['hex_code']], // unique field
                $color
            );
        }
    }
}
