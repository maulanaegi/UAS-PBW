<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Notifications\NewComment;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string',
        ]);
    
        // Create the comment and store it in a variable
        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);
    
        // Notify the post's user about the new comment
        $post->user->notify(new NewComment($comment));
    
        return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully.');
    }

    public function edit(Comment $comment)
    {
        // Cek apakah pengguna yang sedang login adalah pemilik komentar
        if (auth()->id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengedit komentar ini.');
        }
        return view('comments.edit', compact('comment'));
    }
    
    public function destroy(Comment $comment)
    {
        // Cek apakah pengguna yang sedang login adalah pemilik komentar
        if (auth()->id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
        }
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $comment->update($request->only('body'));

        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comment updated successfully.');
    }
}