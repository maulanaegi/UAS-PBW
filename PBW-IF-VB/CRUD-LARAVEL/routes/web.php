<?php

use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'main']);
Route::get('/',[SesiController::class,'index']);
Route::post('/',[SesiController::class,'login']);

Route::get('/', function () {
    return view('login');
});

Route::resource('pemesanan', PemesananController::class);
Route::post('pemesanan/{no_HP}/konfirmasi', [PemesananController::class, 'konfirmasi']);


// Rute untuk proses upload
Route::post('/upload-foto', [FotoController::class, 'store'])->name('upload.foto');

// Route untuk menampilkan detail pesanan
Route::get('/pemesanan/{no_HP}', [PemesananController::class, 'show'])->name('pemesanan.show');

Route::get('pemesanan/{no_HP}/konfirmasi', [PemesananController::class, 'showKonfirmasi'])->name('pemesanan.showKonfirmasi');






