<?php

use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ReviewManagementController;
use App\Http\Controllers\ServiceManagementController;
use App\Http\Controllers\TransactionManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    $categorySlug = $request->query('category'); // Ambil query parameter category
    $services = Service::with(['user', 'category']);

    // Jika ada kategori yang dipilih, filter berdasarkan kategori
    if ($categorySlug) {
        $category = Category::where('slug', $categorySlug)->first();
        if ($category) {
            $services = $services->where('category_id', $category->id);
        }
    }

    $services = $services->paginate(5);
    $categories = Category::all(); // Ambil semua kategori

    return view('home.index', [
        'title' => $categorySlug ? "Jasa dalam Kategori: {$category->name}" : 'Semua Jasa',
        'services' => $services,
        'categories' => $categories,
        'currentCategory' => $category ?? null, // Kirim kategori yang aktif, jika ada
    ]);
})->name('home');


// Menampilkan Riwayat Transaksi
Route::middleware('auth')->delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
Route::middleware('auth')->get('/transactions/history', [TransactionController::class, 'history'])->name('transactions.history');
Route::post('/transactions/{transaction}/update-status', [TransactionController::class, 'updateStatus'])
    ->name('transactions.updateStatus');

Route::post('/midtrans/notification', [TransactionController::class, 'handleNotification'])->name('midtrans.notification');
// Route untuk menangani perubahan status pembayaran langsung
Route::middleware('auth')->get('/transactions/{transaction}/paid', [TransactionController::class, 'markAsPaid'])->name('transactions.paid');
Route::middleware('auth')->get('/transactions/user-history', [TransactionController::class, 'userHistory'])->name('transactions.userHistory');
Route::post('/transactions/{transaction}/cancel', [TransactionController::class, 'cancel'])
    ->middleware('auth')
    ->name('transactions.cancel');

Route::middleware('auth')->get('/transactions/{transaction}/pay', [TransactionController::class, 'showPaymentPage'])->name('transactions.pay');
Route::middleware('auth')->post('/transactions/{transaction}/paid', [TransactionController::class, 'markAsPaid'])->name('transactions.paid');



Route::get('/services', [ServiceController::class, 'index'])->name('service');
Route::get('/services/categories', [ServiceController::class, 'categories'])->name('categories');

Route::middleware('auth')->group(function () {
	Route::get('/services/manage', [ServiceController::class, 'manage'])->name('services.manage');
	Route::post('/services', [ServiceController::class, 'store'])->name('services.store'); // Tambah jasa
	Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit'); // Edit jasa
	Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update'); // Update jasa
	Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy'); // Hapus jasa
	Route::get('/services/category/{slug}', [ServiceController::class, 'category'])->name('services.category');


	Route::resource('portofolios', PortofolioController::class)->except(['show']);
});

Route::get('/services/{service:slug}', [ServiceController::class, 'show']);


Route::get('/services/service-category', function () {
    return view('services.category', [
			'title' => "Kategori"
		]);
});

Route::get('/about', function () {
    return view('about.index', [
			'title' => "Tentang Kami"
		]);
});

// Login & Register
Route::resource('/register', RegisterController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// user
Route::get('/user-profile/{username}', [UserController::class, 'show'])->name('user-profile');
Route::post('/change-role/{user}', [UserController::class, 'changeRole'])->middleware('auth');
Route::put('/user-profile/{username}', [UserController::class, 'update'])->name('user-profile.update');


Route::middleware('auth')->group(function () {
	Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store'); // Tambah ulasan
	Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update'); // Update ulasan
	Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy'); // Hapus ulasan
});


Route::middleware('auth')->group(function () {
    Route::resource('transactions', TransactionController::class)->only(['store', 'show']);
});


Route::get('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');

// **Route Admin**
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/admin/users', [UserManagementController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserManagementController::class, 'create'])->name('admin.users.create');
    Route::get('/admin/users/show', [UserManagementController::class, 'show'])->name('admin.users.show');
    Route::post('/admin/users', [UserManagementController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [UserManagementController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserManagementController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/admin/services', [ServiceManagementController::class, 'index'])->name('admin.services.index');
    Route::post('/admin/services', [ServiceManagementController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/{service}/edit', [ServiceManagementController::class, 'edit'])->name('admin.services.edit');
    Route::put('/admin/services/{service}', [ServiceManagementController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{service}', [ServiceManagementController::class, 'destroy'])->name('admin.services.destroy');

    Route::get('/admin/transactions', [TransactionManagementController::class, 'index'])->name('admin.transactions.index');
    Route::get('/admin/transactions/{transaction}', [TransactionManagementController::class, 'show'])->name('admin.transactions.show');
    Route::post('/admin/transactions/{transaction}/resolve', [TransactionManagementController::class, 'resolve'])->name('admin.transactions.resolve');

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/admin/reviews', [ReviewManagementController::class, 'index'])->name('admin.reviews.index');
    Route::put('/admin/reviews/{review}', [ReviewManagementController::class, 'update'])->name('admin.reviews.update');
    Route::delete('/admin/reviews/{review}', [ReviewManagementController::class, 'destroy'])->name('admin.reviews.destroy');
});

Route::get('export/transaction/{id}', [ExportController::class, 'exportTransaction'])->name('export.transaction');




