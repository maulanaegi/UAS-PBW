@extends('layout.template')

@section('konten')
<div class="my-3 p-3 bg-light rounded shadow-sm">
    <!-- Tombol Kembali -->
    <div class="mb-3">
        <a href="{{ url('pemesanan') }}" class="btn btn-dark fw-bold">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Form Update Data -->
    <form action="{{ route('pemesanan.update', $data->no_HP) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Foto Identitas -->
        <div class="mb-3 col-md-6">
            <label for="Foto_Identitas" class="form-label text-dark fw-bold">Foto Identitas</label>
            @if ($data->Foto_Identitas)
                <div class="mb-2">
                    <img src="{{ url('Foto_Identitas/' . $data->Foto_Identitas) }}" alt="Foto Identitas" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                </div>
            @endif
            <input type="file" name="Foto_Identitas" id="Foto_Identitas" class="form-control">
            @error('Foto_Identitas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nama Lengkap -->
        <div class="mb-3 col-md-6">
            <label for="Nama_Lengkap" class="form-label text-dark fw-bold">Nama Lengkap</label>
            <input type="text" class="form-control" name="Nama_Lengkap" id="Nama_Lengkap" value="{{ old('Nama_Lengkap', $data->Nama_Lengkap) }}">
            @error('Nama_Lengkap')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        
        <!-- No HP -->
        <div class="mb-3 col-md-6">
            <label for="no_HP" class="form-label text-dark fw-bold">No HP</label>
            <input type="text" class="form-control" name="no_HP" id="no_HP" value="{{ old('no_HP', $data->no_HP) }}">
            @error('no_HP')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Alamat Email -->
        <div class="mb-3 col-md-6">
            <label for="Alamat_Email" class="form-label text-dark fw-bold">Alamat Email</label>
            <input type="email" class="form-control" name="Alamat_Email" id="Alamat_Email" value="{{ old('Alamat_Email', $data->Alamat_Email) }}">
            @error('Alamat_Email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Seat -->
        <div class="mb-3 col-md-6">
            <label for="Seat" class="form-label text-dark fw-bold">Seat</label>
            <select name="Seat" id="Seat" class="form-control">
                <option value="VIP A" {{ old('Seat', $data->Seat) == 'VIP A' ? 'selected' : '' }}>VIP A</option>
                <option value="VIP B" {{ old('Seat', $data->Seat) == 'VIP B' ? 'selected' : '' }}>VIP B</option>
            </select>
            @error('Seat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

     

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-danger fw-bold">Update</button>
    </form>
</div>
@endsection
