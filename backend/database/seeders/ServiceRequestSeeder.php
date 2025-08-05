<?php

namespace Database\Seeders;

use App\Models\ServiceRequest;
use App\Models\User;
use App\Models\Location;
use App\Models\VehicleIssue;
use App\Models\MechanicInfo;
use Illuminate\Database\Seeder;

class ServiceRequestSeeder extends Seeder
{
    public function run(): void
    {
        $drivers = User::where('role', 'user')->get();
        $mechanics = MechanicInfo::all();
        $locations = Location::all();
        $vehicleIssues = VehicleIssue::all();
        $statuses = ['pending', 'accepted', 'in_progress', 'completed', 'cancelled'];

        for ($i = 0; $i < 30; $i++) {
            $driver = $drivers->random();
            $mechanic = $mechanics->random();
            $location = $locations->random();
            $vehicleIssue = $vehicleIssues->random();
            $status = $statuses[array_rand($statuses)];

            $requestAt = now()->subDays(rand(1, 30));
            $acceptAt = null;
            $completedAt = null;

            if (in_array($status, ['accepted', 'in_progress', 'completed'])) {
                $acceptAt = $requestAt->copy()->addMinutes(rand(5, 60));
            }

            if ($status === 'completed') {
                $completedAt = $acceptAt->copy()->addMinutes(rand(30, 180));
            }

            ServiceRequest::create([
                'user_id' => $driver->id,
                'mechanic_id' => $mechanic->mechanic_id,
                'location_id' => $location->id,
                'vehicle_issue_id' => $vehicleIssue->id,
                
                'status' => $status,
                
            ]);
        }
    }
}