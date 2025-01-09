<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register.index', [
            "title" => "Register"
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
				try {
						$validated = $request->validate([
								"name" => "required|max:255",
								"username" => "required|min:3|max:255|unique:users",
								"email" => "required|email|unique:users",
								"password" => "required|min:5|max:255|confirmed",
						], [
								'username.min' => 'Username minimal 5 karakter.',
								'password.min' => 'Password minimal 5 karakter.',
								'password.confirmed' => 'Konfirmasi password tidak cocok.',
						]);

						$validated["password"] = Hash::make($validated["password"]);

						User::create($validated);

						session()->flash('alert', [
								'title' => 'Berhasil',
								'text' => 'Akun Anda berhasil dibuat. Silakan masuk.',
								'icon' => 'success'
						]);

						return redirect("/login");
				} catch (\Illuminate\Validation\ValidationException $e) {
						$errors = $e->validator->errors()->all();
						session()->flash('alert', [
								'title' => 'Gagal Registrasi',
								'text' => implode("\n", $errors),
								'icon' => 'error'
						]);

						return back()->withInput();
				}
		}

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
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
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
