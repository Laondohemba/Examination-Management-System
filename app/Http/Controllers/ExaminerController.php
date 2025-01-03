<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExaminerController extends Controller
{
    public function dashboard()
    {
        return view('examiner.dashboard');
    }
}
