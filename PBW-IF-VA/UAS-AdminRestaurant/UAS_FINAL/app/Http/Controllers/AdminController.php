<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class AdminController extends Controller
{
    // Menampilkan form tambah makanan
    public function add_food()
    {
        return view('admin.add_food');
    }

    // Menyimpan data makanan baru
    public function upload_food(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = new Food;
        $data->title = $request->title;
        $data->detail = $request->details;
        $data->price = $request->price;

        // Proses upload gambar
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('food_img'), $filename);
            $data->image = $filename;
        }

        $data->save();

        return redirect()->back()->with('success', 'Food added successfully.');
    }

    // Menampilkan daftar makanan
    public function view_food()
    {
        $data = Food::all();
        return view('admin.show_food', compact('data'));
    }

    // Menghapus makanan berdasarkan ID
    public function delete_food($id)
    {
        $data = Food::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Food deleted successfully.');
        }
        return redirect()->back()->with('error', 'Food not found.');
    }

    // Menampilkan form edit makanan
    public function edit_food($id)
    {
        $data = Food::find($id);
        if ($data) {
            return view('admin.update_food', compact('data'));
        }
        return redirect()->back()->with('error', 'Food not found.');
    }

    // Menyimpan pembaruan data makanan
    public function update_food(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = Food::find($id);
        if ($data) {
            $data->title = $request->title;
            $data->detail = $request->details;
            $data->price = $request->price;

            // Perbarui gambar jika diunggah
            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('food_img'), $filename);
                $data->image = $filename;
            }

            $data->save();
            return redirect()->route('view.food')->with('success', 'Food updated successfully.');
        }
        return redirect()->back()->with('error', 'Food not found.');
    }
}
