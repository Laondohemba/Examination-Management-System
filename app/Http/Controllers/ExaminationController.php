<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Examination;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ExaminationRequest;

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

    //display form for adding students
    public function enrollStudents($id)
    {
        $examination = Examination::find($id);
        return view('examinations.enroll_students', ['examination' => $examination]);
    }

    //store students in the db
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

    // diplay a list of students for an examination for the examiner
    public function students($id)
    {
        $students = Student::with('examination')->where('examination_id', $id)->paginate(15);
        
        return view('examinations.students', ['students' => $students]);
    }

    // display edit blade view from students folder for examiner to update student's record
    public function editStudent($email)
    {
        $student = Student::where('email', $email)->first();

        return view('students.edit', ['student' => $student]);
    }

    //handle updating of student's record by examiner
    public function updateStudent(Student $student, Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', Rule::unique('students')->ignore($student->id)],
            'password' => ['required', 'min:3'],
        ]);

        $student->update([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        //fetch examination
        $examination = Examination::where('id', $student->examination_id)->first();

        return to_route('examination.students', $examination)->with('success', 'Student\'s record updated successfully');
    }

    //examiner to delete a student's record
    public function destroyStudent(Student $student)
    {        
        $examination = Examination::where('id', $student->examination_id)->first();
        $student->delete();

        return to_route('examination.students', $examination)->with('success', 'Student\'s record deleted successfully');
    }

    //display form for examiner to update exam records
    public function edit(Examination $examination)
    {
        return view('examinations.edit', ['examination' => $examination]);
    }

    //update examination record
    public function update(Examination $examination, ExaminationRequest $request)
    {
        $data = $request->validated();
        $examination->update($data);

        return to_route('examiner.dashboard')->with('success', 'Examination record updated successfully');
    }
}
