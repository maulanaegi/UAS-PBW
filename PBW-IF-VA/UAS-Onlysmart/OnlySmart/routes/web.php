<?php

use App\Livewire\HomePage;
use App\Livewire\CategoriesPage;
use App\Livewire\ProductsPage;
use App\Livewire\CartPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\CheckoutPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\MyOrderDetailPage;
use App\Livewire\SuccesPage;
use App\Livewire\CancelPage;
use App\Livewire\auth\LoginPage;
use App\Livewire\auth\RegisterPage;
use App\Livewire\auth\ForgotPasswordPage;
use App\Livewire\auth\ResetPasswordPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductsPage::class);
Route::get('/cart', CartPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);

Route::middleware('guest')->group(function () {

Route::get('/login', LoginPage::class)->name('login');
Route::get('/register', RegisterPage::class);
Route::get('/forgot', ForgotPasswordPage::class)->name('password.request');
Route::get('/reset/{token}', ResetPasswordPage::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
});

Route::get('/checkout', CheckoutPage::class);
Route::get('/my-orders', MyOrdersPage::class);
Route::get('/my-orders/{order_id}', MyOrderDetailPage::class)->name('my-orders.show');
Route::get('/succes', SuccesPage::class)->name('success');
Route::get('/cancel', CancelPage::class)->name('cancel');
});