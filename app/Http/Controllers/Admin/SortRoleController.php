<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SortRoleController extends Controller
{
    public function student()
    {
        $rayons = Rayon::all();
        $rombels = Rombel::all();
        $students = User::where('role', 'student')->paginate(4);
        return view('admin.reg.student.studentSort', compact('students', 'rayons', 'rombels'));
    }

    public function admin()
    {
        $admins = User::where('role', 'admin')->paginate(4);
        return view('admin.reg.admin.adminSort', compact('admins'));
    }
}
