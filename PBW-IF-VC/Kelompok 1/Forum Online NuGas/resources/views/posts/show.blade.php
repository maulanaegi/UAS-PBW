@extends('layouts.header')
@section('title', 'Detail Post')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">{{ $post->title }}</h1>
        <p class="text-muted">Dibuat oleh {{ $post->user->username }} pada {{ $post->created_at->format('d M Y') }}</p>
        <div class="card mb-4">
            <div class="card-body">
                <p>{{ $post->body }}</p>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')">Hapus</button>
            </form>
        </div>

        <h3>Komentar</h3>
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="body">Tulis komentar:</label>
                <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
        </form>

        <hr>

        @if($post->comments->isEmpty())
            <p class="text-center">Belum ada komentar.</p>
        @else
            <ul class="list-group mt-3">
                @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>{{ $comment->user->username }}</strong> <span class="text-muted">{{ $comment->created_at->format('d M Y H:i') }}</span>
                        <p>{{ $comment->body }}</p>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')">Hapus</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection