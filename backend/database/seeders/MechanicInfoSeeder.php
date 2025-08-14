<?php

namespace Database\Seeders;

use App\Models\MechanicInfo;
use App\Models\User;
use Illuminate\Database\Seeder;

class MechanicInfoSeeder extends Seeder
{
    public function run(): void
    {
        $mechanics = User::where('role', 'mechanic')->get();

        $specializations = [
            'Motorcycle',
            'Car',
            'Both'
        ];

        $statuses = ['Available', 'Busy', 'Offline'];

        foreach ($mechanics as $mechanic) {
            MechanicInfo::create([
                'mechanic_id'    => $mechanic->id,
                'specialization' => $specializations[array_rand($specializations)],
                'rating_average' => round(rand(350, 500) / 100, 2), // 3.50 to 5.00
                'status'         => $statuses[array_rand($statuses)],
            ]);
        }
    }
}
