<?php

namespace App\Http\Controllers;

use App\Models\Examiner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class AuthController extends Controller
{
    public function create()
    {
        return view('examiner.create');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'max:255', 'unique:examiners'],
            'email' => ['required', 'max:255', 'email', 'unique:examiners'],
            'password' => ['required', 'min:8', 'confirmed', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[!@#$%^&*()_:"?><;.,]/']
        ],
        [
            'password.regex' => 'Password must contain at least 1 upper and lower case, numeric and special character.'
        ]);

        //create examiner
        $examiner = Examiner::create($credentials);

        //login examiner
        Auth::login($examiner);

        return redirect()->route('examiner.dashboard')->with('success', 'Account created successfully');
    }

    public function loginForm()
    {
        return view('examiner.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'max:255'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials))
        {
            return redirect()->route('examiner.dashboard')->with('success', 'Login successful');
        }

        return back()->withErrors(['loginFailed' => 'Invalid login credentials! Note that passwords are case sensitive']);
        
    }

    public function logout()
    {
        $examiner = request()->user();
        Auth::logout($examiner);

        return redirect()->route('login');
    }
}
