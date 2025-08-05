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
        $statuses = ['active', 'inactive'];

        foreach ($mechanics as $mechanic) {
            MechanicInfo::create([
                'mechanic_id' => $mechanic->id,
                'license_number' => 'LIC-' . strtoupper(substr(md5($mechanic->id), 0, 8)),
                'rating_average' => round(rand(300, 500) / 100, 2),
                'status' => $statuses[array_rand($statuses)],
            ]);
        }
    }
}