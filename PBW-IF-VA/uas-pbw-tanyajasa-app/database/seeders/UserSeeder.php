<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
			DB::table('users')->insert([
				[
						'name' => 'Admin',
						'username' => 'admin',
						'whatsapp_number' => '081234567892',
						'email' => 'admin@example.com',
						'password' => Hash::make('password123'),
						'role' => 'admin',
						'profile_description' => 'Administrator account',
						'profile_picture' => null,
						'status' => 'active',
						'created_at' => now(),
						'updated_at' => now(),
				],
				[
						'name' => 'Provider',
						'username' => 'provider',
						'whatsapp_number' => '081234567890',
						'email' => 'provider@example.com',
						'password' => Hash::make('password123'),
						'role' => 'provider',
						'profile_description' => 'Service provider account',
						'profile_picture' => null,
						'status' => 'active',
						'created_at' => now(),
						'updated_at' => now(),
				],
				[
						'name' => 'User',
						'username' => 'user',
						'whatsapp_number' => '081234567891',
						'email' => 'user@example.com',
						'password' => Hash::make('password123'),
						'role' => 'user',
						'profile_description' => 'Regular user account',
						'profile_picture' => null,
						'status' => 'active',
						'created_at' => now(),
						'updated_at' => now(),
				],
		]);
    }
}
