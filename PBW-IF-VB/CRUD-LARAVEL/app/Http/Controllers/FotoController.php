<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function store(Request $request)
    {
        // Validasi file yang diunggah
        $request->validate([
            'Foto_Identitas' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
        ]);

        // Simpan file di storage/public/uploads
        $file = $request->file('foto');
        $path = $file->store('uploads', 'public');

        // Kembalikan pesan sukses dengan URL file yang diunggah
        return back()->with('success', 'Foto berhasil diunggah!')->with('file', $path);
    }
}

