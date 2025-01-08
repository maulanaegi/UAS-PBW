<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'writer' => 'required|max:255',
            'publisher' => 'required',
            'synopsis' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|integer',
        ]);

        Book::create($validatedData);
        // toastr()->success('Produk Berhasil Ditambahkan!');
        return redirect()->route('books.index')->with('success', 'Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'writer' => 'required|max:255',
            'publisher' => 'required',
            'synopsis' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|integer',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validatedData);
        return redirect()->route('books.index')->with('success', 'Buku Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect()->route('books.index')->with('success', 'Buku Berhasil Dihapus.');
    }
}
