<?php

namespace App\Http\Controllers\Admin;

use App\Models\HariAbsen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HariAbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = HariAbsen::all();

        return view('admin.absen.HariAbsen.index', compact('datas'));
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
     * @param  \App\Models\HariAbsen  $hariAbsen
     * @return \Illuminate\Http\Response
     */
    public function show(HariAbsen $hariAbsen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HariAbsen  $hariAbsen
     * @return \Illuminate\Http\Response
     */
    public function edit(HariAbsen $hariAbsen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HariAbsen  $hariAbsen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HariAbsen $hariAbsen)
    {
        $senin = $request->senin ?? false;
        $selasa = $request->selasa ?? false;
        $rabu = $request->rabu ?? false;
        $kamis = $request->kamis ?? false;
        $jumat = $request->jumat ?? false;
        $sabtu = $request->sabtu ?? false;
        $minggu = $request->minggu ?? false;

        HariAbsen::find(1)->update([
            'senin' => $senin,
            'selasa' => $selasa,
            'rabu' => $rabu,
            'kamis' => $kamis,
            'jumat' => $jumat,
            'sabtu' => $sabtu,
            'minggu' => $minggu,
        ]);

        return back()->with('success', 'Hari Absen Changed Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HariAbsen  $hariAbsen
     * @return \Illuminate\Http\Response
     */
    public function destroy(HariAbsen $hariAbsen)
    {
        //
    }
}
