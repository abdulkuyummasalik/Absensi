<?php

namespace App\Http\Controllers\Absen;

use App\Models\Absen;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsenAlpaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $students = Student::all();
        $today = now()->format('Y-m-d');

        foreach ($students as $key => $student) {
            $nis_id = $student->id;

            $query = Absen::where('nis_id', $nis_id)->where('tgl', $today)->get();
            
            if ($query->count() == 0) {
                Absen::insert([
                    'nis_id' => $nis_id,
                    'tgl' => $today,
                    'ket' => 'alpa',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
