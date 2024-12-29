<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PenggunaController extends Controller
{
    public function index(): View
    {
        $anggota = Anggota::all();
        return view('admin/pengguna', [
            'anggota' => $anggota,
        ]);
    }

    public function create(): View

    {
        return view('admin.add-pengguna');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'f_nama' => 'required|max:255',
            'f_username' => 'required|unique:t_anggota|max:100',
            'f_password' => 'required|min:6 ',
            'f_tempatlahir' => 'required|max:255',
            'f_tanggallahir' => 'required'

        ]);
        $validated['f_password'] = Hash::make($validated['f_password']);
        Anggota::create($validated);
        return redirect()->route('pengguna.index')->with('berhasil', 'Pengguna baru berhasil ditambahkan');
    }



    public function edit($f_id): View
    {

        $anggota = Anggota::where('f_id', $f_id)->first();

        return view('admin.edit-pengguna', [
            'anggota' => $anggota
        ]);
    }

    public function show($f_id)
    {
        $anggota = Anggota::where('f_id', $f_id)->first();
        $peminjaman = Peminjaman::where('f_idanggota', $anggota->f_id)->get();
        return view('admin/detail-anggota', [
            'anggota' => $anggota,
            'peminjaman' => $peminjaman
        ]);
    }

    public function update(Request $request, $f_id)
    {
        $anggota = Anggota::where('f_id', $f_id)->first();

        $validated = $request->validate([
            'f_nama' => 'required|max:255',
            'f_username' => 'required|max:255|unique:t_anggota,f_username,' . $anggota->f_id . ',f_id',
            'f_password' => 'nullable',
            'f_tempatlahir' => 'required|max:256',
            'f_tanggallahir' => 'required',
        ]);

        $validated['f_password'] = Hash::make($validated['f_password']);
        $anggota->update($validated);
        return redirect('admin/pengguna')->with('berhasil', 'Anggota berhasil di update');
    }

    public function destroy($f_id)
    {
        $anggota = Anggota::where('f_id', $f_id)->first();

        $peminjaman = Peminjaman::where('f_idanggota', $anggota->f_id)->first();
        if ($peminjaman) {
            return redirect('admin/anggota')->with('error', 'anggota sedang meminjam');
        }

        $anggota->delete();
        return redirect('admin/anggota')->with('delete', 'anggota Berhasil Dihapus');
    }
}
