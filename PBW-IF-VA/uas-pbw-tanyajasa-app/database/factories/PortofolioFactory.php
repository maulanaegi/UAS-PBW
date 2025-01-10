<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;
use App\Models\User;
use App\Models\Portofolio;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portofolio>
 */
class PortofolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Portofolio::class;
    
    public function definition(): array
    {
        return [
            'provider_id' => User::where('role', 'provider')->inRandomOrder()->first()->id,  // Ambil provider acak
            'service_id' => Service::inRandomOrder()->first()->id,  // Ambil service acak
            'title' => $this->faker->sentence(4),  // Judul portofolio
            'description' => $this->faker->paragraph,  // Deskripsi portofolio
            'image_url' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
