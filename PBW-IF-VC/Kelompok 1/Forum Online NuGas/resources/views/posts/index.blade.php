@extends('layouts.header')
@section('title', 'Daftar Post')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Daftar Post</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Buat Post Baru</a>
    @if ($posts->isEmpty())
        <p class="text-center">Belum ada post.</p>
    @else
        <div class="list-group">
            @foreach ($posts as $post)
                <div class="list-group-item">
                    <h5 class="mb-1">{{ $post->title }}</h5>
                    <p class="mb-1">{{ Str::limit($post->body, 100) }}</p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')">Hapus</button>
                        </form>
                    </div>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-link">Lihat Selengkapnya</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection