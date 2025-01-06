@extends('layouts.header')

@section('title', 'Beranda')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Cari Postingan</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('posts.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari postingan..." aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    @if(isset($posts) && $posts->isNotEmpty())
        <div class="list-group">
            @foreach ($posts as $post)
                <div class="list-group-item">
                    <h5 class="mb-1">{{ $post->title }}</h5>
                    <p class="mb-1">{{ Str::limit($post->body, 100) }}</p>
                    <p class="text-muted">Jumlah Komentar: {{ $post->comments_count }}</p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-link">Lihat Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">Belum ada postingan.</p>
    @endif
</div>
@endsection

<style>
    .list-group-item {
        transition: transform 0.2s;
    }

    .list-group-item:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>