@extends('layout.template')

@section('konten')
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <!-- Notifications -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
        @if (session('success'))
        <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        @endif

        @if (session('error'))
        <div class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" id="errorToast">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        @endif
    </div>

     <!-- TOMBOL KEMBALI -->
<div class="mb-3 d-flex justify-content-between">
    <a href="{{ url('dashboard') }}" class="btn btn-dark fw-bold rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
        <i class="bi bi-arrow-left fw-bold" style="font-size: 1.5rem;"></i>
    </a>
</div>


    <!-- Page Title -->
    <div class="text-center mb-4">
        <h4 class="fw-bold text-dark">DETAIL TIKET PEMESANAN ANDA</h4>
        <p class="text-muted">Informasi detail pemesanan tiket konser</p>
    </div>

    <!-- Layout Container -->
    <div class="container d-flex flex-wrap gap-3">
        <!-- Left Section: Pemesanan Details -->
        <div class="card shadow-lg border-0 flex-grow-1" style="min-width: 300px;">
            <div class="card-body p-5">
                <h5 class="fw-bold mb-4">Detail Pemesanan Tiket</h5>
                @foreach ($data as $item)
                <div class="d-flex align-items-center mb-4">
                    <div class="me-4">
                        @if ($item->Foto_Identitas)
                            <img class="border border-light shadow-sm"
                                style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px;"
                                src="{{ url('Foto_Identitas').'/'.$item->Foto_Identitas }}" alt="Foto">
                        @else
                            <div class="bg-secondary d-flex align-items-center justify-content-center text-white shadow-sm"
                                style="width: 120px; height: 120px; border-radius: 8px;">
                                <i class="bi bi-person fs-1"></i>
                            </div>
                        @endif
                    </div>
                    <div>
                        
                        <p class="text-muted fs-5">
                            <i class="bi bi-people-fill"></i> {{  $item->Nama_Lengkap }} <br>
                            <i class="bi bi-envelope"></i> {{ $item->Alamat_Email }} <br>
                            <i class="bi bi-phone"></i> {{ $item->no_HP }} <br>
                            <i class="bi bi-ticket-perforated"></i> Seat: {{ $item->Seat }}
                        </p>
                        <span class="badge {{ $item->Status_Pesanan === 'Belum Dikonfirmasi' ? 'bg-warning text-dark' : 'bg-success' }} fs-6">
                            {{ $item->Status_Pesanan }}
                        </span>
                    </div>
                </div>

                <!-- Tombol Update, Delete, dan Konfirmasi -->
                <div class="d-flex justify-content-end gap-2">
                    <!-- Tombol Update -->
                    <a href="{{ url('pemesanan/'.$item->no_HP.'/edit') }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Update
                    </a>

                    <!-- Tombol Delete -->
                    <form action="{{ url('pemesanan/'.$item->no_HP) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>

                    <!-- Tombol Konfirmasi -->
                    @if ($item->Status_Pesanan === 'Belum Dikonfirmasi')
                    <a href="{{ route('pemesanan.showKonfirmasi', ['no_HP' => $item->no_HP]) }}" class="btn btn-success btn-sm">
                        <i class="bi bi-check-circle"></i> Konfirmasi
                    </a>
                    @endif
                    
                       
                </div>
                @endforeach
            </div>
        </div>

        

   

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $data->links('pagination::bootstrap-4') }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('success'))
        new bootstrap.Toast(document.getElementById('successToast')).show();
        @endif
        @if (session('error'))
        new bootstrap.Toast(document.getElementById('errorToast')).show();
        @endif
    });
</script>
@endsection
