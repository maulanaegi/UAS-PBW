@extends('layout.template')

@section('konten')
<div class="my-3 p-3 bg-light rounded shadow-sm">
    <!-- Tombol Kembali -->
    <div class="mb-3">
        <a href="{{ url('dashboard') }}" class="btn btn-dark fw-bold">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Row dengan Grid -->
    <div class="row g-4">
        <!-- Kolom Form (setengah halaman) -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="text-start fw-bold text-dark mb-4">FORM PEMESANAN TIKET</h4>

                    <!-- Menampilkan Error Jika Ada -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form Input Data -->                    
                    <form action="{{ url('pemesanan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                 
                        
                    <!-- Form Input Lainnya -->                 
                        <div class="mb-3">
                            <label for="Foto_Identitas" class="form-label fw-bold">Foto Identitas</label>
                            <input type="file" class="form-control" name="Foto_Identitas" id="Foto_Identitas">
                            @error('Foto_Identitas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Alamat_Email" class="form-label fw-bold">Alamat Email</label>
                            <input type="email" class="form-control" name="Alamat_Email" id="Alamat_Email" value="{{ old('Alamat_Email') }}" placeholder="Masukkan Alamat Email">
                            @error('Alamat_Email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_HP" class="form-label fw-bold">Nomor HP</label>
                            <input type="text" class="form-control" name="no_HP" id="no_HP" value="{{ old('no_HP') }}" placeholder="Masukkan Nomor HP">
                            @error('no_HP')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Nama_Lengkap" class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" name="Nama_Lengkap" id="Nama_Lengkap" value="{{ old('Nama_Lengkap') }}" placeholder="Masukkan Nama Lengkap">
                            @error('Nama_Lengkap')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Seat" class="form-label fw-bold">Seat</label>
                            <select class="form-control" name="Seat" id="Seat">
                                <option value="" disabled {{ old('Seat') ? '' : 'selected' }}>Pilih Seat Anda</option>
                                <option value="VIP A" {{ old('Seat') == 'VIP A' ? 'selected' : '' }}>VIP A - RP.2.850.000</option>
                                <option value="VIP B" {{ old('Seat') == 'VIP B ' ? 'selected' : '' }}>VIP B - RP.2.500.000</option>
                            </select>
                            @error('Seat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

            

                        <div class="d-flex text-start">
                            <button type="submit" class="btn btn-danger fw-bold px-5 py-2">Simpan</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Kolom Poster (setengah halaman) -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img src="{{ url('logo/ticket.png') }}" alt="Poster Artis" class="img-fluid shadow-sm rounded" style="max-height: 600px; object-fit: cover;">
        </div>
    </div>
</div>
@endsection
