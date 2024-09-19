<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('master.login');
    }

    public function login(Request $request)
    {
        $cek = $request->validate([
            'username'   => 'required',
            'password'   => 'required'
        ]);

        if (Auth::attempt($cek)) {
            $request->session()->regenerate();
            $user = auth()->user();
            $level = $user->role;

            if ($level == 'Mahasiswa') {
                // $mahasiswa = Mahasiswa::where('id', $user->mahasiswa_id)->where('status_ukm', 'Anggota LCC')->orWhere('status_ukm', 'BPH')->first();
                $mahasiswa = Mahasiswa::where('id', $user->mahasiswa_id)
                    ->where(function ($query) {
                        $query->where('status_ukm', 'Anggota LCC')
                            ->orWhere('status_ukm', 'BPH');
                    })
                    ->first();
                if (!$mahasiswa) {
                    Auth::logout();
                    Alert::error('Login Gagal', 'Anda tidak memiliki akses.');
                    return back();
                }
            }
            if ($level == 'Admin' || $level == 'Petugas' || $level == 'Viewer') {
                return redirect()->intended('/dashboard')->with('login', 'Selamat Datang Di Website E-Presence LCC');
            } elseif ($level == 'Mahasiswa' && $mahasiswa) {
                return redirect()->intended('/profile')->with('login', 'Selamat Datang Di Website E-Presence LCC');
            }
        } else {
            Alert::error('Login Gagal', 'Email atau Password salah.');
            return back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }
}
