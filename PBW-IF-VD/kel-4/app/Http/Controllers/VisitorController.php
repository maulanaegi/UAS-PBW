<?php

namespace App\Http\Controllers;

use App\Models\Visitor; // Pastikan ini ditambahkan
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $visitors = Visitor::all();
    return view('visitors.index', compact('visitors'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('visitors.create');
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'destination' => 'required',
        'visit_date' => 'required|date',
    ]);

    Visitor::create($request->all());
    return redirect()->route('visitors.index')->with('success', 'Visitor added successfully.');
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
    public function edit(Visitor $visitor)
{
    return view('visitors.edit', compact('visitor'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitor $visitor)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'destination' => 'required',
        'visit_date' => 'required|date',
    ]);

    $visitor->update($request->all());
    return redirect()->route('visitors.index')->with('success', 'Visitor updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitor $visitor)
{
    $visitor->delete();
    return redirect()->route('visitors.index')->with('success', 'Visitor deleted successfully.');
}
}
