<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($username)
    {
        // Ambil data user berdasarkan username
        $user = User::where('username', $username)
            ->with('services') // Muat hanya relasi 'services'
            ->firstOrFail();

      // Ambil portofolio dengan pagination dan relasi 'service'
			$portofolios = $user->portofolios()
			->with('service') // Relasi ke service
			->orderBy('created_at', 'desc')
			->paginate(6, ['*'], 'portofolios_page'); // Tambahkan nama query string unik

			// Ambil services dengan pagination
			$services = $user->services()
			->orderBy('created_at', 'desc')
			->paginate(6, ['*'], 'services_page'); // Tambahkan nama query string unik

        // Cek apakah yang mengakses adalah pemilik profil
        $isOwner = (Auth::check() && Auth::user()->username === $user->username);

        // Jika pengguna adalah provider, tampilkan profil penyedia jasa dengan portofolio dan services terkait
        if ($user->role === 'provider') {
            return view('user-profile.provider', [
                'title' => 'Profil Penyedia Jasa',
                'user' => $user,
                'portofolios' => $portofolios, // Kirim data portofolio dengan pagination
                'services' => $services, // Kirim data services dengan pagination
                'isOwner' => $isOwner
            ]);
        }

        // Jika bukan provider, tampilkan profil umum
        return view('user-profile.index', [
            'title' => 'Profil Pengguna',
            'user' => $user,
            'isOwner' => $isOwner
        ]);
    }






    public function changeRole(User $user)
    {
        // Ganti role user
        $newRole = ($user->role === 'user') ? 'provider' : 'user';
        $user->role = $newRole;
        $user->save();

				session()->flash('alert', [
					'title' => 'Berhasil',
					'text' => 'Role berhasil diubah menjadi ' . ucfirst($newRole),
					'icon' => 'success'
				]);	

        // Redirect ke halaman profil berdasarkan username
        return redirect()->route('user-profile', ['username' => $user->username]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $username)
    {
            $user = User::where('username', $username)->firstOrFail();

            // Validasi input
            $validated = $request->validate([
                    'name' => 'required|string|max:255',
                    'username' => 'required|string|max:255',
                    'whatsapp_number' => 'nullable|string|max:15|regex:/^[0-9]+$/',
                    'profile_description' => 'nullable|string',
                    'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'location_city' => 'nullable|string',
                    'location_state' => 'nullable|string',
                    'latitude' => 'nullable|numeric',
                    'longitude' => 'nullable|numeric',
            ]);

            // Simpan gambar profil jika ada
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
            $user->name = $validated['name'];
            $user->username = $validated['username'];
            $user->whatsapp_number = $validated['whatsapp_number'];
            $user->profile_description = $validated['profile_description'];
            $user->location_city = $validated['location_city'];
            $user->location_state = $validated['location_state'];
            $user->location_lat = $validated['latitude'];
            $user->location_lng = $validated['longitude'];

            $user->save();

            // SweetAlert Notification
            session()->flash('alert', [
                    'title' => 'Berhasil',
                    'text' => 'Profil Anda berhasil diperbarui!',
                    'icon' => 'success'
            ]);

            // Redirect kembali ke halaman profil
            return redirect()->route('user-profile', ['username' => $user->username]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
