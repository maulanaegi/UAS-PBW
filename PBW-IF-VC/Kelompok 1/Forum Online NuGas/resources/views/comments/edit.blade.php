@extends('layouts.header')

@section('title', 'Edit Comment')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Edit Comment</h1>
    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="body">Comment</label>
            <textarea class="form-control" id="body" name="body" rows="3" required>{{ $comment->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Comment</button>
        <a href="{{ route('posts.show', $comment->post_id) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection