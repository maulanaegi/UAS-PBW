<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    protected $model = \App\Models\Service::class;

    public function definition()
    {
        // Ambil provider secara acak
        $provider = \App\Models\User::where('role', 'provider')->inRandomOrder()->first();
        $providerName = Str::slug($provider->name); // Slugify nama provider

        // Generate nama layanan
        $name = $this->faker->sentence(3);

        return [
            'provider_id' => $provider->id,
            'name' => $name,
            'description' => $this->faker->paragraph, // Deskripsi layanan
            'price' => $this->faker->randomFloat(2, 100, 1000), // Harga layanan
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            'image_url' => null,
            'slug' => Str::slug($name) . '-' . $providerName, // Slug berdasarkan nama layanan dan provider
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}