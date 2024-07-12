<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $datamahasiswa = Mahasiswa::where('tingkat','1')->count();
        $datalcc = Mahasiswa::where('status_ukm','Anggota LCC')->where('tingkat','1')->count();
        $datakelas = Kelas::where('status','Aktif')->orderBy('kelas','asc')->get();

        return view('dashboard.index', [
            'datamahasiswa' => $datamahasiswa,
            'datalcc' => $datalcc,
            'datakelas' => $datakelas,
            'title' => 'dashboard',
        ]);
    }
}
