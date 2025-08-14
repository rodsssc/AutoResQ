<?php

namespace Database\Seeders;

use App\Models\RequestDescription;
use App\Models\ServiceRequest;
use Illuminate\Database\Seeder;

class RequestDescriptionSeeder extends Seeder
{
    public function run(): void
    {
        $serviceRequests = ServiceRequest::all();

        $descriptions = [
            'Engine making strange noises and won\'t start properly',
            'Front left tire is completely flat and needs immediate replacement',
            'Car battery seems dead, no electrical power at all',
            'Engine temperature gauge showing red, steam coming from hood',
            'Brakes feel spongy and making grinding sounds',
            'Transmission slipping, difficulty shifting gears',
            'Headlights not working, need electrical inspection',
            'Car not getting fuel, engine cranks but won\'t start',
            'Coolant leaking under the vehicle',
            'Suspension very bouncy, car feels unstable',
        ];

        foreach ($serviceRequests as $request) {
            // Randomly decide if this request has images
            $images = null;

            if (rand(0, 1)) {
                $imageCount = rand(1, 3);
                $images = [];
                for ($i = 0; $i < $imageCount; $i++) {
                    $images[] = "https://via.placeholder.com/400x300?text=Issue+Image+" . ($i + 1);
                }
            }

            RequestDescription::create([
                'request_id'   => $request->id,
                'description'  => $descriptions[array_rand($descriptions)],
                'issue_images' => $images ? json_encode($images) : null,
            ]);
        }
    }
}
