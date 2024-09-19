<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use App\Models\SesiDet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Admin')) {
            $dataSesi = Sesi::orderBy('sesi','asc')->get();
            return view('sesi.index', [
                'dataSesi'  => $dataSesi,
                'dataSesiDet' => SesiDet::all(),
                'title'     => 'sesi'
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
            'sesi'            => 'required|unique:sesis',
            'waktu_mulai'     => 'required',
            'waktu_selesai'   => 'required',
        ]);
        Sesi::create($data);
        return redirect('/sesi')->with('sesiAdd', 'Data sesi berhasil di buat!');
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
            'sesi'   =>  [
                'required',
                Rule::unique('sesis')->ignore($id, 'id'),
            ],
            'waktu_mulai'     => 'required',
            'waktu_selesai'   => 'required'
        ]);
        Sesi::where('id', $id)->update($data);
        return redirect('/sesi')->with('sesiEdit', 'Data sesi berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sesi::where('id', $id)->delete();
        return redirect('/sesi')->with('sesiDelete', 'Data sesi berhasil di hapus!');
    }
}
