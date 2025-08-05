<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            LocationSeeder::class,
            VehicleIssueSeeder::class,
            MechanicInfoSeeder::class,
            ServiceRequestSeeder::class,
            RequestDescriptionSeeder::class,
            RatingSeeder::class,
        ]);
    }
}