<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create User Form
    public function create(){
        return view('users.register',[
            'heading' => 'Register'
        ]);
    }

    // Create New User
    public function store(Request $request){
        // Validate the request
        $data = $request->validate([
            'prs_code' => 'required',
            'name' => ['required','min:3','max:255'],
            'surname' => ['required','min:3','max:255'],
            'username' => ['required', Rule::unique('users','username')],
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash the password
        $data['password'] = bcrypt($data['password']);

        // Create the user
        $user = User::create($data);

        // Auto login the user
        auth()->login($user);

        return redirect('/')->with('success','Your account has been created and logged in.');
    }

    // Logout User
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success','You have been logged out.');
    }

    // Show Login Form
    public function login(){
        return view('users.login',[
            'heading' => 'Login'
        ]);
    }

    // Authenticate User
    public function authenticate(Request $request){
        // Validate the request
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Attempt to login the user
        if(!auth()->attempt($data)){
            return back()->withErrors([
                'username' => 'Your provided credentials could not be verified.'
            ]);
        }

        // Redirect to the homepage
        return redirect('/')->with('success','You have been logged in.');
    }
}
