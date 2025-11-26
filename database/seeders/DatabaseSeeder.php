<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([
            CategorySeeder::class,
            BrandsSeeder::class,
            gendersSeeder::class,
            ProductTypesSeeder::class,
            SizesTableSeeder::class,
            ColorsSeeder::class,
            ProductSeeder::class,
            ProductSizeSeeder::class,
            // ProductColorsSeeder::class,
            // ProductColorImagesSeeder::class,
        ]);
    }
}
