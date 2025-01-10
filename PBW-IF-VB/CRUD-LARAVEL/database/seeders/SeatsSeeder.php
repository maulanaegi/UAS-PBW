<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Seats;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Seats::truncate();
        // Reset auto-increment (khusus untuk MySQL)
         DB::statement('ALTER TABLE seats AUTO_INCREMENT = 1;');

    
        // Tambahkan data baru
        Seats::create([
            'konser_id' => 1,
            'jenis_seat' => 'VIP A',
            'harga' => 3800000,
        ]);

        Seats::create([
            'konser_id' => 1,
            'jenis_seat' => 'VIP B',
            'harga' => 2800000,
        ]);

      
    }
}
