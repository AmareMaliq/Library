<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailBuku;
use App\Models\DetailPeminjaman;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BukuController extends Controller
{
    public function index(): View
    {
        $buku = Buku::paginate(10);
        return view('admin.buku', [
            'buku' => $buku,
        ]);
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.add-buku', [
            'kategori' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $validated =  $request->validate([
            'f_judul' => 'required|unique:t_buku|max:225',
            'f_pengarang' => 'required|max:30',
            'f_penerbit' => 'required|max:100',
            'f_idkategori' => 'required|exists:t_kategori,f_id',
            'f_deskripsi' => 'required'

        ]);
        $validatedDetail = $request->validate([
            'f_status' => 'required|in:Tersedia,Tidak Tersedia',
            'f_stock' => 'required|numeric',
        ]);

        $buku = Buku::create($validated);
        $validatedDetail['f_idbuku'] = $buku->f_id;
        DetailBuku::create($validatedDetail);


        return redirect()->route('buku.index')->with('berhasil', 'Buku Berhasil Ditambahkan');
    }
    public function edit($f_id)
    {
        $buku = Buku::where('f_id', $f_id)->first();
        $kategori = Kategori::all();
        return view('admin/edit-buku', [
            'buku' => $buku,
            'kategori' => $kategori
        ]);
    }

    public function update(Request $request, $f_id)
    {
        $buku = Buku::where('f_id', $f_id)->first();

        $validated =  $request->validate([
            'f_judul' => 'required|unique:t_buku,f_judul,' . $buku->f_id . ',f_id|max:225',
            'f_pengarang' => 'required|max:30',
            'f_penerbit' => 'required|max:100',
            'f_idkategori' => 'required|exists:t_kategori,f_id',
            'f_deskripsi' => 'required'
        ]);

        $validatedDetail = $request->validate([
            'f_status' => 'in:Tersedia,Tidak Tersedia',
            'f_stock' => 'numeric'
        ]);

        $buku->update($validated);
        $buku->detailBuku->update($validatedDetail);


        return redirect()->route('buku.index')->with('berhasil', 'Buku berhasil di edit');
    }

    
 
 
    public function destroy($f_id)
    {

        $buku = Buku::where('f_id', $f_id)->first();
        $detailBuku = DetailBuku::where('f_idbuku', $buku->f_id)->first();

        $peminjaman = Detailpeminjaman::where('f_iddetailbuku', $detailBuku->f_id)->first();
        if ($peminjaman->f_tanggalkembali == null) {
            return redirect('admin/buku')->with('failed', 'Buku sedang dipinjam');
        }

        $buku->delete();
        return redirect('admin/buku')->with('berhasil', 'Buku Berhasil Dihapus');
    }

    public function books()
    {
        $buku = Buku::all();
        return view('books', [
            'buku' => $buku,
        ]);
    }
}
