@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h1 class="text-primary">Edit Data Anggota</h1>
@endsection

@section('content')
    <form action="/anggota/{{ $user->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="card pb-5">
            <div class="form-group mx-4 my-2">
                <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
            </div>

            <div class="form-group mx-4 my-2">
                <label for="npm" class="text-md text-primary font-weight-bold">Nomor Induk Mahasiswa</label>
                <input type="text" name="npm" class="form-control" value="{{ old('npm', $profile->npm) }}">
            </div>

            <div class="form-group mx-4 my-2">
                <label for="prodi" class="text-md text-primary font-weight-bold">Program Studi</label>
                <input type="text" name="prodi" class="form-control" value="{{ old('prodi', $profile->prodi) }}">
            </div>

            <div class="form-group mx-4 my-2">
                <label for="alamat" class="text-md text-primary font-weight-bold">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $profile->alamat) }}">
            </div>

            <div class="form-group mx-4 my-2">
                <label for="noTelp" class="text-md text-primary font-weight-bold">Nomor Telepon</label>
                <input type="text" name="noTelp" class="form-control" value="{{ old('noTelp', $profile->noTelp) }}">
            </div>

            <div class="form-group mx-4 my-2">
                <label for="gambar" class="text-md text-primary font-weight-bold">Tambah Foto Profil</label>
                <div class="custom-file">
                    <input type="file" name="photoProfile" class="form-control" value="{{ old('photoProfile', $profile->photoProfile) }}">
                </div>
            </div>

            <div class="button-save d-flex justify-content-end">
                <a href="/anggota" class="btn btn-danger mt-4 px-3 py-1">Batal</a>
                <button type="submit" class="btn btn-primary mt-4 mx-2 px-4 py-1">Simpan</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
@endsection
