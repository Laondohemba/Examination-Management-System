<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExaminationRequest;
use App\Models\Examination;

class ExaminationController extends Controller
{
    public function create()
    {
        return view('examinations.create');
    }

    public function store(ExaminationRequest $request)
    {
        $data = $request->validated();
        $data['examiner_id'] = Auth::id();

        Examination::create($data);

        return redirect()->route('examiner.dashboard')->with('success', 'Your examination has been created successfully.');
    }
}
