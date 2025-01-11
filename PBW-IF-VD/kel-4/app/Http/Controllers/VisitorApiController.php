<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorApiController extends Controller
{
    public function index()
    {
        return response()->json(Visitor::all(), 200);
    }

    public function show($id)
    {
        $visitor = Visitor::find($id);

        if (!$visitor) {
            return response()->json(['message' => 'Visitor not found'], 404);
        }

        return response()->json($visitor, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'destination' => 'required',
            'visit_date' => 'required|date',
        ]);

        $visitor = Visitor::create($request->all());

        return response()->json($visitor, 201);
    }

    public function update(Request $request, $id)
    {
        $visitor = Visitor::find($id);

        if (!$visitor) {
            return response()->json(['message' => 'Visitor not found'], 404);
        }

        $visitor->update($request->all());

        return response()->json($visitor, 200);
    }

    public function destroy($id)
    {
        $visitor = Visitor::find($id);

        if (!$visitor) {
            return response()->json(['message' => 'Visitor not found'], 404);
        }

        $visitor->delete();

        return response()->json(['message' => 'Visitor deleted successfully'], 200);
    }
}
