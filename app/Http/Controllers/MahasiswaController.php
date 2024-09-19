<?php

namespace App\Http\Controllers;


use App\Models\Prodi;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Statuskehadiran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\User;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Admin')) {
            // $data = Mahasiswa::whereHas('kelas')
            //     ->with(['kelas' => function ($query) {
            //         $query->orderBy('angkatan', 'desc');
            //             // ->orderBy('kelas', 'asc');
            //     }])
            //     ->orderBy('kelas_id', 'asc')
            //     ->orderBy('nama', 'asc')
            //     ->get();

            $data = Mahasiswa::with('kelas')
                ->get()
                ->sortBy([
                    ['kelas.angkatan', 'desc'],
                    ['kelas.kelas', 'asc'],
                    ['nama', 'asc']
                ]);

            return view('mahasiswa.index', [
                'datamahasiswa' => $data,
                'datakehadiran' => Statuskehadiran::all(),
                'title' => 'mahasiswa',
            ]);
        }
        return back();
    }

    public function mahasiswaexport()
    {
        return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
    }

    public function mahasiswaimport(Request $request)
    {
        $file = $request->file('fileexcel');
        $namaFile = $file->getClientOriginalName();
        $file->move('datamahasiswa', $namaFile);

        Excel::import(new MahasiswaImport, public_path('/datamahasiswa/' . $namaFile));
        return redirect('/mahasiswa')->with('mahasiswaimport', 'Data mahasiswa di import!');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Mahasiswa::whereIn('id', $ids)->delete();
        Alert::success('Berhasil', 'Data siswa berhasil di hapus!');
        return response()->json(["success" => "-"]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('Admin')) {
            $datakelas = Kelas::orderBy('tingkat', 'asc')
                ->orderBy('kelas', 'asc')
                ->get();

            $dataJabatan = Jabatan::orderBy('jabatan', 'asc')->get();

            return view('mahasiswa.add', [
                'datakelas' => $datakelas,
                'dataJabatan' => $dataJabatan,
                'title'     => 'mahasiswa',
            ]);
        }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // do {
        //     $number = mt_rand(1000000000, 9999999999);
        // } while ($this->mahasiswaCodeExists($number));

        $data = $request->validate([
            'nim'            => 'required|unique:mahasiswas|min:9',
            'nama'           => 'required',
            'jenis_kelamin'  => 'required',
            'kelas_id'       => 'required',
            'tempat_lahir'   => 'required',
            'tanggal_lahir'  => 'required',
            'alamat'         => 'required',
            'asal_sekolah'   => 'required',
            'jurusan'        => 'required',
            'no_telpon'      => 'required|min:11|max:15',
            'status_ukm'     => 'required',
            'jabatan_id'     => 'required',
            'alasan'         => 'required',
            // 'tingkat'        => 'required',
            // 'angkatan'       => 'required|min:4|max:4',
        ]);
        // $data['barcode'] = $number;
        $mahasiswa = Mahasiswa::create($data);

        $datauser = [
            'mahasiswa_id' => $mahasiswa->id,
            'username' => $request->nim,
            'password' => bcrypt($request->nim),
            'role' => 'Mahasiswa'
        ];
        User::create($datauser);
        return redirect('/mahasiswa')->with('mahasiswaadd', 'Data mahasiswa di buat!');
    }

    // public function mahasiswaCodeExists($number) {
    //     return Mahasiswa::where('barcode', $number)->exists();
    // }

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
        if (Gate::allows('Admin')) {
            $editkelas = Kelas::orderBy('tingkat', 'asc')
                ->orderBy('kelas', 'asc')
                ->get();

            $dataJabatan = Jabatan::orderBy('jabatan', 'asc')->get();
            return view('mahasiswa.edit', [
                'editmahasiswa' => Mahasiswa::where('id', $id)->first(),
                // 'dataprodi' => Prodi::all(),
                // 'datakelas' => Kelas::all(),
                'datakelas' => $editkelas,
                'dataJabatan' => $dataJabatan,
                'title' => 'mahasiswa'
            ]);
        }
        return back();
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
        $data = $request->validate([
            // 'nim'            => 'required',
            'nim'   =>  [
                'required',
                'min:9',
                Rule::unique('mahasiswas')->ignore($id, 'id'),
            ],
            'nama'           => 'required',
            'jenis_kelamin'  => 'required',
            // 'prodi_id'       => 'required',
            'kelas_id'       => 'required',
            'tempat_lahir'   => 'required',
            'tanggal_lahir'  => 'required',
            'alamat'         => 'required',
            'asal_sekolah'   => 'required',
            'jurusan'        => 'required',
            // 'no_telpon'      => 'required',
            'no_telpon'   =>  [
                'required',
                'min:11',
                'max:15',
                Rule::unique('mahasiswas')->ignore($id, 'id'),
            ],
            'status_ukm'     => 'required',
            'jabatan_id'     => 'required',
            'alasan'         => 'required',
            // 'tingkat'        => 'required',
            // 'angkatan'       => 'required|min:4|max:4',
        ]);
        Mahasiswa::where('id', $id)->update($data);
        // Alert::success('Berhasil!', 'Data mahasiswa berhasil di ubah!');
        return redirect('/mahasiswa')->with('mahasiswaedit', 'Data mahasiswa di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::where('id', $id)->delete();
        User::where('mahasiswa_id', $id)->delete();
        // Alert::success('Berhasil!', 'Data mahasiswa berhasil di hapus!');
        return redirect('/mahasiswa')->with('mahasiswadelete', 'Data mahasiswa di hapus!');
    }

    public function destroyall()
    {
        Mahasiswa::truncate();
        User::where('mahasiswa_id', '!=', 0)->delete();
        return redirect('/mahasiswa')->with('mahasiswadeleteall', 'Seluruh Data mahasiswa di hapus!');
    }
}
