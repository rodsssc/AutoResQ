<?php

namespace Database\Seeders;

use App\Models\Verification;
use App\Models\User;
use Illuminate\Database\Seeder;

class VerificationSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $mechanics = User::where('role', 'mechanic')->get();

        // Verify all users with driver's license
        foreach ($users as $user) {
            Verification::create([
                'user_id' => $user->id,
                'type' => 'valid_id',
                'document_number' => 'DL-' . rand(100000, 999999),
                'document_file' => 'verifications/' . $user->id . '/license.jpg',
                'status' => 'approved',
                'admin_notes' => 'San Francisco resident verified'
            ]);
        }

        // Verify mechanics with ID and certification
        foreach ($mechanics as $mechanic) {
            // Valid ID
            Verification::create([
                'user_id' => $mechanic->id,
                'type' => 'valid_id',
                'document_number' => 'MECH-ID-' . rand(1000, 9999),
                'document_file' => 'verifications/' . $mechanic->id . '/id.jpg',
                'status' => 'approved',
                'admin_notes' => 'San Francisco mechanic ID verified'
            ]);

            // Mechanic certification
            Verification::create([
                'user_id' => $mechanic->id,
                'type' => 'mechanic_resume',
                'document_file' => 'verifications/' . $mechanic->id . '/certificate.pdf',
                'status' => 'approved',
                'admin_notes' => 'TESDA certified mechanic from San Francisco'
            ]);
        }
    }
}