<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ServiceManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::with('category', 'user');

        // Filter Berdasarkan Kategori
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $services = $query->latest()->paginate(10);
        $categories = Category::all();
        $providers = User::where('role', 'provider')->get(); // Hanya user dengan role provider

        return view('admin.services.index', [
            'title' => 'Manajemen Layanan',
            'services' => $services,
            'categories' => $categories,
            'providers' => $providers, // Kirim data providers ke view
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'service_type' => 'required|in:direct,remote',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'provider_id' => 'required|exists:users,id',
        ]);

        $data = $validated;

        // Upload gambar jika ada
        if ($request->hasFile('image_url')) {
            $data['image_url'] = $request->file('image_url')->store('service_images', 'public');
        }

        Service::create($data);

        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'Jasa berhasil ditambahkan!',
            'icon' => 'success',
        ]);

        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'service_type' => 'required|in:direct,remote', // Validasi service_type
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         // Update slug jika name berubah
         $service->slug = Str::slug($request->name . '-provider-' . $service->provider_id);

        // Hapus gambar lama jika ada gambar baru
        if ($request->hasFile('image_url')) {
            if ($service->image_url) {
                Storage::disk('public')->delete($service->image_url);
            }
            $service->image_url = $request->file('image_url')->store('service_images', 'public');
        }

        // Update data layanan
        $service->update($validated);

        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'Jasa berhasil diperbarui!',
            'icon' => 'success',
        ]);

        return redirect()->route('admin.services.index');
    }

    public function destroy(Service $service)
    {
        // $this->authorize('delete', $service);

        // Hapus gambar terkait
        if ($service->image_url) {
            Storage::disk('public')->delete($service->image_url);
        }

        $service->delete();

        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'Jasa berhasil dihapus!',
            'icon' => 'success',
        ]);

        return redirect()->route('admin.services.index');
    }
}
