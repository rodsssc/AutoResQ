<?php

namespace Database\Seeders;

use App\Models\VehicleIssue;
use Illuminate\Database\Seeder;

class VehicleIssueSeeder extends Seeder
{
    public function run(): void
    {
        $issues = [
            ['title' => 'Engine Won\'t Start', 'description' => 'Vehicle engine fails to start or turn over'],
            ['title' => 'Flat Tire', 'description' => 'Tire puncture or complete deflation requiring replacement'],
            ['title' => 'Dead Battery', 'description' => 'Battery has no charge and needs jump start or replacement'],
            ['title' => 'Overheating Engine', 'description' => 'Engine temperature exceeds normal operating range'],
            ['title' => 'Brake Problems', 'description' => 'Issues with brake system including squeaking or reduced stopping power'],
            ['title' => 'Transmission Issues', 'description' => 'Problems with gear shifting or transmission performance'],
            ['title' => 'Electrical Problems', 'description' => 'Issues with lights, radio, or other electrical components'],
            ['title' => 'Fuel System Issues', 'description' => 'Problems with fuel delivery or fuel pump'],
            ['title' => 'Cooling System Leak', 'description' => 'Coolant leak or cooling system malfunction'],
            ['title' => 'Suspension Problems', 'description' => 'Issues with vehicle suspension affecting ride quality'],
        ];

        foreach ($issues as $issue) {
            VehicleIssue::create($issue);
        }
    }
}