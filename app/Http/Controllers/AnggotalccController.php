<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AnggotalccController extends Controller
{
  public function index() {
    $data = Mahasiswa::where('status_ukm','Anggota LCC')
    ->orderBy('tingkat','asc')
    ->orderBy('angkatan','desc')
    ->orderBy('nama','asc');

    return view('anggota_lcc.index' ,[
        'data' => $data->get(),
        'title' => 'anggotalcc'
    ]);
  }
}
