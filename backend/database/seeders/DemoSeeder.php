<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // USERS
        $adminId = DB::table('users')->insertGetId([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'phone' => '09171234567',
            'role' => 'admin',
            'is_active' => true,
            'location_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $userId = DB::table('users')->insertGetId([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'phone' => '09170000000',
            'role' => 'user',
            'is_active' => true,
            'location_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $mechanicId = DB::table('users')->insertGetId([
            'name' => 'Jane Mechanic',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'phone' => '09171112222',
            'role' => 'mechanic',
            'is_active' => true,
            'location_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // LOCATIONS
        $locationId = DB::table('locations')->insertGetId([
            'mechanic_id' => null,
            'service_request_id' => null,
            'latitude' => 14.5995,
            'longitude' => 120.9842,
            'address' => 'Manila, Philippines',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // MECHANIC INFO
        DB::table('mechanic_infos')->insert([
            'mechanic_id' => $mechanicId,
            'specialization' => 'Car & Motorcycle',
            'rating_average' => 4.75,
            'status' => 'Available',
            'location_id' => $locationId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // VEHICLE ISSUES
        $vehicleIssueId = DB::table('vehicle_issues')->insertGetId([
            'name' => 'Engine Problem',
            'vehicle_type_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // SERVICE REQUESTS
        $serviceRequestId = DB::table('service_requests')->insertGetId([
            'user_id' => $userId,
            'mechanic_id' => $mechanicId,
            'vehicle_issue_id' => $vehicleIssueId,
            'location_id' => $locationId,
            'description' => 'Car won’t start, making strange noise.',
            'issue_images' => json_encode(['engine.jpg']),
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // RATING
        DB::table('ratings')->insert([
            'user_id' => $userId,
            'mechanic_id' => $mechanicId,
            'request_id' => $serviceRequestId,
            'stars' => 5,
            'comment' => 'Excellent service!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // VERIFICATIONS
        DB::table('verifications')->insert([
            'user_id' => $mechanicId,
            'type' => 'valid_id',
            'document_number' => 'ID1234567',
            'document_file' => 'uploads/ids/jane_id.jpg',
            'status' => 'approved',
            'admin_notes' => 'Verified successfully.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // CONVERSATIONS
        $conversationId = DB::table('conversations')->insertGetId([
            'request_id' => $serviceRequestId,
            'user_id' => $userId,
            'mechanic_id' => $mechanicId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // MESSAGES
        DB::table('messages')->insert([
            [
                'conversation_id' => $conversationId,
                'sender_id' => $userId,
                'message' => 'Hi, I need help with my car.',
                'is_read' => false,
                'read_at' => null,
                'attachment_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'conversation_id' => $conversationId,
                'sender_id' => $mechanicId,
                'message' => 'Sure, I can come over. What’s the exact issue?',
                'is_read' => false,
                'read_at' => null,
                'attachment_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
