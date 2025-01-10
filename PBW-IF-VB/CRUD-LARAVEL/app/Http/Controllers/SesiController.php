<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
       echo"hallo";
    }
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib Di Isi',
            'password.required'=>'Password Wajib Di Isi',
        ]);
        $infologin=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($infologin)){
           return redirect('/dashboard');
        }else{
            return redirect('')->withErrors('Username dan password yang dimasuan tidak sesuai')->withInput();
 }
}
}