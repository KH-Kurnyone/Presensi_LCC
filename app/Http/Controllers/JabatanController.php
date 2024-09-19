<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Admin')) {
            $data = Jabatan::orderBy('jabatan', 'asc')->get();

            return view('jabatan.index', [
                'dataJabatan' => $data,
                'dataMahasiswa' => Mahasiswa::all(),
                'title' => 'jabatan',
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
            'jabatan'     => 'required|unique:jabatans',
        ]);
        Jabatan::create($data);
        return redirect('/jabatan')->with('jabatanAdd', 'Data jabatan berhasil di buat!');
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
            'jabatan'   =>  [
                'required',
                Rule::unique('jabatans')->ignore($id, 'id'),
            ],
        ]);
        Jabatan::where('id', $id)->update($data);
        return redirect('/jabatan')->with('jabatanEdit', 'Data jabatan berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jabatan::where('id', $id)->delete();
        return redirect('/jabatan')->with('jabatanDelete', 'Data jabatan berhasil di hapus!');
    }
}
