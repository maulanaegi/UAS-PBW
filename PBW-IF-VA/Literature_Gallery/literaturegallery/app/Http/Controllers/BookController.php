<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(6);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'nama_buku' => 'required',
        'nama_penulis' => 'required',
        'tahun_terbit' => 'required|numeric',
        'foto' => 'required|image|mimes:jpeg,png,jpg',
    ]);

    $foto = $request->file('foto');
    $foto->storeAs('public', $foto->hashName());

    Book::create([
        'nama_buku' => $request->nama_buku,
        'nama_penulis' => $request->nama_penulis,
        'tahun_terbit' => $request->tahun_terbit,
        'sinopsis' => $request->sinopsis,
        'foto' => $foto->hashName()
    ]);

    return redirect()->route('books.index')->with('success', 'Book Added Successfully');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'nama_buku' => 'required',
            'nama_penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
        ]);
        
        $book->nama_buku = $request->nama_buku;
        $book->nama_penulis = $request->nama_penulis;
        $book->sinopsis = $request->sinopsis;

        if($request->file('foto')) {

            if($book->foto !== "noimage.png") {
                Storage::disk('local')->delete('public/' . $book->foto);
            }
    
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $book->foto = $foto->hashName();
        }

        $book->update();

        return redirect()->route('books.index')->with('success', 'Book Updated Successfully');
    }

    public function destroy(Book $book)
    {
        if($book->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $book->foto);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book Deleted Successfully');
    }

}
