<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportTransaction($id)
    {
        // Ambil transaksi berdasarkan ID
        $transaction = Transaction::with(['user', 'provider', 'service'])->findOrFail($id);

        // Buat PDF dari view
        $pdf = Pdf::loadView('exports.transaction_invoice', compact('transaction'));

        // Tampilkan preview PDF di tab baru
        return $pdf->stream('transaction_invoice_' . $transaction->order_id . '.pdf');
    }
}
