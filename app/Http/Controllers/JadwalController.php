<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Prodi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Admin'))
        {
        $data = Jadwal::with('kelas')->orderBy('kelas_id', 'asc');

        return view('jadwal.index', [
            // 'dataprodi' => Prodi::all(),
            'datakelas' => Kelas::all(),
            'datajadwal'=> $data->paginate(50),
            'title' => 'jadwal',
        ]);
        } return back();
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
        $this->validate($request, [
            // 'prodi_id'     => 'required',
            'kelas_id'     => 'required',
            'file'         => 'required',
        ]);

        $data = $request->file('file');
        $ekstensi = $data->getClientOriginalExtension();
            $filenamesave = 'lcc-jadwal-kelas' . time() . '.' . $ekstensi;
            $data->move(public_path('file_jadwal'), $filenamesave);
            Jadwal::create([
                // 'prodi_id' => $request->prodi_id,
                'kelas_id' => $request->kelas_id,
                'file'     => $filenamesave
            ]);
        Alert::success('Berhasil!', 'Data jadwal berhasil di input!');
        return redirect('/jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('jadwal.view', [
            'file'      => Jadwal::where('id', $id)->get(),
            "title"     => 'jadwal',
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
        Jadwal::where('id', $id)->delete();
        Alert::success('Berhasil!', 'Data jadwal kelas berhasil di hapus!');
        return redirect('/jadwal');
    }
}
