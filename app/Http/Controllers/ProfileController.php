<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'title' => 'profile',
        ]);
    }

    public function editProfile()
    {
        $datakelas = Kelas::orderBy('kelas','asc')->get();
        return view('profile.edit', compact('datakelas'),[
            'title' => 'profile',
        ]);
    }

    public function updateProfile(Request $request, $id)
    {
        $data = $request->validate ([
            'nama'           => 'required',
            'jenis_kelamin'  => 'required',
            'tempat_lahir'   => 'required',
            'tanggal_lahir'  => 'required',
            'alamat'         => 'required',
            'asal_sekolah'   => 'required',
            'jurusan'        => 'required',
            'no_telpon'   =>  [
                'required',
                'min:11',
                Rule::unique('mahasiswas')->ignore($id),
            ],
        ]);
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($data);
        return redirect('/profile')->with('mahasiswaedit','Data mahasiswa diubah!');
    }

    public function indexubahpassword() {
        if (Gate::allows('Petugas') || Gate::allows('Admin') || Gate::allows('Mahasiswa'))
        {
            return view('profile.ubahpassword', [
                'title' => 'profile'
            ]);
        } return back();
    }

    public function ubahpassword(Request $request)
    {
        $request->validate([
            'Password_Lama' => ['required'],
            'Password_Baru' => ['required','min:5'],
            'Konfirmasi_Password' => ['required','min:5'],
        ]);

        if (hash::check($request->Password_Lama, auth()->user()->password))
        {
            if ($request->Password_Baru != $request->Konfirmasi_Password)
            {
                Alert::error('Informasi', 'Konfirmasi password tidak sesuai dengan password baru!');
                return redirect('/profile/ubahpassword');
            } else {
                auth()->user()->update(['password' => bcrypt($request->Password_Baru)]);
                Alert::success('Informasi', 'Password telah diperbarui!');
                return redirect('/profile');
            }
        } else
        {
            Alert::error('Informasi', 'Password lama salah, coba lagi!');
            return redirect('/profile/ubahpassword');
        }
    }
}
