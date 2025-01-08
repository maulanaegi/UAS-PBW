@extends('books.layouts.master')
@section('title', 'Ubah Buku')
@section('content')
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @method('PUT')
        @csrf <!-- CSRF token is required in Laravel forms for security -->
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" 
            id="title" name="title" value="{{ old('title', $book->title ) }}" >
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="writer" class="form-label">Penulis</label>
            <input type="text" class="form-control @error('writer') is-invalid @enderror" 
            id="writer" name="writer" value="{{ old('writer', $book->writer) }}" >
            @error('writer')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="publisher" class="form-label">Penerbit</label>
            <input type="text" class="form-control @error('publisher') is-invalid @enderror" 
            id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" >
            @error('publisher')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Sinopsis</label>
            <textarea id="synopsis" class="form-control @error('synopsis') is-invalid @enderror" 
            name="synopsis">{{ old('synopsis', $book->synopsis) }}</textarea>
            @error('synopsis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" 
            id="stock" name="stock" value="{{ old('stock', $book->stock) }}">
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" 
            id="price" name="price" value="{{ old('price', $book->price) }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Ubah Buku</button>
    </form>
@endsection