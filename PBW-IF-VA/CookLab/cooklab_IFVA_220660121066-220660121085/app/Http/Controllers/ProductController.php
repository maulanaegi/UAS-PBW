<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'durasi' => 'required|integer',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg'
        ], [
            'nama.required' => 'Nama produk harus diisi.',
            'durasi.required' => 'Durasi harus diisi.',
            'durasi.integer' => 'Durasi harus berupa angka.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'foto.required' => 'Foto harus diunggah.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto hanya boleh memiliki format jpeg, png, atau jpg.',
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());
    
        Product::create([
            'nama' => $request->nama,
            'durasi' => $request->durasi,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto->hashName()
        ]);
    
        return redirect()->route('products.index')->with('success', 'Tambah Resep Berhasil');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'durasi' => 'required|integer',
            'deskripsi' => 'required|string',
        ], [
            'nama.required' => 'Harap mengisi formulir ini.',
            'durasi.required' => 'Durasi harus diisi.',
            'durasi.integer' => 'Durasi harus berupa angka.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
        ]);


        $product->nama = $request->nama;
        $product->durasi = $request->durasi;
        $product->deskripsi = $request->deskripsi;

        if ($request->file('foto')) {

            Storage::disk('local')->delete('public/', $product->foto);
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $product->foto = $foto->hashName();
        }

        $product->update();

        return redirect()->route('products.index')->with('success', 'Update Resep Berhasil');
    }

    public function destroy(Product $product)
    {
        if ($product->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $product->foto);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Hapus Resep Berhasil');
    }
}
