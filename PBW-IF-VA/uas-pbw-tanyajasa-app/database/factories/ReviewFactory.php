<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::where('role', 'user')->inRandomOrder()->first()->id,
            'service_id' => \App\Models\Service::inRandomOrder()->first()->id,
            'rating' => $this->faker->numberBetween(1, 5), // Rating (1-5)
            'comment' => $this->faker->sentence(10), // Komentar dummy
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
