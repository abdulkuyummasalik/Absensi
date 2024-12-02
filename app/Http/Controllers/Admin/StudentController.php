<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all();

        return view('admin.reg.student.createStudent', compact('rombels', 'rayons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        try {
            User::create([
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 'Student',
            ]);
    
            $user_id = User::where('username', $request->username)->get('id');
            
            $id = $user_id[0]['id'];
    
            Student::create([
                'nis' => $request->nis,
                'nama' => $request->name,
                'rombel_id' => $request->rombel,
                'rayon_id' => $request->rayon,
                'user_id' => $id
            ]);

            return back()->with('success', 'Student User Saved Successfully');

        } catch (\Throwable $th) {
            throw $th;
            // return response()->json([
            //     'error' => $th
            // ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($nis)
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        $data = Student::where('nis', $nis)->get();

        return view('admin.reg.student.editStudent', compact('rombels', 'rayons', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update([
            'rombel_id' => $request->rombel,
            'rayon_id' => $request->rayon,
            'nis' => $request->nis,
            'nama' => $request->name
        ]);

        return back()->with('success', 'Student User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, User $user)
    {
        $student->delete();
        $user->where('id', $student['user_id'])->delete();

        return back()->with('success', 'Student User Deleted Successfully');
    }
}
