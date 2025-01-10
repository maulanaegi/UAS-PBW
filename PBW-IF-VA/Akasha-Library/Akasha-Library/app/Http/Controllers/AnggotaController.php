<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class AnggotaController extends Controller
{
    // Menampilkan daftar anggota
    public function index()
    {
        $iduser = Auth::id();
        $user = User::where('isAdmin', 0)->get();
        $profile = Profile::where('users_id', $iduser)->first();

        return view('anggota.tampil', ['anggota' => $user, 'profile' => $profile]);
    }

    // Menampilkan form tambah anggota
    public function create()
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id', $iduser)->first();

        return view('anggota.tambah', ['profile' => $profile]);
    }

    // Menyimpan anggota baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'npm' => 'required|unique:profile',
            'prodi' => 'required',
            'alamat' => 'required',
            'noTelp' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Profile::create([
            'npm' => $request->npm,
            'prodi' => $request->prodi,
            'alamat' => $request->alamat,
            'noTelp' => $request->noTelp,
            'users_id' => $user->id,
        ]);

        // Ganti dengan Session::flash untuk menampilkan pesan menggunakan Toastr
        Session::flash('toast', [
            'type' => 'success',
            'message' => 'Berhasil Menambah Anggota',
        ]);

        return redirect('/anggota');
    }

    // Menampilkan detail anggota
    public function show($id)
    {
        $user = User::findOrFail($id);
        $profile = Profile::where('users_id', $id)->firstOrFail();
        $pinjamanUser = Peminjaman::where('users_id', $user->id)->get();

        return view('anggota.detail', compact('user', 'profile', 'pinjamanUser'));
    }

    // Menampilkan form edit anggota
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $profile = Profile::where('users_id', $id)->firstOrFail();

        return view('anggota.edit', compact('user', 'profile'));
    }

    // Mengupdate data anggota
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'npm' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'noTelp' => 'required',
            'photoProfile' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::findOrFail($id);
        $profile = Profile::where('users_id', $id)->firstOrFail();

        if ($request->hasFile('photoProfile')) {
            if ($profile->photoProfile) {
                Storage::delete('images/photoProfile/' . $profile->photoProfile);
            }

            $photoName = time() . '.' . $request->photoProfile->extension();
            $request->photoProfile->storeAs('images/photoProfile', $photoName, 'public');
            $profile->photoProfile = $photoName;
        }

        $user->name = $request->name;
        $profile->npm = $request->npm;
        $profile->prodi = $request->prodi;
        $profile->alamat = $request->alamat;
        $profile->noTelp = $request->noTelp;

        $user->save();
        $profile->save();

        // Ganti dengan Session::flash untuk menampilkan pesan menggunakan Toastr
        Session::flash('toast', [
            'type' => 'success',
            'message' => 'Berhasil Mengubah Profile',
        ]);

        return redirect('/anggota');
    }

    // Menghapus anggota
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->profile && $user->profile->photoProfile) {
            Storage::delete('images/photoProfile/' . $user->profile->photoProfile);
        }

        $user->delete();

        // Ganti dengan Session::flash untuk menampilkan pesan menggunakan Toastr
        Session::flash('toast', [
            'type' => 'success',
            'message' => 'Buku Berhasil Dihapus',
        ]);

        return redirect('/anggota');
    }
}
