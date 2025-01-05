<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ExaminationRequest;
use App\Models\Student;

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

    public function enrollStudents($id)
    {
        $examination = Examination::find($id);
        return view('examinations.enroll_students', ['examination' => $examination]);
    }

    public function addStudents(Request $request, $id)
    {
        $credentials = $request->validate([
            'email' => ['required', 'max:255', 'email', 'unique:students'],
            'password' => ['required', 'min:3'],
        ]);

        $credentials['password'] = Hash::make($credentials['password']);

        $credentials['examiner_id'] = Auth::id();
        $credentials['examination_id'] = $id;

        Student::create($credentials);

        return redirect()->route('enroll.students', $id)->with('success', 'Student enrolled successfully');
    }
}
