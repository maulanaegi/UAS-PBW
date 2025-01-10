<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Profile;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $buku = Buku::with('kategori_buku')
                    ->when($request->search, function ($query, $search) {
                        $query->where('judul', 'like', "%{$search}%");
                    })
                    ->paginate(6);

        $profile = Profile::where('users_id', Auth::id())->first();

        return view('buku.tampil', compact('buku', 'profile'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $profile = Profile::where('users_id', Auth::id())->first();

        return view('buku.tambah', compact('kategori', 'profile'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'kode_buku' => 'required|unique:buku',
            'kategori_buku' => 'required|array',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $validated;

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        $buku = Buku::create($data);
        $buku->kategori_buku()->sync($validated['kategori_buku']);

        Session::flash('toast', [
            'type' => 'success',
            'message' => 'Berhasil Menambah Data Buku',
        ]);

        return redirect()->route('buku.index');
    }

    public function show($id)
    {
        $buku = Buku::with('kategori_buku')->findOrFail($id);
        $profile = Profile::where('users_id', Auth::id())->first();

        return view('buku.detail', compact('buku', 'profile'));
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        $profile = Profile::where('users_id', Auth::id())->first();

        return view('buku.edit', compact('buku', 'kategori', 'profile'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required',
            'kategori_buku' => 'required|array',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($buku->gambar) {
                Storage::disk('public')->delete($buku->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        $buku->update($validated);
        $buku->kategori_buku()->sync($validated['kategori_buku']);

        Session::flash('toast', [
            'type' => 'success',
            'message' => 'Update Berhasil',
        ]);

        return redirect()->route('buku.index');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->gambar) {
            Storage::disk('public')->delete($buku->gambar);
        }

        $buku->delete();

        Session::flash('toast', [
            'type' => 'success',
            'message' => 'Buku Berhasil Dihapus',
        ]);

        return redirect()->route('buku.index');
    }
}
