<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Bukucontroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RiwayatController;
use App\Models\Buku;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::middleware(['guest'])->group(function () {
    Route::get('admin/login', [LoginController::class, 'loginFormAdmin']);


    Route::post('admin/login', [LoginController::class, 'prosesLoginAdmin']);

    Route::get('anggota/login', [LoginController::class, 'loginForm']);


    Route::post('anggota/login', [LoginController::class, 'prosesLogin']);
});

Route::middleware(['logBerhasil'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/riwayat', [RiwayatController::class, 'index']);

});

Route::get('/books', [BukuController::class, 'books']);

Route::middleware(['auth:admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index']);
    Route::resource('admin/buku', Bukucontroller::class);
    Route::resource('admin/pengguna', PenggunaController::class);
    route::resource('admin/admin', AdminController::class);
    route::resource('admin/kategori', KategoriController::class);

    route::post('admin/peminjaman/{f_id}', [PeminjamanController::class, 'pengembalian'])->name('pengembalian');

    route::resource('admin/peminjaman', PeminjamanController::class)->except(['show']);


    Route::get('admin/peminjaman/pdf', [PeminjamanController::class, 'pdf']);
});
