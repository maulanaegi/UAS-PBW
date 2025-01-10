<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Profile;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PengembalianController extends Controller
{
    public function index(){
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        $buku = Buku::where('status','dipinjam')->get();
        $user = User::all();
        $peminjam = Profile::where('users_id','>','1')->get();

        return view('pengembalian.pengembalian',['profile'=>$profile,'users'=>$user,'buku'=>$buku, 'peminjam'=>$peminjam]);
    }

    public function pengembalian(Request $request ){

        $pinjaman = Peminjaman::where('users_id',$request->users_id)
            ->where('buku_id',$request->buku_id)
            ->where('tanggal_pengembalian',null);
        $dataPinjaman = $pinjaman->first();
        $count = $pinjaman->count();

        if($count == 1){
            try {
                DB::beginTransaction();
                // Update data tanggal pengembalian
                $dataPinjaman->tanggal_pengembalian = Carbon::now()->toDateString();
                $dataPinjaman->save();

                // Update status buku
                $buku = Buku::findOrFail($request->buku_id);
                $buku->status = 'In Stock';
                $buku->save();

                DB::commit();

                // Menyimpan pesan Toastr menggunakan session
                Session::flash('toast', [
                    'type' => 'success',
                    'message' => 'Berhasil Mengembalikan Buku',
                ]);

                return redirect('/peminjaman');
            } catch (\Throwable $th) {
                DB::rollback();
                // Menyimpan pesan Toastr menggunakan session jika terjadi error
                Session::flash('toast', [
                    'type' => 'error',
                    'message' => 'Terjadi kesalahan, coba lagi nanti.',
                ]);
                return redirect('/pengembalian');
            }
        } else {
            // Menyimpan pesan Toastr jika buku tidak ditemukan
            Session::flash('toast', [
                'type' => 'warning',
                'message' => 'Buku yang dipinjam salah atau tidak ada',
            ]);
            return redirect('/pengembalian');
        }
    }
}
