<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function main()
    {
        // Data yang ingin ditampilkan di dashboard bisa ditambahkan di sini
        return view('dashboard.main');
    }
}
