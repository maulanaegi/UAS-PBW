<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Transaction::with(['user', 'provider', 'service']);

        // Filter berdasarkan status
        if ($request->has('status') && in_array($request->status, ['pending', 'in_progress', 'completed', 'canceled'])) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan pengguna atau penyedia jasa
        if ($request->has('user')) {
            $query->where('user_id', $request->user);
        }

        if ($request->has('provider')) {
            $query->where('provider_id', $request->provider);
        }

        $transactions = $query->paginate(10);

        return view('admin.transactions.index', [
            'title' => 'Manajemen Transaksi',
            'transactions' => $transactions,
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
        $transaction = Transaction::with(['user', 'provider', 'service'])->findOrFail($id);

        return response()->json($transaction);
    }


    public function resolve(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,completed,canceled',
            'resolution_note' => 'nullable|string|max:500',
        ]);

        $transaction->update([
            'status' => $validated['status'],
            'resolution_note' => $validated['resolution_note'] ?? null,
        ]);

        return back()->with('alert', [
            'title' => 'Berhasil',
            'text' => 'Catatan Resolusi berhasil ditambahkan!.',
            'icon' => 'success',
        ]);
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
