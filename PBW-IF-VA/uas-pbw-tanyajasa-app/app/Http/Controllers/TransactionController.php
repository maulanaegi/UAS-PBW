<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\TransactionCreated;
use App\Events\TransactionStatusUpdated;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

class TransactionController extends Controller
{

	public function __construct()
	{
			// Inisialisasi Midtrans
			Config::$serverKey = config('midtrans.server_key');
			Config::$isProduction = config('midtrans.is_production');
			Config::$isSanitized = true;
			Config::$is3ds = true;
	}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'custom_details' => 'required|string',
            'whatsapp_number' => 'required|string',
            'email' => 'required|email',
            'resolution_note' => 'nullable|string|max:500',
            'location' => 'nullable|string',
            'budget' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date',
            'deadline' => 'nullable|date',
        ]);

        $service = Service::findOrFail($validated['service_id']);
        $provider_id = $service->provider_id;
        $total_price = $service->price;

        // Tentukan komisi admin (misalnya 10%)
        $adminCommissionRate = 0.10;
        $admin_fee = $total_price * $adminCommissionRate;
        $provider_fee = $total_price - $admin_fee;

        DB::beginTransaction();

        try {
            $transaction = Transaction::create([
                'order_id' => 'TanyaJasa-' . uniqid(),
                'service_id' => $validated['service_id'],
                'user_id' => auth()->id(),
                'provider_id' => $provider_id,
                'custom_details' => $validated['custom_details'],
                'whatsapp_number' => $validated['whatsapp_number'],
                'email' => $validated['email'],
                'total_price' => $total_price,
                'admin_fee' => $admin_fee, // Tambahkan admin_fee
                'provider_fee' => $provider_fee, // Tambahkan provider_fee
                'status' => 'pending',
                'payment_status' => 'pending',
                'location' => $validated['location'] ?? null,
                'budget' => $validated['budget'] ?? null,
                'start_date' => $validated['start_date'] ?? null,
                'deadline' => $validated['deadline'] ?? null,
            ]);

            event(new TransactionCreated($transaction));

            DB::commit();

            return back()->with('alert', [
                'title' => 'Berhasil',
                'text' => 'Pesanan Anda berhasil dibuat! Provider telah diberitahukan.',
                'icon' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('alert', [
                'title' => 'Error',
                'text' => 'Terjadi kesalahan saat membuat transaksi.',
                'icon' => 'error',
            ]);
        }
    }


    /**
     * Tampilkan riwayat transaksi.
     */
    public function history()
		{
				if (auth()->user()->role === 'provider') {
						$transactions = Transaction::where('provider_id', auth()->id())
								->with(['service', 'user'])
								->orderBy('created_at', 'desc')
								->paginate(10);

						// Hitung total pendapatan dari transaksi yang telah selesai
						$totalEarnings = Transaction::where('provider_id', auth()->id())
								->where('status', 'completed')
								->sum('provider_fee');

						return view('transactions.history', [
								'title' => 'Riwayat Transaksi Penyedia Jasa',
								'transactions' => $transactions,
								'totalEarnings' => $totalEarnings, // Kirim pendapatan total ke view
						]);
				} else {
						abort(403, 'Akses ditolak');
				}
		}


    public function userHistory()
		{
        // Ambil semua transaksi milik user yang sedang login
        $transactions = Transaction::where('user_id', auth()->id())
            ->with(['service', 'provider'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('transactions.userHistory', [
            'title' => 'Riwayat Transaksi Anda',
            'transactions' => $transactions,
        ]);
    }

    /**
     * Update status transaksi.
     */
    public function updateStatus(Request $request, $id)
		{
				$request->validate([
						'status' => 'required|string',
				]);

				// Temukan transaksi berdasarkan ID
				$transaction = Transaction::findOrFail($id);

				// Perbarui status transaksi
				$transaction->status = $request->status;

				// Jika status transaksi "canceled", ubah payment_status juga menjadi "canceled"
				if ($request->status === 'canceled') {
						$transaction->payment_status = 'canceled';
				}

				// Simpan perubahan
				$transaction->save();

				return response()->json([
						'success' => true,
						'message' => 'Status transaksi berhasil diperbarui.',
				]);
		}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        if ($transaction->provider_id !== auth()->id()) {
            return back()->with('alert', [
                'title' => 'Gagal',
                'text' => 'Anda tidak memiliki izin untuk menghapus transaksi ini.',
                'icon' => 'error',
            ]);
        }

        $transaction->delete();

        return back()->with('alert', [
            'title' => 'Berhasil',
            'text' => 'Transaksi berhasil dihapus.',
            'icon' => 'success',
        ]);
    }

    public function cancel(Transaction $transaction)
    {
        // Cek apakah status transaksi masih 'pending'
        if ($transaction->status !== 'pending') {
            return back()->with('alert', [
                'title' => 'Gagal',
                'text' => 'Pesanan hanya dapat dibatalkan jika statusnya masih pending.',
                'icon' => 'error',
            ]);
        }

        // Update status ke 'canceled'
        $transaction->update(['status' => 'canceled']);

        return back()->with('alert', [
            'title' => 'Berhasil',
            'text' => 'Pesanan berhasil dibatalkan.',
            'icon' => 'success',
        ]);
    }

    /**
     * Menampilkan halaman pembayaran.
     */
    

	public function showPaymentPage(Transaction $transaction)
	{
			// Pastikan hanya user yang memiliki transaksi ini yang dapat melihat halaman pembayaran
			if ($transaction->user_id !== auth()->id()) {
					abort(403, 'Akses ditolak.');
			}

			// Buat parameter untuk Snap Token
			$params = [
					'transaction_details' => [
							'order_id' =>  $transaction->order_id,
							'gross_amount' => $transaction->total_price,
					],
					'customer_details' => [
							'first_name' => $transaction->user->name,
							'email' => $transaction->user->email,
							'phone' => $transaction->whatsapp_number,
					],
					'enabled_payments' => ['gopay', 'bank_transfer', 'credit_card'], // Opsi pembayaran
			];

			// Generate Snap Token
			$snapToken = Snap::getSnapToken($params);

			// Kirim data ke view
			return view('transactions.payment', [
					'title' => 'Pembayaran',
					'transaction' => $transaction,
					'snapToken' => $snapToken,
			]);
	}


    /**
     * Menandai transaksi sebagai telah dibayar.
     */
    public function markAsPaid(Request $request, Transaction $transaction)
		{
				// Pastikan hanya user yang memiliki transaksi ini yang dapat melakukan aksi ini
				if ($transaction->user_id !== auth()->id()) {
						abort(403, 'Akses ditolak.');
				}

				// Validasi pembayaran (misalnya, validasi callback dari gateway pembayaran)
				$request->validate([
						'payment_status' => 'required|in:success,failed',
				]);

				if ($request->payment_status === 'success') {
						// Update status pembayaran dan status transaksi
						$transaction->update([
								'payment_status' => 'paid', // Update status pembayaran ke 'paid'
						]);

						return view('transactions.paid', [
								'title' => "Sukses",
								'transaction' => $transaction,
						])->with('alert', [
								'title' => 'Berhasil',
								'text' => 'Pembayaran berhasil. Terima kasih!',
								'icon' => 'success',
						]);
				} else {
						return back()->with('alert', [
								'title' => 'Gagal',
								'text' => 'Pembayaran gagal. Silakan coba lagi.',
								'icon' => 'error',
						]);
				}
		}

		

}
