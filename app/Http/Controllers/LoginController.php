<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginFormAdmin()
    {


        return view('admin/login');
    }
    public function loginForm()
    {

        if (Auth::guard('anggota')->check() || Auth::guard('admin')->check()) {
            return redirect('/');
        } else {
            return view('anggota/login');
        }
    }

    public function prosesLoginAdmin(Request $request)
    {
        $cek = [
            'f_username' => $request->f_username,
            'password' => $request->f_password,
        ];


        if (Auth::guard('admin')->attempt($cek)) {
            if (Auth::guard('admin')->user()->f_status == 'Tidak Aktif') {
                return redirect('admin/login')->with('failed', 'Admin tidak aktif,silahkan minta akses ke admin');
            }
            if (Auth::guard('admin')->user()->f_level == 'Admin') {
                return redirect('admin/dashboard')->with('berhasil', 'Selamat datang admin');
            } else {
                return redirect('admin/dashboard')->with('berhasil', 'Selamat datang pustakawan');
            }
        } else {
            return redirect('admin/login')->with('failed', 'Username / Password Tidak Valid');
        }
    }


    public function prosesLogin(Request $request)
    {
        $data = [
            'f_username' => $request->f_username,
            'password' => $request->f_password,
        ];

        if (Auth::guard('anggota')->attempt($data)) {

            return redirect('/');
        } else {
            return redirect('anggota/login')->with('failed', 'Username / Password Tidak Valid');
        }
    }

    public function logout()
    {
        $admin = Auth::guard('admin')->user();
        $anggota = Auth::guard('anggota')->user();

        if ($admin) {
            Auth::guard('admin')->logout();
            return redirect('admin/login')->with('success', 'Anda berhasil logout.');
        }

        if ($anggota) {
            Auth::guard('anggota')->logout();
            return redirect('anggota/login')->with('success', 'Anda berhasil logout.');
        }
    }
}
