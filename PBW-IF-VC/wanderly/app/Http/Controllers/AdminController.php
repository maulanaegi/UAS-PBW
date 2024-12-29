<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Pastikan hanya admin yang bisa mengakses halaman ini
        $title = 'Dashboard';
        return view('admin.dashboard', compact('title'));  // Ganti dengan view dashboard admin Anda
    }
}
