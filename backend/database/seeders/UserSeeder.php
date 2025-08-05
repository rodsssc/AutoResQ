<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create test user
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'phone' => '09123456789',
            'role' => 'user',
            'is_active' => true,
        ]);

        // Create drivers
        $drivers = [
            'Juan Carlos Dela Cruz',
            'Maria Santos Reyes',
            'Jose Miguel Rodriguez',
            'Ana Lucia Gonzales',
            'Roberto Mendoza',
            'Carmen Flores',
            'Pedro Antonio Silva',
            'Rosa Martinez',
            'Luis Fernando Torres',
            'Elena Vasquez',
        ];

        foreach ($drivers as $name) {
            User::create([
                'name' => $name,
                'email' => strtolower(str_replace(' ', '.', $name)) . '@example.com',
                'password' => Hash::make('password123'),
                'phone' => '09' . rand(100000000, 999999999),
                'role' => 'user',
                'is_active' => true,
            ]);
        }

        // Create mechanics
        $mechanics = [
            'Mario Bautista Santos',
            'Ricardo Villanueva',
            'Fernando Castro',
            'Antonio Aguilar',
            'Ramon Gutierrez',
            'Leonardo Navarro',
            'Benjamin Ortega',
            'Eduardo Herrera',
        ];

        foreach ($mechanics as $name) {
            User::create([
                'name' => $name,
                'email' => strtolower(str_replace(' ', '.', $name)) . '@mechanic.com',
                'password' => Hash::make('password123'),
                'phone' => '09' . rand(100000000, 999999999),
                'role' => 'mechanic',
                'is_active' => rand(0, 10) > 1,
            ]);
        }
    }
}