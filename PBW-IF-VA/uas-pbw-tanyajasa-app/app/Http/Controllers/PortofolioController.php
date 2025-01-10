<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    // Menampilkan semua portofolio
    public function index()
    {
        $portofolios = Portofolio::all(); // Atau bisa menyesuaikan sesuai kebutuhan pagination
        return view('portofolios.index', compact('portofolios'));
    }

    // Menyimpan portofolio baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'service_id' => 'required|exists:services,id'
        ]);

        $validated['provider_id'] = auth()->id(); // Menambahkan provider_id
        if ($request->hasFile('image_url')) {
            $validated['image_url'] = $request->file('image_url')->store('portofolio_images', 'public');
        }

        Portofolio::create($validated);

        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'Portofolio berhasil ditambahkan!',
            'icon' => 'success',
        ]);

        return redirect()->back();
    }

    // Menampilkan halaman edit portofolio
    public function edit(Portofolio $portofolio)
    {
        $services = Service::all();
        return view('portofolios.edit', compact('portofolio', 'services'));
    }

    // Memperbarui portofolio
    public function update(Request $request, Portofolio $portofolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'service_id' => 'required|exists:services,id'
        ]);

        if ($request->hasFile('image_url')) {
            // Hapus gambar lama jika ada gambar baru
            if ($portofolio->image_url) {
                Storage::disk('public')->delete($portofolio->image_url);
            }
            $validated['image_url'] = $request->file('image_url')->store('portofolio_images', 'public');
        }

        $portofolio->update($validated);

        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'Portofolio berhasil diperbarui!',
            'icon' => 'success',
        ]);

        return redirect()->back();
    }

    // Menghapus portofolio
    public function destroy(Portofolio $portofolio)
    {
        // Hapus gambar terkait
        if ($portofolio->image_url) {
            Storage::disk('public')->delete($portofolio->image_url);
        }

        $portofolio->delete();

        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'Portofolio berhasil dihapus!',
            'icon' => 'success',
        ]);

        return redirect()->back();
    }
}
