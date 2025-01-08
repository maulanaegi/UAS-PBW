@extends('layouts.header')

@section('content')
<div class="container">
    <h2>Edit Comment</h2>
    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="content">Comment</label>
            <textarea class="form-control" id="content" name="content" rows="3" required>{{ $comment->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Comment</button>
        <a href="{{ route('posts.show', $comment->post_id) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection