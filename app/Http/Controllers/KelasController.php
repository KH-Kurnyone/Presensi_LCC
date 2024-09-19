<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Admin')) {
            $data = Kelas::orderBy('angkatan', 'desc')->orderBy('kelas', 'asc')->get();
            $dataprodi = Prodi::orderBy('prodi', 'asc');

            return view('kelas.index', [
                'dataprodi' => $dataprodi->get(),
                'datamahasiswa' => Mahasiswa::all(),
                'datakelas' => $data,
                'title' => 'kelas',
            ]);
        }
        return back();
    }

    // public function updateStatus(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'selected_ids' => 'required|array',
    //         'selected_ids.*' => 'exists:kelas,id',
    //         'status' => 'required',
    //     ]);

    //     // Ambil data kelas yang dipilih
    //     $selectedIds = $request->input('selected_ids');
    //     $newStatus = $request->input('status');

    //     // Update status kelas yang dipilih
    //     Kelas::whereIn('id', $selectedIds)->update(['status' => $newStatus]);

    //     // Redirect dengan pesan sukses
    //     return redirect()->back()->with('editStatus', 'Status berhasil diperbarui.');
    // }

    public function updateTingkat(Request $request)
    {
        // Validasi input
        $request->validate([
            'selected_ids' => 'required|array',
            'selected_ids.*' => 'exists:kelas,id',
            'tingkat' => 'required',
        ]);

        // Ambil data mahasiswa yang dipilih
        $selectedIds = $request->input('selected_ids');
        $newTingkat = $request->input('tingkat');

        // Update tingkat mahasiswa yang dipilih
        Kelas::whereIn('id', $selectedIds)->update(['tingkat' => $newTingkat]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('editTingkat', 'Tingkat kelas berhasil diperbarui.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'prodi_id'     => 'required',
            'kelas'        => 'required|unique:kelas',
            // 'status'       => 'Aktif',
            'tingkat'      => 'required',
            'angkatan'     => 'required|min:4|max:4',
        ]);
        Kelas::create($data);
        // Alert::success('Berhasil!', 'Data kelas berhasil di input!');
        return redirect('/kelas')->with('kelasadd', 'Data kelas berhasil di buat!');
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
        $data = $request->validate([
            'prodi_id'  => 'required',
            // 'kelas'        => 'required|unique:kelas',
            'kelas'     =>  [
                'required',
                Rule::unique('kelas')->ignore($id, 'id'),
            ],
            // 'status'    => 'required',
            'tingkat'  => 'required',
            'angkatan'  => 'required|min:4|max:4'
        ]);
        Kelas::where('id', $id)->update($data);
        // Alert::success('Berhasil!', 'Data prodi berhasil di ubah!');
        return redirect('/kelas')->with('kelasedit', 'Data kelas berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();
        // Alert::success('Berhasil!', 'Data kelas berhasil di hapus!');
        return redirect('/kelas')->with('kelasdelete', 'Data kelas berhasil di hapus!');
    }
}
