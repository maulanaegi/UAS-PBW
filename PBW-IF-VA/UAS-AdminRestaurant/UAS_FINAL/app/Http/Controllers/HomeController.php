<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function my_home()
{
            return view('home.index');
        }


    public function index()
{
    if (Auth::id()) {
        $usertype = Auth::user()->user_type; // Perbaiki dari Auth()->user() menjadi Auth::user()

        if ($usertype == 'user') {
            return view('home.index');
        } else {
            return view('admin.index');
        }
    }
}

}
