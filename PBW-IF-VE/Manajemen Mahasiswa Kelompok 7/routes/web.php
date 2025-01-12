<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MahasiswaController::class,'index']);

Route::get('/add-mahasiswa', function() {
    return view('addMahasiswa');
});

Route::get('/update/{id}', [MahasiswaController::class, 'update']);
Route::post("/update/{id}", [MahasiswaController::class, "ubah"]);

Route::post('/add-mahasiswa', [MahasiswaController::class, 'tambah']);

Route::get("/delete/{id}", [MahasiswaController::class,"delete"]);