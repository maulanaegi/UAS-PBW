<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'my_home']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/add_food', [AdminController::class, 'add_food']);
Route::post('/upload_food', [AdminController::class, 'upload_food']);

Route::get('/view_food', [AdminController::class, 'view_food'])->name('view.food');
Route::get('/delete_food/{id}', [AdminController::class, 'delete_food']);

// Rute untuk menampilkan form edit
Route::get('/update_food/{id}', [AdminController::class, 'edit_food'])->name('edit_food');

// Rute untuk menyimpan pembaruan data makanan
Route::post('/update_food/{id}', [AdminController::class, 'update_food'])->name('update_food');

// Middleware untuk rute yang memerlukan autentikasi
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
