<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Kehadiran;
use App\Models\Mahasiswa;
use App\Models\Sesi;
use App\Models\SesiDet;
use App\Models\Statuskehadiran;
use Faker\Core\DateTime;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->can('Admin') || auth()->user()->can('Viewer')) {
            $dataadmin = Kehadiran::with('sesiDet.sesi')->orderBy('tanggal', 'desc')->latest();
        } else {
            $dataadmin = Kehadiran::with('sesiDet.sesi')->where('status', 'Aktif')->orderBy('tanggal', 'desc')->latest();
        }
        // $data = Kehadiran::where('user_id', auth()->user()->id)->orderBy('tanggal','desc')->latest();

        return view('kehadiran.index', [
            'datakehadiranadmin' => $dataadmin->get(),
            // 'datakehadiran' => $data->get(),
            'title' => 'kehadiran',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datakegiatan = Kegiatan::orderBy('kegiatan', 'asc')->get();
        $dataSesi = Sesi::orderBy('sesi', 'asc')->get();
        $dataPemateri = Mahasiswa::where('status_ukm', 'BPH')
            ->whereHas('kelas', function ($query) {
                $query->where('tingkat', '2');
            })
            ->orderBy('nama', 'asc')
            ->get();

        $data = Mahasiswa::where('status_ukm', 'Anggota LCC')
            ->whereHas('kelas', function ($query) {
                $query->where('tingkat', '1');
            })
            ->orderBy('nama', 'asc')
            ->get();

        return view('kehadiran.add', [
            'datakegiatan' => $datakegiatan,
            'dataSesi' => $dataSesi,
            'dataPemateri' => $dataPemateri,
            'datamahasiswa' => $data,
            'title' => 'kehadiran',
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
        $this->validate($request, [
            'mahasiswa_id'        => 'required',
            'sesi_id'             => 'required|array',
            'sesi_id.*'           => 'required|exists:sesis,id',
            'tanggal'             => 'required|date',
            'kegiatan_id'         => 'required|exists:kegiatans,id',
            'ket_kegiatan'        => 'required|string',
            'status_kehadiran'    => 'required|array',
            'status_kehadiran.*'  => 'required|in:Hadir,Sakit,Izin,Alfa',
        ]);

        // Create Kehadiran
        $kehadiran = Kehadiran::create([
            'mahasiswa_id'  => $request->mahasiswa_id,
            'tanggal'       => $request->tanggal,
            'kegiatan_id'   => $request->kegiatan_id,
            'ket_kegiatan'  => $request->ket_kegiatan,
            'user_id'       => auth()->user()->id,
            'status'        => 'Aktif',
        ]);

        // Create SesiDet
        foreach ($request->sesi_id as $sesi_id) {
            $dataSesiDet[] = [
                'kehadiran_id' => $kehadiran->id,
                'sesi_id'      => $sesi_id,
            ];
        }
        SesiDet::insert($dataSesiDet);

        // Create StatusKehadiran
        // foreach ($request->status_kehadiran as $mahasiswaId => $status_kehadiran) {
        //     $dataStatusKehadiran[] = [
        //         'kehadiran_id'     => $kehadiran->id,
        //         'mahasiswa_id'     => $mahasiswaId,
        //         'status_kehadiran' => $status_kehadiran,
        //         // 'waktu_hadir'      => $request->waktu_hadir[$mahasiswaId],
        //         // 'keterangan'       => $request->keterangan[$mahasiswaId],
        //         'created_at'       => now(),
        //         'updated_at'       => now(),
        //     ];
        // }
        // StatusKehadiran::insert($dataStatusKehadiran);

        // foreach ($request->status_kehadiran as $mahasiswaId => $status_kehadiran) {
        //     $dataStatusKehadiran[] = [
        //         'kehadiran_id'     => $kehadiran->id,
        //         'mahasiswa_id'     => $mahasiswaId,
        //         'status_kehadiran' => $status_kehadiran,
        //         'waktu_hadir'      => empty($request->waktu_hadir[$mahasiswaId]) ? null : $request->waktu_hadir[$mahasiswaId],
        //         'keterangan'       => $request->keterangan[$mahasiswaId],
        //         'created_at'       => now(),
        //         'updated_at'       => now(),
        //     ];
        // }
        // StatusKehadiran::insert($dataStatusKehadiran);

        foreach ($request->status_kehadiran as $mahasiswaId => $status_kehadiran) {
            Statuskehadiran::create([
                'kehadiran_id'     => $kehadiran->id,
                'mahasiswa_id'     => $mahasiswaId,
                'status_kehadiran' => $status_kehadiran,
                'waktu_hadir'      => $request->waktu_hadir[$mahasiswaId],
                'keterangan'       => $request->keterangan[$mahasiswaId],
            ]);
        }
        // $dataStatusKehadiran[] = [
        //     'kehadiran_id'     => $kehadiran->id,
        //     'mahasiswa_id'     => $mahasiswaId,
        //     'status_kehadiran' => $status_kehadiran,
        //     'waktu_hadir'      => $request->waktu_hadir[$mahasiswaId],
        //     'keterangan'       => $request->keterangan[$mahasiswaId],
        //     'created_at'       => now(),
        //     'updated_at'       => now(),
        // ];
        // StatusKehadiran::insert($dataStatusKehadiran);


        return redirect('/kehadiran')->with('kehadiranadd', 'Data kehadiran berhasil dibuat!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kehadiran = Kehadiran::findOrFail($id);
        $statuskehadiran = Statuskehadiran::where('kehadiran_id', $kehadiran->id)->get();

        $jumlahHadir = Statuskehadiran::where('kehadiran_id', $kehadiran->id)
            ->where('status_kehadiran', 'Hadir')
            ->count();
        $jumlahDisiplin = Statuskehadiran::where('kehadiran_id', $kehadiran->id)
            ->whereIn('keterangan', ['Lebih Awal', 'Tepat Waktu'])
            ->count();
        $jumlahTelat = Statuskehadiran::where('kehadiran_id', $kehadiran->id)
            ->where('keterangan', 'like', 'Telat % Menit')
            ->count();
        $jumlahIzin = Statuskehadiran::where('kehadiran_id', $kehadiran->id)
            ->where('status_kehadiran', 'Izin')
            ->count();
        $jumlahSakit = Statuskehadiran::where('kehadiran_id', $kehadiran->id)
            ->where('status_kehadiran', 'Sakit')
            ->count();
        $jumlahAlfa = Statuskehadiran::where('kehadiran_id', $kehadiran->id)
            ->where('status_kehadiran', 'Alfa')
            ->count();


        $dataSesi = SesiDet::where('kehadiran_id', $kehadiran->id)
            ->join('sesis', 'sesi_dets.sesi_id', '=', 'sesis.id')
            ->orderBy('sesis.sesi', 'asc')
            ->get();

        return view('kehadiran.detail', compact(
            'kehadiran',
            'statuskehadiran',
            'dataSesi',
            'jumlahHadir',
            'jumlahIzin',
            'jumlahSakit',
            'jumlahAlfa',
            'jumlahDisiplin',
            'jumlahTelat',
        ), [
            'title' => 'kehadiran',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = Mahasiswa::where('status_ukm','Anggota LCC')->orderBy('nama', 'asc');
        // $data = Statuskehadiran::where('kehadiran_id', $id);
        $dataPemateri = Mahasiswa::where('status_ukm', 'BPH')
            ->whereHas('kelas', function ($query) {
                $query->where('tingkat', '2');
            })
            ->orderBy('nama', 'asc')
            ->get();
        $datakegiatan = Kegiatan::orderBy('kegiatan', 'asc')->get();

        $kehadiran = Kehadiran::findOrFail($id);
        $statuskehadiran = Statuskehadiran::where('kehadiran_id', $kehadiran->id)->get();

        $dataSesiChecked = SesiDet::where('kehadiran_id', $kehadiran->id)->get();
        $dataSesi = Sesi::orderBy('sesi', 'asc')->get();

        return view('kehadiran.edit', compact(
            'kehadiran',
            'statuskehadiran',
            'datakegiatan',
            'dataSesi',
            'dataPemateri',
            'dataSesiChecked',
        ), [
            'title' => 'kehadiran',
        ]);
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
        // Update Validation
        $this->validate($request, [
            'tanggal'               => 'required|date',
            // 'mahasiswa_id'          => 'required|exists:mahasiswas,id',
            'kegiatan_id'           => 'required|exists:kegiatans,id',
            'ket_kegiatan'          => 'required',
        ]);

        // Update Kehadiran
        $kehadiran = Kehadiran::findOrFail($id);
        $kehadiran->update([
            'tanggal'        => $request->tanggal,
            'mahasiswa_id'   => $request->mahasiswa_id,
            'kegiatan_id'    => $request->kegiatan_id,
            'ket_kegiatan'   => $request->ket_kegiatan,
            'status'         => $request->status,
        ]);

        // Update StatusKehadiran
        // foreach ($request->status_kehadiran as $statusId => $status_kehadiran) {
        //     $data = Statuskehadiran::findOrFail($statusId);
        //     $data->update([
        //         'status_kehadiran' => $status_kehadiran
        //     ]);
        // }

        // // Update SesiDet
        // $existingSesiIds = SesiDet::where('kehadiran_id', $kehadiran->id)->pluck('sesi_id')->toArray();
        // // Delete SesiDet
        // $sesiIdsToRemove = array_diff($existingSesiIds, $request->sesi_id ?? []);
        // if (!empty($sesiIdsToRemove)) {
        //     SesiDet::where('kehadiran_id', $kehadiran->id)
        //         ->whereIn('sesi_id', $sesiIdsToRemove)
        //         ->delete();
        // }
        // // Insert SesiDet
        // $sesiIdsToAdd = array_diff($request->sesi_id ?? [], $existingSesiIds);
        // foreach ($sesiIdsToAdd as $sesiId) {
        //     SesiDet::create([
        //         'kehadiran_id' => $kehadiran->id,
        //         'sesi_id'      => $sesiId
        //     ]);
        // }

        // Return
        return redirect('/kehadiran')->with('kehadiranedit', 'Data kehadiran di ubah!');
    }

    public function updateStatus(Request $request)
    {
        // Validasi input
        $request->validate([
            'selected_ids'   => 'required|array',
            'selected_ids.*' => 'exists:kelas,id',
            'status'         => 'required',
        ]);

        // Ambil data kelas yang dipilih
        $selectedIds = $request->input('selected_ids');
        $newStatus = $request->input('status');

        // Update status kelas yang dipilih
        Kehadiran::whereIn('id', $selectedIds)->update(['status' => $newStatus]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('editStatus', 'Status berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kehadiran::where('id', $id)->delete();
        Statuskehadiran::where('kehadiran_id', $id)->delete();
        SesiDet::where('kehadiran_id', $id)->delete();

        // Alert::success('Berhasil!', 'Data kehadiran berhasil di hapus!');
        return redirect('/kehadiran')->with('kehadirandelete', 'Data kehadiran di hapus!');
    }

    public function printlaporan()
    {
        // $kehadiran = Kehadiran::findOrFail($id);
        // $statuskehadiran = Statuskehadiran::where('kehadiran_id', $kehadiran->id)->get();

        return view(
            'kehadiran.print',
            // compact('kehadiran','statuskehadiran')
        );
    }

    public function cetakLaporan($id)
    {
        $kehadiran = Kehadiran::findOrFail($id);
        $statuskehadiran = Statuskehadiran::where('kehadiran_id', $kehadiran->id)->get();

        return redirect()->route('datakehadiran.show', $kehadiran->id);
    }

    public function scan()
    {
        return view('kehadiran.scan', [
            'title' => 'kehadiran'
        ]);
    }

    public function getStudentName(Request $request)
    {
        $nim = $request->query('nim');
        $student = Mahasiswa::where('nim', $nim)->first();

        if ($student) {
            return response()->json(['name' => $student->nama]);
        } else {
            return response()->json(['error' => 'Student not found'], 404);
        }
    }
}
