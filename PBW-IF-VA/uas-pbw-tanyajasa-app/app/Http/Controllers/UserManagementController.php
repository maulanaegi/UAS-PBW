<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserManagementController extends Controller
{
    // Tampilkan daftar pengguna dengan filter
    public function index(Request $request)
    {
        $query = User::query();

        // Filter berdasarkan peran
        if ($request->has('role') && in_array($request->role, ['admin', 'provider', 'user'])) {
            $query->where('role', $request->role);
        }

        // Filter berdasarkan status
        if ($request->has('status') && in_array($request->status, ['active', 'suspended', 'deleted'])) {
            $query->where('status', $request->status);
        }

        $users = $query->paginate(10);

        return view('admin.users.index', [
            'title' => 'Manajemen Pengguna',
            'users' => $users,
        ]);
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5',
            'whatsapp_number' => 'nullable|string|max:15|regex:/^[0-9]+$/',
            'profile_description' => 'nullable|string',
            'role' => ['required', Rule::in(['admin', 'provider', 'user'])],
            'status' => ['required', Rule::in(['active', 'suspended', 'deleted'])],
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location_city' => 'nullable|string',
            'location_state' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Membuat pengguna baru
        $data = $validated;
        User::create($data);

        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'User berhasil ditambahkan!',
            'icon' => 'success',
        ]);

        return redirect()->route('admin.users.index');
    }


    // Menampilkan detail pengguna
    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'user' => $user,
        ]);
    }

    // Mengedit data pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'user' => $user,
        ]);
    }

    // Memperbarui data pengguna
    public function update(Request $request, $id)
    {
        // Mencari user berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'whatsapp_number' => 'nullable|string|max:15|regex:/^[0-9]+$/',
            'profile_description' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => ['required', Rule::in(['admin', 'provider', 'user'])],
            'status' => ['required', Rule::in(['active', 'suspended', 'deleted'])],
            'location_city' => 'nullable|string',
            'location_state' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        if ($request->hasFile('profile_picture')) {
            // Hapus gambar lama jika ada
            if ($user->profile_picture) {
                    Storage::disk('public')->delete($user->profile_picture);
            }

            // Simpan gambar baru
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $imagePath;
        }

        // Update data user
        $user->update($validated);

        // SweetAlert Notification
        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'Data User berhasil diperbarui!',
            'icon' => 'success'
        ]);

        // Redirect kembali ke halaman profil
        return redirect()->route('admin.users.index');
    }



    // Menghapus pengguna
    public function destroy($id)
    {
        // Mencari user berdasarkan ID
        $user = User::findOrFail($id);

        // // Otorisasi, pastikan user dapat menghapus
        // $this->authorize('delete', $user);

        // Hapus gambar terkait jika ada
        if ($user->image_url && Storage::disk('public')->exists($user->image_url)) {
            Storage::disk('public')->delete($user->image_url);
        }

        // Hapus user
        $user->delete();

        // Flash session untuk notifikasi
        session()->flash('alert', [
            'title' => 'Berhasil',
            'text' => 'User berhasil dihapus!',
            'icon' => 'success',
        ]);

        // Redirect kembali ke halaman pengelolaan jasa
        return redirect()->route('admin.users.index');
    }

}
