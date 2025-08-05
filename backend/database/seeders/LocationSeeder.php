<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            ['latitude' => 8.3478, 'longitude' => 125.9814, 'address' => 'Prosperidad, Agusan del Sur'],
            ['latitude' => 8.4167, 'longitude' => 125.9000, 'address' => 'San Francisco, Agusan del Sur'],
            ['latitude' => 8.5500, 'longitude' => 125.9833, 'address' => 'Bunawan, Agusan del Sur'],
            ['latitude' => 8.2167, 'longitude' => 126.0500, 'address' => 'Trento, Agusan del Sur'],
            ['latitude' => 8.3000, 'longitude' => 125.8833, 'address' => 'Veruela, Agusan del Sur'],
            ['latitude' => 8.1833, 'longitude' => 125.9167, 'address' => 'Esperanza, Agusan del Sur'],
            ['latitude' => 8.4833, 'longitude' => 125.8500, 'address' => 'La Paz, Agusan del Sur'],
            ['latitude' => 8.3833, 'longitude' => 126.0167, 'address' => 'Sibagat, Agusan del Sur'],
            ['latitude' => 8.2500, 'longitude' => 125.9500, 'address' => 'Talacogon, Agusan del Sur'],
            ['latitude' => 8.1500, 'longitude' => 126.0000, 'address' => 'Bayugan, Agusan del Sur'],
            ['latitude' => 8.4000, 'longitude' => 125.8167, 'address' => 'Rosario, Agusan del Sur'],
            ['latitude' => 8.5167, 'longitude' => 125.9167, 'address' => 'Santa Josefa, Agusan del Sur'],
            ['latitude' => 8.2833, 'longitude' => 126.0833, 'address' => 'San Luis, Agusan del Sur'],
            ['latitude' => 8.3667, 'longitude' => 125.8500, 'address' => 'Loreto, Agusan del Sur'],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}