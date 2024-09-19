<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Kehadiran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Admin')) {
            $data = Kegiatan::orderBy('kegiatan', 'asc')->get();

            return view('kegiatan.index', [
                'datakegiatan' => $data,
                'datakehadiran' => Kehadiran::all(),
                'title' => 'kegiatan',
            ]);
        }
        return back();
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
            'kegiatan'     => 'required|unique:kegiatans',
        ]);
        Kegiatan::create($data);
        return redirect('/kegiatan')->with('kegiatanadd', 'Data kegiatan berhasil di buat!');
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
            'kegiatan'   =>  [
                'required',
                Rule::unique('kegiatans')->ignore($id, 'id'),
            ],
        ]);
        Kegiatan::where('id', $id)->update($data);
        return redirect('/kegiatan')->with('kegiatanedit', 'Data kegiatan berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kegiatan::where('id', $id)->delete();
        return redirect('/kegiatan')->with('kegiatandelete', 'Data kegiatan berhasil di hapus!');
    }
}
