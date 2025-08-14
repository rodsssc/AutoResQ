<?php

namespace Database\Seeders;

use App\Models\ServiceRequest;
use App\Models\User;
use App\Models\Location;
use App\Models\VehicleIssue;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ServiceRequestSeeder extends Seeder
{
    public function run(): void
    {
        $users     = User::where('role', 'user')->get();
        $mechanics = User::where('role', 'mechanic')->get();
        $issues    = VehicleIssue::all();
        $locations = Location::all();

        // Status distribution weights
        $statusWeights = [
            'pending'     => 20,
            'accepted'    => 30,
            'in_progress' => 25,
            'completed'   => 20,
            'cancelled'   => 5
        ];

        for ($i = 0; $i < 50; $i++) {
            $user     = $users->random();
            $mechanic = $mechanics->random();
            $issue    = $issues->random();
            $location = $locations->random();

            $status    = $this->getWeightedRandomStatus($statusWeights);
            $createdAt = Carbon::now()->subDays(rand(1, 60));

            ServiceRequest::create([
                'user_id'          => $user->id,
                'mechanic_id'      => $status !== 'pending' ? $mechanic->id : null,
                'vehicle_issue_id' => $issue->id,
                'location_id'      => $location->id,
                'status'           => $status,
                'created_at'       => $createdAt,
                'updated_at'       => $createdAt->copy()->addHours(rand(1, 24))
            ]);
        }
    }

    private function getWeightedRandomStatus(array $weights): string
    {
        $total   = array_sum($weights);
        $random  = rand(1, $total);
        $current = 0;

        foreach ($weights as $status => $weight) {
            $current += $weight;
            if ($random <= $current) {
                return $status;
            }
        }

        return 'pending';
    }
}
