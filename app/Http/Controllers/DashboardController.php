<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            // $peminjaman = Peminjaman::with(['admin', 'anggota', 'detailPeminjaman'])->get();
            $peminjamanCount = Peminjaman::count();
            $anggota = Anggota::all()->count();
            $peminjaman = DetailPeminjaman::where('f_tanggalkembali', '!=', null)->orderBy('f_tanggalkembali', 'desc')->get();

            logger()->info('Authenticated User:', ['user' => $user]);



            $totalBuku = Buku::count();
            $totalKategori = Kategori::count();

            return view('admin/dashboard', [
                'anggota' => $anggota,

                'totalbuku' => $totalBuku,
                'totalKategori' => $totalKategori,
                'peminjaman' => $peminjaman,
                'peminjamanCount' => $peminjamanCount
            ]);
        } else {
            logger()->warning('User not authenticated.');
            return redirect('admin/login')->with('failed', 'Please login to access the dashboard.');
        }
    }
}
