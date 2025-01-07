<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'synopsis' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        Book::create($validatedData);
        return redirect('/books')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'synopsis' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        Book::whereId($id)->update($validatedData);
        return redirect('/books')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/books')->with('success', 'Buku berhasil dihapus!');
    }
}
