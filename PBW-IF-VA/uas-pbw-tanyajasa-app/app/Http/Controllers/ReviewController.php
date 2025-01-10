<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $validated['user_id'] = auth()->id();

        Review::create($validated);

        return back()->with('alert', [
            'title' => 'Berhasil',
            'text' => 'Ulasan berhasil ditambahkan!',
            'icon' => 'success',
        ]);
    }

    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $review->update($validated);

        return back()->with('alert', [
            'title' => 'Berhasil',
            'text' => 'Ulasan berhasil diperbarui!',
            'icon' => 'success',
        ]);
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);

        $review->delete();

        return back()->with('alert', [
            'title' => 'Berhasil',
            'text' => 'Ulasan berhasil dihapus!',
            'icon' => 'success',
        ]);
    }
}
