<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua kategori untuk ditampilkan di tabel
        $categories = Category::withCount('services')->paginate(5);
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan modal form untuk tambah kategori
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input kategori
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        // Generate slug berdasarkan nama kategori
        $validated['slug'] = Str::slug($validated['name']);

        // Jika ada gambar yang diupload
        if ($request->hasFile('image_url')) {
            $validated['image_url'] = $request->file('image_url')->store('category_images', 'public');
        }

        // Menyimpan kategori baru ke database
        Category::create($validated);

        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'Kategori berhasil ditambahkan!',
            'icon' => 'success',
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Menampilkan form untuk edit kategori
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validasi input untuk update kategori
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        // Update slug jika nama kategori berubah
        if ($category->name !== $validated['name']) {
            $category->slug = Str::slug($validated['name']);
        }

        // Jika ada gambar baru, hapus gambar lama dan simpan gambar baru
        if ($request->hasFile('image_url')) {
            if ($category->image_url) {
                Storage::disk('public')->delete($category->image_url);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image_url')->store('category_images', 'public');
            $category->image_url = $imagePath; // Simpan path gambar baru ke model
        }

        // Update nama kategori dan slug
        $category->name = $validated['name'];

        // Simpan perubahan
        $category->save();

        // Flash message untuk feedback
        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'Kategori berhasil diperbarui!',
            'icon' => 'success',
        ]);

        return redirect()->route('categories.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Hapus gambar kategori jika ada
        if ($category->image_url) {
            Storage::disk('public')->delete($category->image_url);
        }

        // Hapus kategori dari database
        $category->delete();

        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'Kategori berhasil dihapus!',
            'icon' => 'success',
        ]);

        return redirect()->route('categories.index');
    }
}
