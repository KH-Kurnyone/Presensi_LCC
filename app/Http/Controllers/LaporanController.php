<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Kehadiran;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Statuskehadiran;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kehadiran = null;
        $statuskehadiran = null;
        $hitunghadir = 0;

        // Select Kegiatan
        $datakegiatan = Kegiatan::orderBy('kegiatan', 'asc')->get();

        // $filterKegiatan = $request->kegiatan;
        // $tanggal_awal = $request->tanggal_awal;
        // $tanggal_akhir = $request->tanggal_akhir;

        // if (auth()->user()->can('Admin') || auth()->user()->can('Viewer')) {
        //     $kehadiranQuery = Kehadiran::orderBy('tanggal', 'desc')->where('status', 'Aktif');

        //     if ($filterKegiatan || ($tanggal_awal && $tanggal_akhir)) {
        //         $kehadiranQuery = Kehadiran::orderBy('tanggal', 'desc');

        //         if ($filterKegiatan) {
        //             $kehadiranQuery->where('kegiatan_id', $filterKegiatan);
        //         }

        //         if ($tanggal_awal && $tanggal_akhir) {
        //             $kehadiranQuery->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        //         }
        //     }

        //     $kehadiran = $kehadiranQuery->get();
        // } else {
        //     $kehadiranQuery = Kehadiran::orderBy('tanggal', 'desc')->where('status', 'Aktif');
        //     if ($filterKegiatan) {
        //         $kehadiranQuery->where('kegiatan_id', $filterKegiatan);
        //     }
        //     if ($tanggal_awal && $tanggal_akhir) {
        //         $kehadiranQuery->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        //     }
        //     $kehadiran = $kehadiranQuery->get();
        // }

        $filterKegiatan = $request->kegiatan;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $kehadiran = collect(); // Inisialisasi variabel kehadiran sebagai koleksi kosong

        if (($filterKegiatan || ($tanggal_awal && $tanggal_akhir)) && (auth()->user()->can('Admin') || auth()->user()->can('Viewer'))) {
            // Buat query dasar hanya ketika ada filter
            $kehadiranQuery = Kehadiran::orderBy('tanggal', 'desc')->where('status', 'Aktif');

            if ($filterKegiatan) {
                $kehadiranQuery->where('kegiatan_id', $filterKegiatan);
            }

            if ($tanggal_awal && $tanggal_akhir) {
                $kehadiranQuery->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
            }

            $kehadiran = $kehadiranQuery->get();
        } else if (auth()->user()->cannot('Admin') && auth()->user()->cannot('Viewer')) {
            // Buat query dasar untuk non-admin atau non-viewer hanya ketika ada filter
            if ($filterKegiatan || ($tanggal_awal && $tanggal_akhir)) {
                $kehadiranQuery = Kehadiran::orderBy('tanggal', 'desc')->where('status', 'Aktif');

                if ($filterKegiatan) {
                    $kehadiranQuery->where('kegiatan_id', $filterKegiatan);
                }

                if ($tanggal_awal && $tanggal_akhir) {
                    $kehadiranQuery->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
                }

                $kehadiran = $kehadiranQuery->get();
            }
        }

        // Pastikan $kehadiran kosong jika tidak ada filter yang diberikan

        $statuskehadiranQuery = Statuskehadiran::join('kehadirans', 'statuskehadirans.kehadiran_id', '=', 'kehadirans.id')
            ->join('mahasiswas', 'statuskehadirans.mahasiswa_id', '=', 'mahasiswas.id')
            ->select('statuskehadirans.*')
            ->orderBy('kehadirans.tanggal', 'asc')
            ->orderBy('mahasiswas.nama', 'asc')
            ->with(['kehadiran', 'mahasiswa']);
        if ($filterKegiatan) {
            $statuskehadiranQuery->where('kegiatan_id', $filterKegiatan);
        }
        if ($tanggal_awal && $tanggal_akhir) {
            $statuskehadiranQuery->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        }
        $statuskehadiranQuery->whereIn('kehadiran_id', $kehadiran->pluck('id'));
        $statuskehadiran = $statuskehadiranQuery->get();

        $datalcc = Mahasiswa::where('status_ukm', 'Anggota LCC')
            ->whereHas('kelas', function ($query) {
                $query->where('tingkat', '1');
            })
            ->orderby('nama', 'asc')->get();

        $datakelas = Kelas::where('tingkat', '1')
            ->with(['mahasiswa' => function ($query) {
                $query->orderBy('nama', 'asc');
            }])
            ->orderBy('kelas', 'asc')
            ->get();

        return view('laporan.index', compact('kehadiran', 'statuskehadiran', 'datakelas', 'datakegiatan', 'datalcc'), [
            // 'datalcc'   => $datalcc->get(),
            'title'     => 'laporan',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)
    // {
    //     $kehadiran = null;
    //     $statuskehadiran = null;
    //     $hitunghadir = 0;

    //     $datakegiatan = Kegiatan::orderBy('kegiatan', 'asc')->get();

    //     $filterKegiatan = $request->kegiatan;
    //     $tanggal_awal = $request->tanggal_awal;
    //     $tanggal_akhir = $request->tanggal_akhir;

    //     $kehadiranQuery = Kehadiran::orderBy('tanggal', 'asc');
    //     if ($filterKegiatan) {
    //         $kehadiranQuery->where('kegiatan_id', $filterKegiatan);
    //     }
    //     if ($tanggal_awal && $tanggal_akhir) {
    //         $kehadiranQuery->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
    //     }
    //     $kehadiran = $kehadiranQuery->get();

    //     if ($kehadiran->isEmpty()) {
    //         Alert::error('Tidak Ditemukan!', 'Data kehadiran tidak ditemukan!');
    //     }

    //     $statuskehadiranQuery = Statuskehadiran::join('kehadirans', 'statuskehadirans.kehadiran_id', '=', 'kehadirans.id')
    //         ->join('mahasiswas', 'statuskehadirans.mahasiswa_id', '=', 'mahasiswas.id')
    //         ->select('statuskehadirans.*')
    //         ->orderBy('kehadirans.tanggal', 'asc')
    //         ->orderBy('mahasiswas.nama', 'asc')
    //         ->with(['kehadiran', 'mahasiswa']);
    //     if ($filterKegiatan) {
    //         $statuskehadiranQuery->where('kegiatan_id', $filterKegiatan);
    //     }
    //     if ($tanggal_awal && $tanggal_akhir) {
    //         $statuskehadiranQuery->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
    //     }
    //     $statuskehadiranQuery->whereIn('kehadiran_id', $kehadiran->pluck('id'));
    //     $statuskehadiran = $statuskehadiranQuery->get();

    //     return view('laporan.printlaporan', compact('kehadiran', 'statuskehadiran', 'datakegiatan'));
    // }

    public function create(Request $request)
    {
        $kehadiran = null;
        $statuskehadiran = null;
        $hitunghadir = 0;

        $filterKegiatan = $request->kegiatan;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $kehadiran = collect(); // Inisialisasi variabel kehadiran sebagai koleksi kosong

        if (($filterKegiatan || ($tanggal_awal && $tanggal_akhir)) && (auth()->user()->can('Admin') || auth()->user()->can('Viewer'))) {
            // Buat query dasar hanya ketika ada filter
            $kehadiranQuery = Kehadiran::orderBy('tanggal', 'desc')->where('status', 'Aktif');

            if ($filterKegiatan) {
                $kehadiranQuery->where('kegiatan_id', $filterKegiatan);
            }

            if ($tanggal_awal && $tanggal_akhir) {
                $kehadiranQuery->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
            }

            $kehadiran = $kehadiranQuery->get();
        } else if (auth()->user()->cannot('Admin') && auth()->user()->cannot('Viewer')) {
            // Buat query dasar untuk non-admin atau non-viewer hanya ketika ada filter
            if ($filterKegiatan || ($tanggal_awal && $tanggal_akhir)) {
                $kehadiranQuery = Kehadiran::orderBy('tanggal', 'desc')->where('status', 'Aktif');

                if ($filterKegiatan) {
                    $kehadiranQuery->where('kegiatan_id', $filterKegiatan);
                }

                if ($tanggal_awal && $tanggal_akhir) {
                    $kehadiranQuery->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
                }

                $kehadiran = $kehadiranQuery->get();
            }
        }

        // Pastikan $kehadiran kosong jika tidak ada filter yang diberikan

        $statuskehadiranQuery = Statuskehadiran::join('kehadirans', 'statuskehadirans.kehadiran_id', '=', 'kehadirans.id')
            ->join('mahasiswas', 'statuskehadirans.mahasiswa_id', '=', 'mahasiswas.id')
            ->select('statuskehadirans.*')
            ->orderBy('kehadirans.tanggal', 'asc')
            ->orderBy('mahasiswas.nama', 'asc')
            ->with(['kehadiran', 'mahasiswa']);
        if ($filterKegiatan) {
            $statuskehadiranQuery->where('kegiatan_id', $filterKegiatan);
        }
        if ($tanggal_awal && $tanggal_akhir) {
            $statuskehadiranQuery->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        }
        $statuskehadiranQuery->whereIn('kehadiran_id', $kehadiran->pluck('id'));
        $statuskehadiran = $statuskehadiranQuery->get();

        return view('laporan.printlaporan', compact('kehadiran', 'statuskehadiran'), [
            // 'datalcc'   => $datalcc->get(),
            'title'     => 'laporan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function printlcc()
    {
        $datalcc = Mahasiswa::where('status_ukm', 'Anggota LCC')
            ->whereHas('kelas', function ($query) {
                $query->where('tingkat', '1');
            })
            ->orderby('nama', 'asc')->get();
        return view('laporan.printlcc', [
            'datalcc' => $datalcc,
        ]);
    }
    public function printmi23a()
    {
        $datami23a = Mahasiswa::where('kelas_id', '1')->orderby('nama', 'asc');
        return view('laporan.printlcc', [
            'datalcc' => $datami23a->get(),
        ]);
    }
}
