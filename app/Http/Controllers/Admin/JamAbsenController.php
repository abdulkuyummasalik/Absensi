<?php

namespace App\Http\Controllers\Admin;

use App\Models\JamAbsen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JamAbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JamAbsen::get(['jam_masuk', 'jam_pulang']);

        return view('admin.absen.jamAbsen.index', compact('data'));
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
     * @param  \App\Models\JamAbsen  $jamAbsen
     * @return \Illuminate\Http\Response
     */
    public function show(JamAbsen $jamAbsen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JamAbsen  $jamAbsen
     * @return \Illuminate\Http\Response
     */
    public function edit(JamAbsen $jamAbsen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JamAbsen  $jamAbsen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JamAbsen $jamAbsen)
    {
        try {
            $jamAbsen->update($request->all());

            $jamAbsen = JamAbsen::all();

            $info = 'Jam Masuk akan berlangsung pada pukul ' . $jamAbsen[0]['jam_masuk'] . ' dan Jam Pulang akan berlangsung pada pukul ' . $jamAbsen[0]['jam_pulang'];

            return back()->with(['success' => 'Jam Absen Updated Successfully!', 'info' => $info]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error' . $th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JamAbsen  $jamAbsen
     * @return \Illuminate\Http\Response
     */
    public function destroy(JamAbsen $jamAbsen)
    {
        //
    }
}