<?php

namespace App\Http\Controllers\Absen;

use Carbon\Carbon;
use App\Models\Absen;
use App\Models\JamAbsen;
use App\Models\HariAbsen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = now()->isoFormat('dddd');
        $hari_absen = HariAbsen::find(1);

        $day = $hari_absen[strtolower($today)];

        $info = 'close';
        $jam_masuk = JamAbsen::get('jam_masuk')[0]['jam_masuk'];
        $gate_close_come = Carbon::create($jam_masuk)->addHour(1)->format('H:i:s');

        if ($day != '1') {
            return view('student.dashboard')->with('bye', 'Today School closed And Absen closed too. Comeback when school Opened!');
        }

        if (Auth::user()->role == 'student') {
            $absen = Absen::where('nis_id', Auth::user()->student[0]['id'])->where('tgl', now()->format('Y-m-d'))->get();
            $absen_ket = $absen[0]['ket'] ?? '';
            $absen_count = $absen->count();
            $was_home = Absen::where('nis_id', Auth::user()->student[0]['id'])->where('tgl', now()->format('Y-m-d'))->where('pulang', 'sudah')->count();
            $home_time = JamAbsen::get('jam_pulang')[0]['jam_pulang'];

            if ($absen_count >= 1) {
                $info = 'exist';
                $absen_id = Absen::where('nis_id', Auth::user()->student[0]['id'])->where('tgl', now()->format('Y-m-d'))->get('id');

                if ($was_home != 0) {
                    $info = 'home';
                    $absen_id = Absen::where('nis_id', Auth::user()->student[0]['id'])->where('tgl', now()->format('Y-m-d'))->get('id');
                } 
            } elseif ($absen_count == 0) {
                $info = 'empty';
                $absen_id = null;
            }
            return view('student.dashboard', compact('info', 'gate_close_come', 'home_time', 'absen_id', 'absen_ket'));
        } 
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
        $nis_id = $request->id;
        $tgl = now()->format('Y-m-d');
        $time = $request->time;
        $midnight = new Carbon('00:00:00');
        
        // $midnight = Carbon::create(null, null, null, 0, 0, 0)->format('H:i:s');
        // $should_come = Carbon::create(null, null, null, 5, 0, 0)->format('H:i:s');

        $jam_masuk = JamAbsen::get('jam_masuk')[0]['jam_masuk'];

        // $should_come = $jam_masuk[0]['jam_masuk']->subHour(2);
        // $a = $jam_masuk[0]['jam_masuk'];

        $should_come = Carbon::create($jam_masuk)->subHour(2)->format('H:i:s');

        $enter = $jam_masuk;

        // $enter = Carbon::create(null, null, null, 8, 0, 0)->format('H:i:s');

        $gate_close_come = Carbon::create($jam_masuk)->addHour(1)->format('H:i:s');

        if($time <= $should_come && $time >= $midnight) {
            return response()->json([
                'msg' => 'You come too Fast. Comeback at 5 am'
            ]);
        } elseif ($time <= $enter && $time >= $should_come) {
            Absen::create([
                'nis_id' => $nis_id,
                'tgl' => $tgl,
                'jam_kedatangan' => $time,
                'ket' => 'hadir',
                'pulang' => 'belum'
            ]);

            return response()->json([
                'msg' => 'Thank you for come up to date. Enjoy your class!'
            ]);
        } elseif ($time >= $enter && $time <= $gate_close_come) {
            Absen::create([
                'nis_id' => $nis_id,
                'tgl' => $tgl,
                'jam_kedatangan' => $time,
                'ket' => 'telat',
                'pulang' => 'belum'
            ]);

            return response()->json([
                'msg' => 'You come late. Hurry up, join your class!'
            ]);
        } 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        $tgl = now()->format('Y-m-d');
        // $absen = Absen::where('nis_id', Auth::user()->student[0]['id'])->where('tgl', $tgl)->first();
        $time = $request->time;
        $jam_absen = JamAbsen::get();
        $jam_masuk = $jam_absen[0]['jam_masuk'];
        $jam_pulang = $jam_absen[0]['jam_pulang'];

        $gate_close_come = Carbon::create($jam_masuk)->addHour(1)->format('H:i:s');
        $come_home = $jam_pulang;
        $gate_close_home = Carbon::create($jam_masuk)->addHour(3)->format('H:i:s');

        if ($time >= $gate_close_come && $time <= $come_home) {
            return response()->json([
                'msg' => "Oops. Are you excited to go home? But, it wasn't time to come home. Wait for some minute!"
            ]);
        } elseif ($time >= $come_home && $time <= $gate_close_home) {
            $absen->update([
                'jam_kepulangan' => $time,
                'pulang' => 'sudah'
            ]);

            return response()->json([
                'msg' => 'Bye, bye. Be careful, go home!'
            ]);
        } elseif ($time >= $gate_close_home) {
            $absen->update([
                'jam_kepulangan' => $time,
                'pulang' => 'sudah'
            ]);

            return response()->json([
                'msg' => 'You too late go home. Hurry! Stay save!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        //
    }
}
