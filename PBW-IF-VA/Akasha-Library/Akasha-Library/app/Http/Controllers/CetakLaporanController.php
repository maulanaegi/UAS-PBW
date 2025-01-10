<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakLaporanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Ambil data peminjaman dengan relasi user dan buku
        $riwayat_peminjaman = Peminjaman::with(['user', 'buku'])->get();

       

        // Generate PDF dari view
        $pdf = Pdf::loadView('peminjaman.laporan_pdf', [
            'riwayat_peminjaman' => $riwayat_peminjaman,
        ]);

        // Tambahkan nama file dengan waktu untuk unik
        $fileName = 'laporan_peminjaman_' . now()->format('Ymd_His') . '.pdf';

        // Return PDF sebagai file unduhan
        return $pdf->download($fileName);
    }
}
