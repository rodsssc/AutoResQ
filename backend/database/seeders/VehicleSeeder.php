<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicleTypes = [
            ['vehicle_type' => 'Car'],
            ['vehicle_type' => 'Motorcycle'],
            ['vehicle_type' => 'Truck'],
            ['vehicle_type' => 'Van'],
            ['vehicle_type' => 'Bus'],
            ['vehicle_type' => 'Bicycle'],
        ];

        DB::table('vehicles')->insert($vehicleTypes);
    }
}
