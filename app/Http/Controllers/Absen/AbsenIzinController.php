<?php

namespace App\Http\Controllers\Absen;

use App\Models\Absen;
use App\Models\Student;
use App\Models\AbsenIzin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsenIzinController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (Auth::user()->role == 'student') {
            $nis_id = $request->id;

            Absen::create([
                'nis_id' => $nis_id,
                'tgl' => now()->format('Y-m-d'),
                'ket' => 'izin',
            ]);

            $absen_id = Absen::where('nis_id', $nis_id)->where('ket', 'izin')->get();

            AbsenIzin::create([
                'nis_id' => $nis_id,
                'absen_id' => $absen_id[0]['id'],
                'alasan_i' => $request->reason
            ]);

            return response()->json([
                'msg' => 'Thank you for filling out Absence Reason'
            ]);
        } elseif (Auth::user()->role == 'admin') {
            $student_name = $request->student_name;
            $student = Student::where('nama', $student_name)->get();
            $nis_id = $student[0]['id'];
            $alasan = $request->reason;

            $absen = Absen::where('nis_id', $nis_id)->latest('id')->first();
            $absen_id = $absen['id'];

            AbsenIzin::create([
                'nis_id' => $nis_id,
                'absen_id' => $absen_id,
                'alasan_i' => $alasan
            ]);

            return response()->json([
                'msg' => 'Successfully add Student Absen!'
            ]);
        }
    }
}
