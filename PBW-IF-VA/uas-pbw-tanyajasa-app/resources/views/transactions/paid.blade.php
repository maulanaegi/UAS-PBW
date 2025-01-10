@extends('layouts.main')

@section('container')

<!-- Header Start -->
<div class="container py-5 bg-dark page-header mb-5">
	<div class="container my-5 pt-5 pb-4">
			<h1 class="display-3 text-white mb-3 animated slideInDown">{{ $title }}</h1>
	</div>
</div>
<!-- Header End -->

<div class="container py-5">
    <div class="card">
        <div class="card-header" style="background-color: #0077b6;">
            <h5 class=" text-white">Pembayaran Berhasil!</h5>
        </div>
        <div class="card-body">
            <p>Terima kasih, pembayaran Anda untuk transaksi <strong>{{ $transaction->service->name }}</strong> telah berhasil diproses.</p>

            <div class="mb-3">
                <strong>Penyedia Jasa:</strong> {{ $transaction->provider->name }}
            </div>
            <div class="mb-3">
                <strong>Total Harga:</strong> Rp {{ number_format($transaction->total_price, 2, ',', '.') }}
            </div>
            <div class="mb-3">
                <strong>Status:</strong> 
                <span class="badge bg-success">{{ ucfirst($transaction->status) }}</span>
            </div>
            <div class="mb-3">
                <strong>Status Pembayaran:</strong> 
                <span class="badge bg-success">{{ ucfirst($transaction->payment_status) }}</span>
            </div>

            <a href="{{ route('transactions.userHistory') }}" class="btn" style="background-color: #0077b6; color: white;">Kembali ke Riwayat Transaksi</a>
        </div>
    </div>
</div>
@endsection
