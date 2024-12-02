<?php

namespace App\Http\Controllers\Admin;

use App\Models\Search;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $student_result = Search::where('auth', 'student')->get();
        $admin_result = Search::where('auth', 'admin')->get();

        return response()->json([
            'data_student' => $student_result,
            'data_admin' => $admin_result,
        ]);
    }
}
