@extends('layout.template')

@section('konten')
<div class="my-3 p-3 bg-white rounded shadow-sm">
    
    <!-- SEMUA STRUK PESANAN -->
    <div class="mb-4 bg-white rounded-lg shadow-lg p-4">
        <div class="d-flex align-items-center mb-3">
            <img src="https://storage.googleapis.com/a1aa/image/LGB4Mq4CTO6rBRzPH0bmlKSt3wmrciHvQ4iA8RO8pz61RrAF.jpg" alt="Concert poster" class="rounded me-3" style="width: 60px; height: 60px;">
            <div class="flex-grow-1">
                <h6 class="mb-0 text-dark fw-bold">{{ $pesanan->event_name ?? 'DAY6 3RD WORLD TOUR in JAKARTA' }}</h6>
            </div>
            <a href="#" class="text-primary fw-bold">Detail</a>
</div>

<div class="mb-4">
    <h6 class="text-muted">Nama_Lengkap</h6>
    <h5 class="fw-bold text-dark"> {{ $pesanan->Nama_Lengkap }}</h4>
</div>

<div class="mb-4">
    <h6 class="text-muted">Email</h6>
    <h5 class="fw-bold text-dark"> {{ $pesanan->Alamat_Email }}</h4>
</div>

<div class="mb-4">
    <h6 class="text-muted">NO HP</h6>
    <h5 class="fw-bold text-dark"> {{ $pesanan->no_HP }}</h4>
</div>

<div class="mb-4">
    <h6 class="text-muted">Seat</h6>
    <h5 class="fw-bold text-dark"> {{ $pesanan->Seat }}</h4>
</div>

<div class="mb-4">
    <h6 class="text-muted">Tanggal</h6>
    <h5 class="fw-bold text-dark"> Sabtu, 3 Mei 2025</h4>
</div>


        <div class="border-top pt-3">
            <p class="text-secondary mb-1"><i class="bi bi-ban text-gray-500 mr-2"></i> Tidak bisa refund</p>
            <p class="text-secondary mb-1"><i class="bi bi-check-circle-fill text-gray-500 mr-2"></i> Konfirmasi Instan</p>
            <p class="text-secondary"><i class="bi bi-hourglass-split text-gray-500 mr-2"></i> Berlaku di tanggal terpilih</p>
        </div>

        <div class="border-top pt-3 mt-3">
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0 fw-bold text-dark">Total Pembayaran:</p>
                <p class="mb-0 fw-bold text-dark">IDR 2.850.000</p>
            </div>
        </div>
    </div>
 
</div>

<!-- Toast Notification -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
    <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="confirmationToast">
        <div class="d-flex">
            <div class="toast-body">
                <i class="bi bi-check-circle"></i> Pesanan berhasil dikonfirmasi!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toastElement = document.getElementById('confirmationToast');
        const toast = new bootstrap.Toast(toastElement);
        toast.show();
    });
</script>
@endsection
