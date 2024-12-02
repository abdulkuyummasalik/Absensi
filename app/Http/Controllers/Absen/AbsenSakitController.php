<?php

namespace App\Http\Controllers\Absen;

use App\Models\Absen;
use App\Models\Student;
use App\Models\AbsenSakit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsenSakitController extends Controller
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
            $nis_id = Auth::user()->student[0]['id'];
            $tgl = now()->format('Y-m-d');

            Absen::create([
                'nis_id' => $nis_id,
                'tgl' => $tgl,
                'ket' => 'sakit',
            ]);

            $absen_id = Absen::where('nis_id', $nis_id)->where('ket', 'sakit')->get();

            AbsenSakit::create([
                'nis_id' => $nis_id,
                'absen_id' => $absen_id[0]['id'],
                'alasan_s' => $request->reason,
            ]);

            $data = AbsenSakit::where('absen_id', $absen_id[0]['id']);

            if ($request->file('pict')) {
                $fileName = $tgl . '_' . Auth::user()->student[0]['nis'] . '.' . $request->file('pict')->extension();
                $request->file('pict')->storeAs('public/surat_dokter', $fileName);
                $pict = 'storage/surat_dokter/' . $fileName;

                $data->update([
                    'surat_dokter' => $pict,
                ]);
            }

            return back()->with('info', 'Thank you for filling out Absence Reason. Get Well Soon!');
        } elseif (Auth::user()->role == 'admin') {
            $student_name = $request->student_name;
            $student = Student::where('nama', $student_name)->get();
            $nis_id = $student[0]['id'];
            $nis = $student[0]['nis'];
            $alasan = $request->reason;

            $absen = Absen::where('nis_id', $nis_id)->latest('id')->first();
            $absen_id = $absen['id'];

            $tgl = now()->format('Y-m-d');

            AbsenSakit::create([
                'nis_id' => $nis_id,
                'absen_id' => $absen_id,
                'alasan_s' => $alasan
            ]);

            $data = AbsenSakit::where('absen_id', $absen_id);

            if ($request->file('pict')) {
                $fileName = $tgl . '_' . $nis . '.' . $request->file('pict')->extension();
                $request->file('pict')->storeAs('public/surat_dokter', $fileName);
                $pict = 'storage/surat_dokter/' . $fileName;

                $data->update([
                    'surat_dokter' => $pict,
                ]);
            }

            return redirect()->route('admin.absen.daily-sort')->with('success', 'Successfully add Student Absen!');

        }
    }
}
