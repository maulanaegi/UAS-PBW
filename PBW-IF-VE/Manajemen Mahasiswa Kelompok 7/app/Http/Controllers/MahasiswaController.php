<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index(Request $request) {
        $data = DB::table("mahasiswa")->get();

        return response()->view("index", [
            "data" => $data
        ]);
    }

    public function update(Request $request, $id) {
        $data = DB::table("mahasiswa")->find($id);

        return response()->view("update", [
            "data"=> $data,
        ]);
    }
    public function tambah(Request $request) {
       
         $request = [
            "nim" => $request->post('nim'),
            "nama" => $request->post('nama'),
            "program_studi" => $request->post("program_studi"),
            "email" => $request->post("email"),
            "tanggal_lahir" => $request->post("tanggal_lahir"),
            "jenis_kelamin" => $request->post("jenis_kelamin"),
            "alamat" => $request->post("alamat"),
            "no_hp" => $request->post("no_hp")
        ];

        $inserted = DB::table("mahasiswa")->insert($request);

        if($inserted) {
            return redirect("/add-mahasiswa")->with("success","");
        }
        return redirect("")->with("error","");
    }

    public function ubah(Request $request, $id) {
        $request = [
            "nim" => $request->post('nim'),
            "nama" => $request->post('nama'),
            "program_studi" => $request->post("program_studi"),
            "email" => $request->post("email"),
            "tanggal_lahir" => $request->post("tanggal_lahir"),
            "jenis_kelamin" => $request->post("jenis_kelamin"),
            "alamat" => $request->post("alamat"),
            "no_hp" => $request->post("no_hp")
        ];

        $updated = DB::table("mahasiswa")->where(["id" => $id])->update($request);

        if($updated) {
            return redirect("/update/" . $id)->with("success","");
        }
        return redirect("")->with("error","");
    }

    public function delete(Request $request, $id) {
        $deleted = DB::table("mahasiswa")->where(["id" => $id])->delete();

        if($deleted) {
            return redirect("/")->with("success","");
        }
        return redirect('/')->with('error','');
    }
}
