<?php

namespace App\Http\Controllers\Route;

use App\Models\User;
use App\Models\Rayon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    public function dashboardAdmin()
    {
        return view('admin.dashboard');
    }

    public function indexAbsenAdmin()
    {
        return view('admin.absen.index');
    }

    public function regUser()
    {
        $data = User::latest()->simplePaginate(4);
        return view('admin.reg.index', ['users' => $data]);
    } 
}
