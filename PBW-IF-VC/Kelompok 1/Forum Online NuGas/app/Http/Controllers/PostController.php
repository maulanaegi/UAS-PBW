<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
        public function home()
    {
        $posts = Post::with('comments')->latest()->get();
        return view('home', compact('posts'));
    }

    public function index(Request $request)
    {
        $query = $request->input('search');
        $posts = Post::with('comments')
            ->where('title', 'like', "%{$query}%")
            ->orWhere('body', 'like', "%{$query}%")
            ->latest()
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    
    public function edit(Post $post)
    {
        // Cek apakah pengguna yang sedang login adalah pemilik postingan
        if (auth()->id() !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', 'Anda tidak memiliki izin untuk mengedit postingan ini.');
        }
        return view('posts.edit', compact('post'));
    }

    public function destroy(Post $post)
    {
        // Cek apakah pengguna yang sedang login adalah pemilik postingan
        if (auth()->id() !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', 'Anda tidak memiliki izin untuk menghapus postingan ini.');
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        $query = $request->input('search');
        $posts = Post::with('comments')
            ->where('title', 'like', "%{$query}%")
            ->orWhere('body', 'like', "%{$query}%")
            ->latest()
            ->get();

        return view('posts.index', compact('posts'));
        $post->update($request->only('title', 'body'));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }
    
}