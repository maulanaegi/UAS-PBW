<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone' => '082384762620',
            'address' => 'INDONESIA',
            'password' => Hash::make('password123'),
            'user_type' => 'admin',
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '082384762621',
            'address' => 'USA',
            'password' => Hash::make('password123'),
            'user_type' => 'user',
        ]);
    }
}
