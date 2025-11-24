<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class gendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            ['name' => 'Men'],
            ['name' => 'Women'],
            ['name' => 'Kids'],
            ['name' => 'Unisex'],
        ];

        Gender::insert($genders);
    }
}
