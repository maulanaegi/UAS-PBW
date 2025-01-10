<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Profile;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RiwayatPinjamController extends Controller
{
    public function index()
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id', $iduser)->first();
        $peminjam = Peminjaman::with(['user', 'buku'])->orderBy('updated_at', 'desc')->get();
        $pinjamanUser = Peminjaman::where('users_id', $iduser)->get();

        // Return view tanpa mendeklarasikan tipe data
        return view('peminjaman.tampil', [
            'profile' => $profile,
            'peminjam' => $peminjam,
            'pinjamanUser' => $pinjamanUser,
        ]);
    }

    public function create()
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id', $iduser)->first();
        $buku = Buku::where('status', 'In Stock')->get();
        $user = User::all();

        $peminjam = Auth::user()->isAdmin == 1
            ? Profile::where('users_id', '>', 1)->get()
            : $profile;

        return view('peminjaman.tambah', [
            'profile' => $profile,
            'users' => $user,
            'buku' => $buku,
            'peminjam' => $peminjam,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'users_id' => 'required',
            'buku_id' => 'required',
        ], [
            'users_id.required' => 'Harap masukkan nama peminjam',
            'buku_id.required' => 'Masukkan buku yang akan dipinjam',
        ]);

        $request['tanggal_pinjam'] = Carbon::now()->toDateString();
        $request['tanggal_wajib_kembali'] = Carbon::now()->addDays(7)->toDateString();


        $buku = Buku::findOrFail($request->buku_id);

        if ($buku->status !== 'In Stock') {
            Session::flash('toast', [
                'type' => 'warning',
                'message' => 'Buku sudah dipinjam atau tidak tersedia.',
            ]);
            return redirect('/peminjaman/create');
        }

        $count = Peminjaman::where('users_id', $request->users_id)
            ->whereNull('tanggal_pengembalian')
            ->count();

        if ($count >= 3) {
            Session::flash('toast', [
                'type' => 'warning',
                'message' => 'User telah mencapai limit untuk meminjam buku.',
            ]);
            return redirect('/peminjaman/create');
        }

        try {
            DB::transaction(function () use ($request, $buku) {
                Peminjaman::create($request->all());
                $buku->status = 'dipinjam';
                $buku->save();
            });

            Session::flash('toast', [
                'type' => 'success',
                'message' => 'Berhasil meminjam buku.',
            ]);
            return redirect('/peminjaman');
        } catch (\Throwable $th) {
            Session::flash('toast', [
                'type' => 'error',
                'message' => 'Terjadi kesalahan saat memproses peminjaman.',
            ]);
            return redirect('/peminjaman/create');
        }
    }
}
