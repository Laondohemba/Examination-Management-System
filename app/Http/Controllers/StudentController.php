<?php

namespace App\Http\Controllers;

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

        if(Auth::guard('student')->attempt($credentials))
        {
            $student = Auth::guard('student')->user();
            if($student->first_login == true)
            {
                return redirect()->route('reset.form', ['student' => $student]);
            }

            return redirect()->route('student.dashboard');
        }
        else{
            return back()->withErrors(['loginFailed' => 'Invalid login details! Note that passwords are case sensitive.']);
        }
    }

    public function resetPasswordForm($id)
    {
        $student = Auth::guard('student')->user();
        
        return view('students.reset_password', ['student' => $student]);
    }

    public function resetPassword(Request $request, $id)
    {
        $student = Student::find($id);
        
        $data = $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[)(*&^%$#@!><:"]/']
        ],
    [
        'password.regex' => 'Password must contain uppercase, lowercase, numeric and special character.'
    ]);

    if(password_verify($data['old_password'], $student->password))
    {
        $student->password = Hash::make($data['password']);
        $student->first_login = false;
        $student->save();

        return redirect()->route('student.dashboard')->with('success', 'Password reset successful. You can now update your profile');
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
        return view('students.dashboard');
    }
}
