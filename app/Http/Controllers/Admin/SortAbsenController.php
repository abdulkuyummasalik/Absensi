<?php

namespace App\Http\Controllers\Admin;

use App\Models\Absen;
use App\Models\Rayon;
use App\Models\HariAbsen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SortAbsenController extends Controller
{
    public function dailySort()
    {
        $today = now()->isoFormat('dddd');
        $hari_absen = HariAbsen::find(1);

        $day = $hari_absen[strtolower($today)];

        if ($day != '1') {
            return back()->with('bye', 'Today School closed And Absen closed too. Comeback when school Opened!');
        }
        
        $tgl = now()->format('Y-m-d');
        $absens = Absen::where('tgl', $tgl)->get();
        return view('admin.absen.lookAbsen.DailySort', compact('absens'));
    }

    public function dailySortDistinct()
    {
        $tgl = now()->format('Y-m-d');
        $absens = Absen::where('tgl', $tgl)->distinct()->get();
        $info = 'distinct';
        return view('admin.absen.lookAbsen.DailySort', compact('absens', 'info'));
    }

    public function chooseDate()
    {
        return view('admin.absen.chooseDate');
    }

    public function chooseRayon()
    {
        $rayons = Rayon::all();

        return view('admin.absen.chooseRayon', compact('rayons'));
    }

    public function rayonDailySort(Request $request)
    {
        $today = now()->isoFormat('dddd');
        $hari_absen = HariAbsen::find(1);

        $day = $hari_absen[strtolower($today)];

        if ($day != '1') {
            return back()->with('bye', 'Today School closed And Absen closed too. Comeback when school Opened!');
        }
        
        $tgl = now()->format('Y-m-d');
        $joins = Absen::join('students', 'students.id', '=', 'absens.nis_id')
            ->join('rayons', 'rayons.id', '=', 'students.rayon_id')
            ->select('absens.*', 'students.rayon_id', 'rayons.rayon')
            ->get();
        
        $absens = $joins->where('tgl', $tgl)->where('rayon_id', $request->rayon)->all();

        $rayon = Rayon::find($request->rayon);

        return view('admin.absen.lookAbsen.RayonSort', compact('absens', 'rayon'));
    }
    
    public function destroyRayonDaily(Absen $absen)
    {
        $absen_col = Absen::where('id', $absen->id)->first();
        $absen_col->delete();

        return redirect()->route('admin.absen.rayon-daily-sort', $absen->student['rayon_id'])->with('success', 'Absen Deleted Successfully');
    }

    public function dateAbsenSort(Request $request)
    {
        $tanggal = $request->date;
        $absens = Absen::where('tgl', $tanggal)->get();
        $date = strtotime($tanggal);
        $tgl = date('d-m-Y', $date);

        return view('admin.absen.lookAbsen.dateSort', compact('absens', 'tgl', 'tanggal'));
    }

    public function dateAbsenSortDistinct($date)
    {
        $tanggal = $date;
        $absens = Absen::where('tgl', $tanggal)->distinct()->get();
        $date = strtotime($tanggal);
        $tgl = date('d-m-Y', $date);
        $info = 'distinct';

        return view('admin.absen.lookAbsen.dateSort', compact('absens', 'tgl', 'info', 'tanggal'));
    }
}
