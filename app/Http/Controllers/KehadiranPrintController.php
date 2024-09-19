<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\SesiDet;
use App\Models\Statuskehadiran;
use Illuminate\Http\Request;

class KehadiranPrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $dataSesi = SesiDet::where('kehadiran_id', $kehadiran->id)
            ->join('sesis', 'sesi_dets.sesi_id', '=', 'sesis.id')
            ->orderBy('sesis.sesi', 'asc')
            ->get();

        return view('kehadiran.print', compact('kehadiran','statuskehadiran','dataSesi'), ['id' => $id]);
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
        //
    }
}
