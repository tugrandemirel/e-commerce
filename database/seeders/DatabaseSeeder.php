<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(\Epigra\TrGeoZones\Database\Seeders\GeozoneCountriesTableSeeder::class);
        $this->call(\Epigra\TrGeoZones\Database\Seeders\GeozoneCitiesTableSeeder::class);
        $this->call(\Epigra\TrGeoZones\Database\Seeders\GeozoneCountiesTableSeeder::class);
        $this->call(\Epigra\TrGeoZones\Database\Seeders\GeozoneDistrictsTableSeeder::class);
        $this->call(\Epigra\TrGeoZones\Database\Seeders\GeozoneNeighbourhoodsTableSeeder::class);
    }
}
