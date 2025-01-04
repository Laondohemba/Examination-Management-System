<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Examination;
use Illuminate\Http\Request;

class ExaminerController extends Controller
{
    public function dashboard()
    {

        $examinations = Examination::with('examiner')->get();
        
        return view('examiner.dashboard', ['examinations' => $examinations]);
    }
}
