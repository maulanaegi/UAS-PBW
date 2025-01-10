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
            <h5 class="text-white">Detail Transaksi</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Penyedia Jasa:</strong> {{ $transaction->provider->name }}
            </div>
            <div class="mb-3">
                <strong>Layanan:</strong> {{ $transaction->service->name }}
            </div>
            <div class="mb-3">
                <strong>Status:</strong> 
                <span class="badge bg-warning">{{ ucfirst($transaction->status) }}</span>
            </div>
            <div class="mb-3">
                <strong>Total Harga:</strong> Rp {{ number_format($transaction->total_price, 2, ',', '.') }}
            </div>
            <div class="mb-3">
                <strong>Whatsapp:</strong> {{ $transaction->whatsapp_number }}
            </div>
            <div class="mb-3">
                <strong>Email:</strong> {{ $transaction->email }}
            </div>
            <div class="mb-3">
                <strong>Tanggal:</strong> {{ $transaction->created_at->format('d M Y') }}
            </div>

            <!-- Tombol Bayar -->
            @if($transaction->status === 'in_progress')
            <a href="javascript:void(0)" id="pay-button" class="btn w-100" style="background-color: #0077b6; color:white;">Bayar Sekarang</a>
            @else
                <p class="text-muted">Status transaksi harus "Dalam Proses" untuk melakukan pembayaran.</p>
            @endif
        </div>
    </div>
</div>

<!-- Script Midtrans Snap -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                console.log(result);
                alert('Pembayaran berhasil!');
                // Redirect ke endpoint untuk mengupdate status pembayaran
                window.location.href = '/transactions/{{ $transaction->id }}/paid?payment_status=success';
            },
            onPending: function(result) {
                console.log(result);
                alert('Menunggu pembayaran!');
            },
            onError: function(result) {
                console.log(result);
                alert('Pembayaran gagal!');
            }
        });
    });
</script>


@endsection
