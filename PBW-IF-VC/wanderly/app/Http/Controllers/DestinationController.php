<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $destinations = Destination::all();
        // return view('destinations.index', compact('destinations'));
        $title = 'Dashboard Admin';
        return view('admin.dashboard', compact('destinations', 'title'));
    }

    public function index()
    {
        $destinations = Destination::all(); // Mengambil semua data destinasi

        return view('destinations.index', [
            'title' => 'Destination Page',
            'destinations' => $destinations, // Kirim data ke view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Dashboard Admin (Add Destination)';
        return view('admin.destinations.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
        }
    
        Destination::create([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
            'category' => $request->category,
        ]);

        return redirect()->route('destinations.index')->with('success', 'Destination created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $destination = Destination::findOrFail($id);

        // Kirim data ke view
        return view('destinations.destination', [
            'title' => $destination->name, // Judul halaman
            'destination' => $destination, // Data destinasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $destination = Destination::findOrFail($id);
        $title = 'Admin Dashboard (Edit Destination)';
        return view('admin.destinations.edit', compact('destination', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Ambil destinasi berdasarkan ID
        $destination = Destination::findOrFail($id);
    
        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
        } else {
            // Jika tidak ada gambar, gunakan gambar yang lama
            $imageName = $destination->image;
        }
    
        // Update data destinasi
        $destination->update([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
            'category' => $request->category,
        ]);

        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully.');
    }

    public function home()
    {
        $destinations = Destination::take(4)->get(); // Ambil 4 data teratas
        $title = 'Home Page';
        return view('home', compact('destinations', 'title'));
    }
}
