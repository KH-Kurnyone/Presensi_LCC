<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $dataprodi = Prodi::all()->count();
        $datamahasiswa = Mahasiswa::all()->count();
        // $dataprodimi = Mahasiswa::where('prodi_id','1')->count();
        $dataprodimi = Mahasiswa::with('kelas')->with('prodi', 'prodi')->count();
        $datalcc = Mahasiswa::where('status_ukm','Anggota LCC')->count();

        return view('master.index', [
            'dataprodi' => $dataprodi,
            'datamahasiswa' => $datamahasiswa,
            'dataprodimi' => $dataprodimi,
            'datalcc' => $datalcc,
            'title' => 'dashboard',
        ]);
    }
}
