<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            ['latitude' => 8.5356, 'longitude' => 125.9917, 'address' => 'Poblacion 1, San Francisco, Agusan del Sur'],
            ['latitude' => 8.5402, 'longitude' => 125.9889, 'address' => 'Poblacion 2, San Francisco, Agusan del Sur'],
            ['latitude' => 8.5321, 'longitude' => 125.9953, 'address' => 'Poblacion 3, San Francisco, Agusan del Sur'],
            ['latitude' => 8.5287, 'longitude' => 125.9834, 'address' => 'Poblacion 4, San Francisco, Agusan del Sur'],
            ['latitude' => 8.5250, 'longitude' => 125.9789, 'address' => 'Barangay Alegria, San Francisco, Agusan del Sur'],
            ['latitude' => 8.5203, 'longitude' => 125.9725, 'address' => 'Barangay Borja, San Francisco, Agusan del Sur'],
            ['latitude' => 8.5156, 'longitude' => 125.9658, 'address' => 'Barangay Ebro, San Francisco, Agusan del Sur'],
            ['latitude' => 8.5102, 'longitude' => 125.9601, 'address' => 'Barangay Hubang, San Francisco, Agusan del Sur'],
            ['latitude' => 8.5057, 'longitude' => 125.9553, 'address' => 'Barangay Lapinigan, San Francisco, Agusan del Sur'],
            ['latitude' => 8.5001, 'longitude' => 125.9502, 'address' => 'Barangay Lucac, San Francisco, Agusan del Sur'],
            ['latitude' => 8.4950, 'longitude' => 125.9450, 'address' => 'Barangay Mate, San Francisco, Agusan del Sur'],
            ['latitude' => 8.4900, 'longitude' => 125.9400, 'address' => 'Barangay New Visayas, San Francisco, Agusan del Sur'],
            ['latitude' => 8.4850, 'longitude' => 125.9350, 'address' => 'Barangay Ormaca, San Francisco, Agusan del Sur'],
            ['latitude' => 8.4800, 'longitude' => 125.9300, 'address' => 'Barangay Pasta, San Francisco, Agusan del Sur'],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}