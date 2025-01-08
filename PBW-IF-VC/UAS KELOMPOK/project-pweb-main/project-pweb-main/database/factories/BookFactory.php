<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'writer' => $this->faker->name,
            'publisher' => $this->faker->company,
            'synopsis' => $this->faker->paragraph,
            'stock' => $this->faker->randomNumber(),
            'price' => $this->faker->numberBetween(10000, 200000),
        ];
    }
}
