@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Tambah Pengunjung</h2>
    <form action="{{ route('visitors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="destination" class="form-label">Destinasi</label>
            <input type="text" name="destination" id="destination" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="visit_date" class="form-label">Tanggal Kunjungan</label>
            <input type="date" name="visit_date" id="visit_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
