<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;

        if (strlen($katakunci)) {
            $data = crud::where('Alamat_Email', 'like', "%$katakunci%")
                ->orWhere('no_HP', 'like', "%$katakunci%")
                ->orWhere('Nama_Lengkap', 'like', "%$katakunci%")
                ->orWhere('Seat', 'like', "%$katakunci%")
               
                ->paginate($jumlahbaris);
        } else {
            $data = crud::orderBy('no_HP', 'desc')->paginate($jumlahbaris);
        }

        return view('crud.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Foto_Identitas' => 'nullable|mimes:jpeg,jpg,png,gif',
            'Alamat_Email' => 'required',
            'no_HP' => 'required|numeric|unique:crud,no_HP|digits:13',
            'Nama_Lengkap' => 'required',
            'Seat' => 'required|',
        
        ], [
            'Foto_Identitas.mimes' => 'Foto harus berekstensi JPG, JPEG, atau PNG.',
            'Alamat_Email.required' => 'Email wajib diisi.',
            'no_HP.required' => 'No HP wajib diisi.',
            'no_HP.numeric' => 'No HP harus berupa angka.',
            'no_HP.unique' => 'No HP sudah terdaftar.',
            'Nama_Lengkap.required' => 'Nama lengkap wajib diisi.',
            'Seat.required' => 'Seat wajib dipilih.',
           
        ]);

        $foto_nama = null;
        if ($request->hasFile('Foto_Identitas')) {
            $foto_file = $request->file('Foto_Identitas');
            $foto_nama = date('ymdhis') . "." . $foto_file->extension();
            $foto_file->move(public_path('Foto_Identitas'), $foto_nama);
        }

        $data = $request->only('Alamat_Email', 'no_HP', 'Nama_Lengkap', 'Seat', 'Status_Pesanan');
        $data['Foto_Identitas'] = $foto_nama;

        crud::create($data);

        return redirect('pemesanan')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function konfirmasi($no_HP)
    {
        $pesanan = crud::where('no_HP', $no_HP)->first();
    
        if ($pesanan) {
            $pesanan->update(['Status_Pesanan' => 'Dikonfirmasi']);
            return redirect('pemesanan/{no_HP}/konfirmasi')->with('success', 'Pesanan berhasil dikonfirmasi.');
        }
    
        return redirect('pemesanan')->with('error', 'Pesanan tidak ditemukan.');
    }
    
    public function showKonfirmasi($no_HP)
{
    // Cari data pesanan berdasarkan nomor HP
    $pesanan = crud::where('no_HP', $no_HP)->first();

    // Jika pesanan tidak ditemukan, redirect dengan pesan error
    if (!$pesanan) {
        return redirect('pemesanan')->with('error', 'Pesanan tidak ditemukan.');
    }

    // Tampilkan view untuk konfirmasi pesanan
    return view('crud.konfirmasi', compact('pesanan'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = crud::where('no_HP', $id)->first();

        return view('crud.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Foto_Identitas' => 'nullable|mimes:jpeg,jpg,png,gif',
            'Alamat_Email' => 'required',
            'no_HP' => 'required',
            'Nama_Lengkap' => 'required',
            'Seat' => 'required',
            
        ], [
            'Foto_Identitas.mimes' => 'Foto harus berekstensi JPG, JPEG, atau PNG.',
            'Alamat_Email.required' => 'Email wajib diisi.',
            'no_HP.required' => 'No HP wajib diisi.',
            'Nama_Lengkap.required' => 'Nama lengkap wajib diisi.',
            'Seat.required' => 'Seat wajib diisi.',
            
        ]);

        $data = $request->only('Alamat_Email', 'no_HP', 'Nama_Lengkap', 'Seat');

        if ($request->hasFile('Foto_Identitas')) {
            $foto_file = $request->file('Foto_Identitas');
            $foto_nama = date('ymdhis') . "." . $foto_file->extension();
            $foto_file->move(public_path('Foto_Identitas'), $foto_nama);

            $data_foto = crud::where('no_HP', $id)->first();
            if ($data_foto && $data_foto->Foto_Identitas) {
                File::delete(public_path('Foto_Identitas') . '/' . $data_foto->Foto_Identitas);
            }

            $data['Foto_Identitas'] = $foto_nama;
        }

        crud::where('no_HP', $id)->update($data);

        return redirect('pemesanan')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = crud::where('no_HP', $id)->first();

        if ($data && $data->Foto_Identitas) {
            File::delete(public_path('Foto_Identitas') . '/' . $data->Foto_Identitas);
        }

        crud::where('no_HP', $id)->delete();

        return redirect('pemesanan')->with('success', 'Data berhasil dihapus.');
}
}
