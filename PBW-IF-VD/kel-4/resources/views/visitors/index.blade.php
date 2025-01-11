@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Daftar Pengunjung Wisata</h2>
    <a href="{{ route('visitors.create') }}" class="btn btn-primary mb-3">Tambah Pengunjung</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Destinasi</th>
                <th>Tanggal Kunjungan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitors as $visitor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $visitor->name }}</td>
                <td>{{ $visitor->email }}</td>
                <td>{{ $visitor->destination }}</td>
                <td>{{ $visitor->visit_date }}</td>
                <td>
                    <a href="{{ route('visitors.edit', $visitor->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('visitors.destroy', $visitor->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
