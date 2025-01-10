<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\Review;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Statistik utama
    $userCount = User::where('role', 'user')->count();
    $providerCount = User::where('role', 'provider')->count();
    $adminCount = User::where('role', 'admin')->count();
    $serviceCount = Service::count();

    // Statistik transaksi
    $transactionsCompleted = Transaction::where('status', 'completed')->count();
    $transactionsPending = Transaction::where('status', 'pending')->count();
    $transactionsInProgress = Transaction::where('status', 'in_progress')->count();
    $transactionsCancelled = Transaction::where('status', 'canceled')->count();

    // Total pendapatan
    $totalRevenue = Transaction::where('status', 'completed')->sum('total_price');

    // Total pendapatan admin dan provider
    $totalAdminEarnings = Transaction::where('status', 'completed')->sum('admin_fee');
    $totalProviderEarnings = Transaction::where('status', 'completed')->sum('provider_fee');

    // Statistik ulasan
    $reviewCount = Review::count();
    $averageRating = Review::avg('rating');

    // Grafik Transaksi Harian (filter berdasarkan created_at)
    $dailyDate = $request->get('daily_date', now()->toDateString()); // Ambil filter tanggal harian

    $dailyTransactions = Transaction::selectRaw('DATE(created_at) as date, COUNT(*) as total,
                                          SUM(CASE WHEN status = "completed" THEN 1 ELSE 0 END) as completed,
																					SUM(CASE WHEN status = "pending" THEN 1 ELSE 0 END) as pending,
																					SUM(CASE WHEN status = "canceled" THEN 1 ELSE 0 END) as canceled,
																					SUM(CASE WHEN status = "in_progress" THEN 1 ELSE 0 END) as in_progress')
                            ->whereDate('created_at', $dailyDate)
                            ->groupBy('date')
                            ->orderBy('date', 'asc')
                            ->get();

    $dailyTransactionDates = $dailyTransactions->pluck('date');
    $dailyTransactionsCompleted = $dailyTransactions->pluck('completed');
    $dailyTransactionsPending = $dailyTransactions->pluck('pending');
    $dailyTransactionsCancelled = $dailyTransactions->pluck('canceled');
    $dailyTransactionsInProgress = $dailyTransactions->pluck('in_progress');

    // Grafik Pendapatan Harian (filter berdasarkan created_at)
    $dailyRevenueDate = $request->get('daily_revenue_date', now()->toDateString()); // Ambil filter tanggal pendapatan harian

    $dailyRevenue = Transaction::selectRaw('DATE(created_at) as date, 
                                            SUM(admin_fee) as admin_fee, 
                                            SUM(provider_fee) as provider_fee')
                                ->where('status', 'completed')
                                ->whereDate('created_at', $dailyRevenueDate) // Filter berdasarkan tanggal created_at
                                ->groupBy('date')
                                ->orderBy('date', 'asc')
                                ->get();

    $dailyRevenueDates = $dailyRevenue->pluck('date');
    $dailyAdminRevenue = $dailyRevenue->pluck('admin_fee');
    $dailyProviderRevenue = $dailyRevenue->pluck('provider_fee');

    // Grafik Pendapatan Bulanan (filter berdasarkan created_at)
    $monthlyRevenueMonth = $request->get('monthly_revenue_month', now()->format('Y-m')); // Ambil filter bulan dan tahun

    $monthlyRevenue = Transaction::selectRaw('MONTH(created_at) as month, 
                                                SUM(admin_fee) as admin_fee, 
                                                SUM(provider_fee) as provider_fee')
                                ->where('status', 'completed')
                                ->whereYear('created_at', substr($monthlyRevenueMonth, 0, 4))
                                ->whereMonth('created_at', substr($monthlyRevenueMonth, 5, 2))
                                ->groupBy('month')
                                ->orderBy('month', 'asc')
                                ->get();

    $monthlyRevenueDates = $monthlyRevenue->map(function ($item) {
        return date('F', mktime(0, 0, 0, $item->month, 1));
    });
    $monthlyAdminRevenue = $monthlyRevenue->pluck('admin_fee');
    $monthlyProviderRevenue = $monthlyRevenue->pluck('provider_fee');

    return view('admin.dashboard', [
        'title' => 'Dashboard Admin',
        'userCount' => $userCount,
        'providerCount' => $providerCount,
        'adminCount' => $adminCount,
        'serviceCount' => $serviceCount,
        'transactionsCompleted' => $transactionsCompleted,
        'transactionsPending' => $transactionsPending,
        'transactionsInProgress' => $transactionsInProgress,
        'transactionsCancelled' => $transactionsCancelled,
        'totalRevenue' => $totalRevenue,
        'totalAdminEarnings' => $totalAdminEarnings,
        'totalProviderEarnings' => $totalProviderEarnings,
        'reviewCount' => $reviewCount,
        'averageRating' => number_format($averageRating, 2),
        'dailyTransactionDates' => $dailyTransactionDates,
        'dailyTransactionsCompleted' => $dailyTransactionsCompleted,
        'dailyTransactionsPending' => $dailyTransactionsPending,
        'dailyTransactionsCancelled' => $dailyTransactionsCancelled,
				'dailyTransactionsInProgress' => $dailyTransactionsInProgress,
        'dailyRevenueDates' => $dailyRevenueDates,
        'dailyAdminRevenue' => $dailyAdminRevenue,
        'dailyProviderRevenue' => $dailyProviderRevenue,
        'monthlyRevenueDates' => $monthlyRevenueDates,
        'monthlyAdminRevenue' => $monthlyAdminRevenue,
        'monthlyProviderRevenue' => $monthlyProviderRevenue,
    ]);
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
