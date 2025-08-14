<?php

namespace Database\Seeders;

use App\Models\VehicleIssue;
use Illuminate\Database\Seeder;

class VehicleIssueSeeder extends Seeder
{
    public function run(): void
    {
        $issues = [
            ['name' => 'Flat Tire', 'vehicle_type_id' => 1],
            ['name' => 'Dead Battery', 'vehicle_type_id' => 2],
            ['name' => 'Engine Overheating', 'vehicle_type_id' => 3],
            ['name' => 'Transmission Failure', 'vehicle_type_id' => 4],
            ['name' => 'Brake Failure', 'vehicle_type_id' => 5],
            ['name' => 'Electrical Issues', 'vehicle_type_id' => 6],
            ['name' => 'Fuel Leak', 'vehicle_type_id' => 7],
            ['name' => 'Suspension Problems', 'vehicle_type_id' => 8],
            ['name' => 'Steering Issues', 'vehicle_type_id' => 9],
            ['name' => 'Exhaust Problems', 'vehicle_type_id' => 10],
            ['name' => 'Air Conditioning Failure', 'vehicle_type_id' => 11],
        ];

        VehicleIssue::insert($issues);
    }
}
