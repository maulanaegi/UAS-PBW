<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewManagementController extends Controller
{
    public function index(Request $request)
    {
        // Query awal dengan eager loading
        $query = Review::with(['user', 'service']);

        // Filter berdasarkan layanan
        if ($request->has('service_id') && $request->service_id) {
            $query->where('service_id', $request->service_id);
        }

        // Filter berdasarkan rating
        if ($request->has('rating') && $request->rating) {
            $query->where('rating', $request->rating);
        }

        // Pagination hasil query
        $reviews = $query->paginate(10);

        // Load daftar layanan untuk dropdown filter
        $services = \App\Models\Service::all();

        return view('admin.reviews.index', [
            'reviews' => $reviews,
            'services' => $services,
        ]);
    }


    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string',
        ]);

        $review->update($validated);

        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'Ulasan berhasil diperbarui!',
            'icon' => 'success',
        ]);

        return redirect()->route('admin.reviews.index');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'Ulasan berhasil dihapus!',
            'icon' => 'success',
        ]);

        return redirect()->route('admin.reviews.index');
    }
}
