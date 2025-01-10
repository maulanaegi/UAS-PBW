<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);

        // \App\Models\Service::factory(20)->create(); // 20 layanan
        // \App\Models\Portofolio::factory(10)->create(); // 10 portofolio
        // \App\Models\Review::factory(50)->create(); // 50 ulasan

    }
}
