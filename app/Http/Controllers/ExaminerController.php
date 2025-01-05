<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Examination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExaminerController extends Controller
{
    public function dashboard()
    {

        $examinations = Examination::with('examiner')->where('examiner_id', Auth::id())->get();
        
        return view('examiner.dashboard', ['examinations' => $examinations]);
    }
}
