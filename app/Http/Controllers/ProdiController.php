<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Prodi;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdiController extends Controller
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
            $data = Prodi::orderBy('prodi','asc')->get();

            return view('prodi.index', [
                'dataprodi' => $data,
                'datakelas' => Kelas::all(),
                'title' => 'prodi',
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
        $data = $request->validate([
            'prodi'     => 'required|unique:prodis',
            'singkatan' => 'required|unique:prodis|max:5',
        ]);
        Prodi::create($data);
        // Alert::success('Berhasil!', 'Data prodi berhasil di input!');
        return redirect('/prodi')->with('prodiadd','Data prodi berhasil di buat!');
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
        $data = $request->validate ([
            'prodi'     => 'required|unique:prodis',
            'singkatan' => 'required|unique:prodis|max:5',
        ]);
        Prodi::where('id', $id)->update($data);
        // Alert::success('Berhasil!', 'Data prodi berhasil di ubah!');
        return redirect('/prodi')->with('prodiedit','Data prodi berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prodi::where('id', $id)->delete();
        // Alert::success('Berhasil!', 'Data prodi berhasil di hapus!');
        return redirect('/prodi')->with('prodidelete','Data prodi berhasil di hapus!');
    }
}
