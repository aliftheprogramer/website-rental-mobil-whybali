<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Mobil;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Mobil::create([
            'plat_mobil' => strtoupper(Str::random(2) . rand(1000, 9999)),
            'brand' => 'Toyota',
            'model' => 'Avanza',
            'year' => rand(2000, 2023),
            'price_per_day' => rand(100000, 1000000),
            'status' => 'available',
            'image_url' => 'https://via.placeholder.com/640x480.png?text=Toyota+Avanza',
        ]);

        Mobil::create([
            'plat_mobil' => strtoupper(Str::random(2) . rand(1000, 9999)),
            'brand' => 'Honda',
            'model' => 'Civic',
            'year' => rand(2000, 2023),
            'price_per_day' => rand(100000, 1000000),
            'status' => 'rented',
            'image_url' => 'https://via.placeholder.com/640x480.png?text=Honda+Civic',
        ]);

        Mobil::create([
            'plat_mobil' => strtoupper(Str::random(2) . rand(1000, 9999)),
            'brand' => 'Suzuki',
            'model' => 'Swift',
            'year' => rand(2000, 2023),
            'price_per_day' => rand(100000, 1000000),
            'status' => 'available',
            'image_url' => 'https://via.placeholder.com/640x480.png?text=Suzuki+Swift',
        ]);
    }
}
