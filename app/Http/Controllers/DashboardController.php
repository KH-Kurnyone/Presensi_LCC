<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Statuskehadiran;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // $datamahasiswa = Mahasiswa::count();
    // $datalcc = Mahasiswa::where('status_ukm','Anggota LCC')->count();
    // $datakelas = Kelas::where('tingkat','1')->orderBy('kelas','asc')->get();
    public function index(Request $request)
    {
        $requestType = $request->input('requestType');

        // Logika untuk AJAX request
        if ($requestType === 'mahasiswa') {
            $tingkat = $request->input('tingkat', '1');
            $mahasiswa = Mahasiswa::whereHas('kelas', function ($query) use ($tingkat) {
                $query->where('tingkat', $tingkat);
            })->count();
            $kelas = Kelas::where('tingkat', $tingkat)->orderBy('kelas', 'asc')->get();

            return view('dashboard.partials._mahasiswaData', compact('mahasiswa', 'kelas'))->render();
        }

        if ($requestType === 'mahasiswaLCC') {
            $tingkatLCC = $request->input('tingkatLCC', '1');
            $mahasiswaLCC = Mahasiswa::whereHas('kelas', function ($query) use ($tingkatLCC) {
                $query->where('tingkat', $tingkatLCC);
            })->where(function ($query) {
                $query->where('status_ukm', 'Anggota LCC')
                    ->orWhere('status_ukm', 'BPH');
            })->count();
            $kelasLCC = Kelas::where('tingkat', $tingkatLCC)->orderBy('kelas', 'asc')->get();

            return view('dashboard.partials._mahasiswaLCC', compact('mahasiswaLCC', 'kelasLCC'))->render();
        }

        // Logika untuk tampilan default (non-AJAX)
        $tingkat = $request->input('tingkat', '1');
        $mahasiswa = Mahasiswa::whereHas('kelas', function ($query) use ($tingkat) {
            $query->where('tingkat', $tingkat);
        })->count();
        $kelas = Kelas::where('tingkat', $tingkat)->orderBy('kelas', 'asc')->get();

        $tingkatLCC = $request->input('tingkatLCC', '1');
        $mahasiswaLCC = Mahasiswa::whereHas('kelas', function ($query) use ($tingkatLCC) {
            $query->where('tingkat', $tingkatLCC);
        })->where(function ($query) {
            $query->where('status_ukm', 'Anggota LCC')
                ->orWhere('status_ukm', 'BPH');
        })->count();
        $kelasLCC = Kelas::where('tingkat', $tingkatLCC)->orderBy('kelas', 'asc')->get();

        $dataKegiatan = Kegiatan::orderBy('kegiatan', 'asc')->get();

        // $top7Mahasiswa = Statuskehadiran::select('mahasiswa_id', DB::raw('COUNT(CASE WHEN status_kehadiran = "Hadir" THEN 1 END) as total_hadir'), DB::raw('COUNT(CASE WHEN keterangan LIKE "Telat%" THEN 1 END) as total_telat'))
        //     ->whereHas('kehadiran', function ($query) {
        //         $query->where('status', 'Aktif');
        //     })
        //     ->groupBy('mahasiswa_id')
        //     ->join('mahasiswas', 'statuskehadirans.mahasiswa_id', '=', 'mahasiswas.id')
        //     ->orderBy('total_hadir', 'desc')
        //     ->orderBy('total_telat', 'asc')
        //     ->orderBy('mahasiswas.nama', 'asc')
        //     ->take(7)
        //     ->get();

        $kegiatanId = $request->input('kegiatan_id');

        $top7Mahasiswa = Statuskehadiran::with('mahasiswa') // Eager load mahasiswa
            ->select('mahasiswa_id', DB::raw('COUNT(CASE WHEN status_kehadiran = "Hadir" THEN 1 END) as total_hadir'), DB::raw('COUNT(CASE WHEN keterangan LIKE "Telat%" THEN 1 END) as total_telat'))
            ->when($kegiatanId, function ($query, $kegiatanId) {
                return $query->whereHas('kehadiran', function ($q) use ($kegiatanId) {
                    $q->where('kegiatan_id', $kegiatanId)->where('status', 'Aktif');
                });
            }, function ($query) {
                return $query->whereHas('kehadiran', function ($q) {
                    $q->where('status', 'Aktif');
                });
            })
            ->groupBy('mahasiswa_id')
            ->join('mahasiswas', 'statuskehadirans.mahasiswa_id', '=', 'mahasiswas.id')
            ->orderBy('total_hadir', 'desc')
            ->orderBy('total_telat', 'asc')
            ->orderBy('mahasiswas.nama', 'asc')
            ->take(7)
            ->get();


        // Jika permintaan menggunakan AJAX, kembalikan data JSON
        if ($request->ajax()) {
            return response()->json($top7Mahasiswa);
        }

        return view('dashboard.index', [
            // Total Mahasiswa Terdaftar
            'mahasiswa'     => $mahasiswa,
            'kelas'         => $kelas,

            // Total Anggota LCC
            'mahasiswaLCC'  => $mahasiswaLCC,
            'kelasLCC'      => $kelasLCC,
            'tingkatLCC'    => $tingkatLCC,

            'dataKegiatan'  => $dataKegiatan,
            'top7Mahasiswa'  => $top7Mahasiswa,

            'title'         => 'dashboard',
        ]);
    }

    public function getOrganizationData(Request $request)
    {
        $tingkat = $request->input('tingkat', '1'); // Pastikan tingkat adalah string

        $data = Mahasiswa::selectRaw("
        SUM(CASE WHEN status_ukm IN ('Anggota LCC', 'BPH') THEN 1 ELSE 0 END) as anggota,
        SUM(CASE WHEN status_ukm = 'Bukan Anggota' THEN 1 ELSE 0 END) as bukanAnggota
    ")
            ->whereHas('kelas', function ($query) use ($tingkat) {
                $query->where('tingkat', $tingkat);
            })
            ->first();

        return response()->json($data);
    }

    public function getAttendanceData(Request $request)
    {
        $month = $request->input('month', date('m')); // Ambil bulan dari request atau gunakan bulan saat ini
        $year = date('Y'); // Tahun saat ini

        $attendanceData = DB::table('statuskehadirans')
            ->join('kehadirans', 'statuskehadirans.kehadiran_id', '=', 'kehadirans.id')
            ->join('kegiatans', 'kehadirans.kegiatan_id', '=', 'kegiatans.id')
            ->select(
                'kegiatans.kegiatan',
                DB::raw('SUM(CASE WHEN status_kehadiran = "Hadir" THEN 1 ELSE 0 END) as hadir'),
                DB::raw('SUM(CASE WHEN status_kehadiran = "Sakit" THEN 1 ELSE 0 END) as sakit'),
                DB::raw('SUM(CASE WHEN status_kehadiran = "Izin" THEN 1 ELSE 0 END) as izin'),
                DB::raw('SUM(CASE WHEN status_kehadiran = "Alfa" THEN 1 ELSE 0 END) as alfa')
            )
            ->whereMonth('kehadirans.tanggal', $month)
            ->whereYear('kehadirans.tanggal', $year)
            ->groupBy('kegiatans.kegiatan')
            ->get();

        return response()->json($attendanceData);
    }

    // 'datamahasiswa' => $datamahasiswa,
    // 'datalcc' => $datalcc,
    // 'datakelas' => $datakelas,
}
