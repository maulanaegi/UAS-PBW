<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            // Mulai query dengan relasi yang sudah ada
            $services = Service::with(['user', 'category']);
            
            // Filter berdasarkan keyword (nama jasa)
            if ($request->filled('keyword')) {
                    $services->where('name', 'like', '%' . $request->keyword . '%');
            }

            // Filter berdasarkan kategori
            if ($request->filled('category')) {
                    $category = Category::where('slug', $request->category)->first();
                    if ($category) {
                            $services->where('category_id', $category->id);
                    }
            }

            // Filter berdasarkan lokasi (kota atau provinsi)
            if ($request->filled('location')) {
                    $services->whereHas('user', function ($query) use ($request) {
                            $query->where(function ($query) use ($request) {
                                    // Cari berdasarkan kota atau provinsi
                                    $query->where('location_city', 'like', '%' . $request->location . '%')
                                                ->orWhere('location_state', 'like', '%' . $request->location . '%');
                            });
                    });
            }

            // Ambil data dengan pagination
            $services = $services->paginate(5);

            // Ambil semua kategori untuk filter di view
            $categories = Category::all();

            return view('services.list', [
                    'title' => "Daftar Jasa",  // Bisa disesuaikan sesuai kategori atau pencarian
                    'services' => $services,
                    'categories' => $categories, // Kirim kategori ke view untuk filter dropdown
            ]);
    }

    public function categories(Request $request)
    {
            
            $categories = Category::all();

            return view('services.category', [
                    'title' => "Kategori Jasa",
                    'categories' => $categories,
            ]);
    }

    public function manage()
    {
        $services = Service::where('provider_id', auth()->id())->with('category')->orderBy('created_at', 'desc')->paginate(6);
        $categories = Category::all(); // Ambil semua kategori dari database

        return view('services.manage', [
            'title' => 'Kelola Jasa',
            'services' => $services,
            'categories' => $categories, // Kirimkan kategori ke view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'service_type' => 'required|in:direct,remote', // Validasi service_type
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $data = $validated;
        $data['provider_id'] = auth()->id();

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

        return redirect()->route('services.manage');
    }



    /**
     * Display the specified resource.
     */
    public function show(Service $service)
		{
				$service->load(['category']); // Muat kategori

				// Tambahkan pagination untuk portofolio
				$portfolios = $service->portofolios()->paginate(5, ['*'], 'reviews_page'); // 6 portofolio per halaman

				// Tambahkan pagination untuk ulasan
				$reviews = $service->reviews()->with('user')->paginate(5, ['*'], 'portofolios_page'); // 5 ulasan per halaman

				$averageRating = $service->reviews->avg('rating');

				return view('services.show', [
						"title" => "Service",
						"service" => $service,
						"portfolios" => $portfolios,
						"reviews" => $reviews,
						"averageRating" => number_format($averageRating, 1),
				]);
		}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
		{
				$this->authorize('update', $service); // Pastikan hanya penyedia yang dapat mengedit jasa mereka sendiri

				$validated = $request->validate([
						'name' => 'required|string|max:255',
						'description' => 'required|string',
						'price' => 'required|numeric|min:0',
						'category_id' => 'required|exists:categories,id',
						'service_type' => 'required|in:direct,remote', // Validasi service_type
						'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
				]);

				// Update slug jika name berubah
				$service->slug = Str::slug($request->name . '-provider-' . $service->provider_id);

				// Hapus gambar lama jika ada gambar baru
				if ($request->hasFile('image_url')) {
						// Hapus gambar lama jika ada
						if ($service->image_url) {
								Storage::disk('public')->delete($service->image_url);
						}

						// Simpan gambar baru
						$imagePath = $request->file('image_url')->store('service_images', 'public');
						$service->image_url = $imagePath; // Simpan path gambar baru
				}

				// Update data layanan
				$service->name = $validated['name'];
				$service->description = $validated['description'];
				$service->price = $validated['price'];
				$service->category_id = $validated['category_id'];
				$service->service_type = $validated['service_type'];

				// Simpan perubahan
				$service->save();

				session()->flash('alert', [
						'title' => 'Berhasil',
						'text' => 'Jasa berhasil diperbarui!',
						'icon' => 'success',
				]);

				return redirect()->route('services.manage');
		}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $this->authorize('delete', $service);

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

        return redirect()->route('services.manage');
    }

		public function category($slug)
		{
				$category = Category::where('slug', $slug)->firstOrFail(); // Cari kategori berdasarkan slug

				$services = Service::where('category_id', $category->id)
						->with('user')
						->paginate(5);

				return view('services.list', [
						'title' => 'Kategori: ' . $category->name,
						'services' => $services,
				]);
		}


    

}
