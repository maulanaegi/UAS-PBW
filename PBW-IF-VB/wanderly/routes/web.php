<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});
Route::get('/', [DestinationController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->middleware('isAdmin');
});

require __DIR__.'/auth.php';


Route::get('/destination', [DestinationController::class, 'index']);
Route::get('/destination/{id}', [DestinationController::class, 'show']);

Route::middleware(['auth', 'role:admin'])->prefix('/dashboard')->group(function () {
    // Rute-rute untuk admin
    Route::get('/', [DestinationController::class, 'dashboard'])->name('destinations.index');
    Route::get('/create', [DestinationController::class, 'create'])->name('destinations.create');
    Route::post('/', [DestinationController::class, 'store'])->name('destinations.store');
    Route::put('/{destination}', [DestinationController::class, 'update'])->name('destinations.update');
    Route::delete('/{destination}', [DestinationController::class, 'destroy'])->name('destinations.destroy');

    // Rute untuk edit destination
    Route::prefix('/destination')->name('dashboard.')->group(function () {
        Route::get('/edit/{destination}', [DestinationController::class, 'edit'])->name('destinations.edit');
    });
});

Route::get('/about', function () {
    return view('about/index', ['title' => 'About Us']);
});