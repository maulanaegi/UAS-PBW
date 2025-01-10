<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Profile;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id', $iduser)->first();
        $kategori = Kategori::all();
        return response()->view('kategori.tampil', ['kategori' => $kategori, 'profile' => $profile]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id', $iduser)->first();
        return response()->view('kategori.tambah', ['profile' => $profile]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:2',
        ], [
            'nama.required' => "Masukkan nama kategori",
            'nama.min' => "Minimal 2 karakter"
        ]);

        Kategori::create($request->all());

        Session::flash('toast', [
            'type' => 'success',
            'message' => 'Berhasil Menambahkan Kategori',
        ]);
        
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $iduser = Auth::id();
    $profile = Profile::where('users_id', $iduser)->first();
    $kategori = Kategori::findOrFail($id);
    
    // Menggunakan relasi kategori_buku untuk mengambil buku yang terkait dengan kategori
    $buku = Buku::whereHas('kategori_buku', function ($query) use ($id) {
        $query->where('kategori_id', $id); // Filter berdasarkan kategori_id di tabel pivot
    })->get();
    
    return response()->view('kategori.detail', ['kategori' => $kategori, 'profile' => $profile, 'buku' => $buku]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id', $iduser)->first();
        $kategori = Kategori::findOrFail($id);
        return response()->view('kategori.edit', ['kategori' => $kategori, 'profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:2',
        ], [
            'nama.required' => "Masukkan nama kategori",
            'nama.min' => "Minimal 2 karakter"
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();

        Session::flash('toast', [
            'type' => 'success',
            'message' => 'Update Success',
        ]);
        
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        Session::flash('toast', [
            'type' => 'success',
            'message' => 'Berhasil Menghapus Kategori',
        ]);

        return redirect()->route('kategori.index');
    }
}
