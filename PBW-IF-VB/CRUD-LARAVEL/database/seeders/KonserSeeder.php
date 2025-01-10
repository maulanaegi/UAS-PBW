<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Konser;

class KonserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Konser::create([
            'nama_konser' => 'DAY6 3RD WORLD TOUR in JAKARTA',
            'artis' => 'DAY6',
            'tanggal' => '2025-01-15',
            'lokasi' => 'JAKARTA',
        ]);

        Konser::create([
            'nama_konser' => 'XDINARY HEROES 1ST WORLD TOUR in JAKARTA',
            'artis' => 'XDINARY HEROES',
            'tanggal' => '2025-02-20',
            'lokasi' => 'JAKARTA',
        ]);

        Konser::create([
            'nama_konser' => 'SHEILA ON 7 TUNGGU AKU DI',
            'artis' => 'SHEILA ON 7',
            'tanggal' => '2025-03-20',
            'lokasi' => 'BANDUNG',
        ]);
    }
}
