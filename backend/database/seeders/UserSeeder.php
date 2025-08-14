<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin account
        User::create([
            'name'      => 'System Admin',
            'email'     => 'admin@sanfrancisco-agusansur.com',
            'password'  => Hash::make('admin123'),
            'phone'     => '09120000000',
            'role'      => 'admin',
            'is_active' => true,
        ]);

        // Drivers from San Francisco, Agusan del Sur
        $drivers = [
            'Juanito Magbanua',
            'Marites Bualan',
            'Ronald Pabillaran',
            'Gemma Abao',
            'Alvin Lumantas',
            'Jessa Lagrimas',
            'Efren Abadiano',
            'Mylene Mansueto',
            'Ruel Sabal',
            'Cherry Mae Balasbas',
        ];

        foreach ($drivers as $name) {
            User::create([
                'name'      => $name,
                'email'     => Str::slug($name, '.') . '@driver.agusansur.com',
                'password'  => Hash::make('driver123'),
                'phone'     => '09' . rand(100000000, 999999999),
                'role'      => 'user',
                'is_active' => true,
            ]);
        }

        // Mechanics from San Francisco, Agusan del Sur
        $mechanics = [
            'Mario Bagtikan',
            'Ramon Casiple',
            'Eddie Balasabas',
            'Jomar Salimbagat',
            'Antonio Saliot',
            'Lemuel Faburada',
            'Edwin Relampagos',
            'Bobby Casuncad',
        ];

        foreach ($mechanics as $name) {
            User::create([
                'name'      => $name,
                'email'     => Str::slug($name, '.') . '@mechanic.agusansur.com',
                'password'  => Hash::make('mechanic123'),
                'phone'     => '09' . rand(100000000, 999999999),
                'role'      => 'mechanic',
                'is_active' => rand(0, 10) > 1,
            ]);
        }
    }
}
