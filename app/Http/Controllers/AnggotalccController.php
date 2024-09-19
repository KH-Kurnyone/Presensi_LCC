<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AnggotalccController extends Controller
{
  public function index()
  {
    $data = Mahasiswa::where('status_ukm', 'Anggota LCC')
      ->orWhere('status_ukm', 'BPH')
      ->with(['kelas' => function ($query) {
        $query->orderBy('angkatan', 'desc');
      }])
      ->orderBy('nama', 'asc')
      ->get()
      ->sortByDesc('kelas.angkatan');

    return view('anggota_lcc.index', [
      'data' => $data,
      'title' => 'anggotalcc'
    ]);
  }
}
