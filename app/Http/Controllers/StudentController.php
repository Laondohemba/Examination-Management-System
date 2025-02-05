<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function loginForm()
    {
        return view('students.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::guard('student')->attempt($credentials)) {
            $student = Auth::guard('student')->user();
            if ($student->first_login == true || $student->name == null) {
                return redirect()->route('reset.form', ['student' => $student]);
            }

            return redirect()->route('student.dashboard');
        } else {
            return back()->withErrors(['loginFailed' => 'Invalid login details! Note that passwords are case sensitive.']);
        }
    }

    public function resetPasswordForm()
    {
        $student = Auth::guard('student')->user();

        return view('students.reset_password', ['student' => $student ?? auth('student')->user()]);
    }

    public function resetPassword(Request $request, $id)
    {
        $student = Student::find($id);

        $data = $request->validate(
            [
                'old_password' => ['required'],
                'password' => ['required', 'confirmed', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[)(*&^%$#@!><:"]/']
            ],
            [
                'password.regex' => 'Password must contain uppercase, lowercase, numeric and special character.'
            ]
        );

        if (password_verify($data['old_password'], $student->password)) {
            $student->password = Hash::make($data['password']);
            $student->first_login = false;
            $student->save();

            return redirect()->route('student.dashboard')->with('success', 'Password reset successful.');
        }

        return back()->withErrors(['resetFailed' => 'Password reset failed']);
    }

    public function logout()
    {
        // $student = auth('student')->user();
        Auth::guard('student')->logout();

        return redirect()->route('student.login');
    }


    public function dashboard()
    {
        $examinations = Student::with('examination')
            ->where('id', auth('student')->user()->id)
            ->get();

        $examDetails = $examinations->map(function ($examination) {
            if (!$examination->examination) {
                return null;
            }

            $exam = $examination->examination;

            // Parse start and end timestamps
            $startDateTime = Carbon::createFromFormat('Y-m-d H:i:s', "{$exam->start_date} {$exam->start_time}");
            $endDateTime = Carbon::createFromFormat('Y-m-d H:i:s', "{$exam->end_date} {$exam->end_time}");
            $now = Carbon::now();

            $startsIn = $startDateTime->greaterThan($now)
                ? $now->diff($startDateTime)->format('%d days %h hours %i minutes')
                : 'Already started';


            // Check if the current time is within the exam period
            $canTakeExam = $now->between($startDateTime, $endDateTime);

            return [
                'examinations' => $exam,
                'starts_in' => $startsIn,
                'ended' => $endDateTime->lessThan($now) ? $endDateTime->diffForHumans($now, true) . ' ago' : 'Not ended yet',
                'can_take_exam' => $canTakeExam,
            ];
        })->filter();

        return view('students.dashboard', ['examinations' => $examDetails]);
    }

    //display form for students to update their profile
    public function edit()
    {
        return view('students.update_profile');
    }

    //update student's profile
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'reg_no' => ['required', 'max:255'],
            'phone' => ['required', 'numeric']
        ]);

        $id = auth('student')->user()->id;
        $student = Student::find($id);

        if ($student->update($data)) {
            return redirect()->route('student.dashboard')->with('success', 'Profile updated successfully');
        }

        return back()->withErrors(['updateFailed' => 'Sorry something went! Try again later.']);
    }
}
