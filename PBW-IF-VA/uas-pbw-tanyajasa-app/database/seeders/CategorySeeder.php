<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Teknologi dan Digital', 'image_url' => null],
            ['name' => 'Kebutuhan Rumah', 'image_url' => null],
            ['name' => 'Transportasi', 'image_url' => null],
            ['name' => 'Kreatif dan Seni', 'image_url' => null],
            ['name' => 'Bisnis dan Profesional', 'image_url' => null],
            ['name' => 'Kesehatan dan Kesejahteraan', 'image_url' => null],
            ['name' => 'Pendidikan dan Pelatihan', 'image_url' => null],
            ['name' => 'Event dan Hiburan', 'image_url' => null],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']), // Generate slug
                'image_url' => $category['image_url'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
