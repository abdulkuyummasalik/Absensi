<?php

namespace App\Http\Controllers\Admin;

use App\Models\Absen;
use App\Models\Rayon;
use App\Models\Student;
use App\Models\AbsenIzin;
use App\Models\AbsenSakit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsenAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->type;

        if ($type == 'daily') {
            $rayons = Rayon::all();
            $students = Student::get();
            return view('admin.absen.input.create', compact('rayons', 'students', 'type'));
        } elseif ($type == 'rayonDaily') {
            $rayons = Rayon::all();
            $rayon = Rayon::where('rayon', $request->rayon)->first();
            $rayon_id = Rayon::where('rayon', $request->rayon)->get('id');
            $students = Student::where('rayon_id', $rayon_id[0]['id'])->get();
            return view('admin.absen.input.create', compact('rayons', 'rayon', 'students', 'type'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rayon = Rayon::where('rayon', $request->rayon)->get();
        $students = Student::where('rayon_id', $rayon[0]['id'])->get();
        return response()->json([
            'student' => $students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $student_name = $request->student_name;
            $student_id = Student::where('nama', $student_name)->get('id');
            $ket = $request->ket;
            $tgl = now()->format('Y-m-d');

            Absen::insert([
                'nis_id' => $student_id[0]['id'],
                'tgl' => $tgl,
                'ket' => $ket,
            ]);

            return response()->json([
                'msg' => 'Successfully add Student Absen!'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $absen = AbsenSakit::find($id);
        
        return view('admin.absen.show', compact('absen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absen = Absen::findOrFail($id);
        $student = Student::find($absen['nis_id']);
        $absen_ket = $absen['ket'];

        return view('admin.absen.input.edit', compact('absen', 'absen_ket', 'student'));
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
        $ket = $request->ket;
        $alasan = $request->reason;
        $absen = Absen::find($id);

        $absen->update([
            'ket' => $ket
        ]);

        $nis_id = Absen::find($id);

        if ($ket == 'izin') {
            AbsenIzin::create([
                'nis_id' => $nis_id['nis_id'],
                'absen_id' => $id,
                'alasan_i' => $alasan
            ]);
        } elseif ($ket == 'sakit') {
            AbsenSakit::create([
                'nis_id' => $nis_id['nis_id'],
                'absen_id' => $id,
                'alasan_s' => $alasan
            ]);
        }
        
        return response()->json([
            'msg' => 'Successfully update Student Absen'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        $absen->delete();

        return back()->with('success', 'Absen Deleted Successfully');
    }
}
