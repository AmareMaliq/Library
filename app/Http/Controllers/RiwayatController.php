<?php

namespace App\Http\Controllers;

use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $user = Auth::guard('anggota')->user()->f_id;

        $riwayat = Peminjaman::where('f_idanggota', $user)->get();
        return view('riwayat', [
            'riwayat' => $riwayat
        ]);
    }
}
