<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Kehadiran;
use App\Models\Mahasiswa;
use App\Models\Statuskehadiran;
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
            $dataadmin = Kehadiran::orderBy('tanggal','desc')->latest();
        } else {
            $dataadmin = Kehadiran::where('status','Aktif')->orderBy('tanggal','desc')->latest();
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
        $datakegiatan = Kegiatan::orderBy('kegiatan','asc');
        $data = Mahasiswa::where('status_ukm','Anggota LCC')
            ->where('tingkat', '1')
            ->orderBy('nama', 'asc');

        return view('kehadiran.add', [
            'datakegiatan' => $datakegiatan->paginate(50),
            'datamahasiswa' => $data->paginate(100),
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
            'tanggal'           => 'required',
            'kegiatan_id'        => 'required',
            'ket_kegiatan'      => 'required',
            'status_kehadiran.*'  => 'required|in:Hadir,Sakit,Izin,Alfa',
        ]);

        $kehadiran = Kehadiran::create([
            'tanggal'       => $request->tanggal,
            'kegiatan_id'   => $request->kegiatan_id,
            'ket_kegiatan'  => $request->ket_kegiatan,
            'user_id'       => auth()->user()->id,
            'status'        => 'Aktif',
        ]);

        foreach ($request->status_kehadiran as $mahasiswaId => $status_kehadiran) {
            Statuskehadiran::create([
                'kehadiran_id'     => $kehadiran->id,
                'mahasiswa_id'     => $mahasiswaId,
                'status_kehadiran' => $status_kehadiran,
            ]);
        }
        return redirect('/kehadiran')->with('kehadiranadd','Data kehadiran di buat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datakegiatan = Kegiatan::orderBy('kegiatan','asc');
        $kehadiran = Kehadiran::findOrFail($id);
        $statuskehadiran = Statuskehadiran::where('kehadiran_id', $kehadiran->id)->get();

        return view('kehadiran.detail', compact('kehadiran','statuskehadiran','datakegiatan'), [
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
        $datakegiatan = Kegiatan::orderBy('kegiatan','asc')->get();
        $kehadiran = Kehadiran::findOrFail($id);
        $statuskehadiran = Statuskehadiran::where('kehadiran_id', $kehadiran->id)->get();

        return view('kehadiran.edit', compact('kehadiran','statuskehadiran','datakegiatan'), [
            // 'datamahasiswa' => $data->paginate(50),
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
        $this->validate($request, [
            'tanggal'           => 'required',
            // 'pertemuan'         => 'required',
            'kegiatan_id'       => 'required',
            'ket_kegiatan'      => 'required',
            'status_kehadiran'  => 'required',
            // 'status_kehadiran.*' => 'required|in:Hadir,Sakit,Izin,Alfa',
        ]);

        $kehadiran = Kehadiran::findOrFail($id);
        $kehadiran->update([
            'tanggal'        => $request->tanggal,
            // 'pertemuan'      => $request->pertemuan,
            'kegiatan_id'    => $request->kegiatan_id,
            'ket_kegiatan'   => $request->ket_kegiatan,
            'status'         => $request->status,
        ]);

        foreach ($request->status_kehadiran as $statusId => $status_kehadiran) {
            $data = Statuskehadiran::findOrFail($statusId);
            $data->update([
                'status_kehadiran' => $status_kehadiran
            ]);
        }

        // Alert::success('Berhasil!', 'Data kehadiran berhasil di ubah!');
        return redirect('/kehadiran')->with('kehadiranedit','Data kehadiran di ubah!');
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

        // Alert::success('Berhasil!', 'Data kehadiran berhasil di hapus!');
        return redirect('/kehadiran')->with('kehadirandelete','Data kehadiran di hapus!');
    }

    public function printlaporan()
    {
        // $kehadiran = Kehadiran::findOrFail($id);
        // $statuskehadiran = Statuskehadiran::where('kehadiran_id', $kehadiran->id)->get();

        return view('kehadiran.print',
        // compact('kehadiran','statuskehadiran')
        );
    }

    public function cetakLaporan($id)
    {
        $kehadiran = Kehadiran::findOrFail($id);
        $statuskehadiran = Statuskehadiran::where('kehadiran_id', $kehadiran->id)->get();

        return redirect()->route('datakehadiran.show', $kehadiran->id);
    }

    public function scan() {
        return view('kehadiran.scan',[
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
