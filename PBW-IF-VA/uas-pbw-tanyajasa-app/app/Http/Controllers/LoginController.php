<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.index', [
            "title" => "Login"
    ]);
    }

    public function authenticate(Request $request)
		{
				try {
						$credentials = $request->validate([
								"username" => "required",
								"password" => "required"
						]);

						if (Auth::attempt($credentials)) {
								$request->session()->regenerate();

								// Cek role pengguna yang login
								if (Auth::user()->role === 'admin') {
										session()->flash('alert', [
												'title' => 'Berhasil Login',
												'text' => 'Selamat datang, Admin!',
												'icon' => 'success'
										]);
										return redirect()->intended('/dashboard');
								}

								session()->flash('alert', [
										'title' => 'Berhasil Login',
										'text' => 'Selamat datang di aplikasi kami!',
										'icon' => 'success'
								]);
								return redirect()->intended('/');
						}

						// Jika login gagal
						session()->flash('alert', [
								'title' => 'Login Gagal',
								'text' => 'Username atau password yang Anda masukkan salah.',
								'icon' => 'error'
						]);

						return back();
				} catch (\Illuminate\Validation\ValidationException $e) {
						// Tampilkan pesan kesalahan validasi
						$errors = $e->validator->errors()->all();
						session()->flash('alert', [
								'title' => 'Login Gagal',
								'text' => 'Terdapat kesalahan:\n' . implode("\n", $errors),
								'icon' => 'error'
						]);

						return back()->withInput();
				}
		}

		public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

				session()->flash('alert', [
					'title' => 'Logout Berhasil',
					'text' => 'Anda telah keluar dari sesi ini.',
					'icon' => 'success'
				]);

        return redirect('/');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
