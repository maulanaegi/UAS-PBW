<?php

use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\cekAdmin;
use App\Http\Middleware\cekLogin;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/my-posts', [PostController::class, 'myPosts'])->name('posts.myPosts');

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [PostController::class, 'home'])->name('home');

Route::resource('posts', PostController::class);
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

// SESI LOGIN

Route::get('/session', [SessionController::class, 'index']);
Route::post('/session/login', [SessionController::class, 'login']);

Route::get('/session/register', [SessionController::class, 'register']);
Route::post('/session/create', [SessionController::class, 'create']);

Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');

Route::get('/session/logout', [SessionController::class, 'logout']);

Route::get('/profile', [SessionController::class, 'profile'])->name('profile');
Route::post('/profile/update', [SessionController::class, 'updateProfile'])->name('profile.update');
Route::delete('/profile/delete', [SessionController::class, 'deleteAccount'])->name('profile.delete');
