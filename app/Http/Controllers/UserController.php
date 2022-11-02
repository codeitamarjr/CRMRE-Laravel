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
            'name' => ['required','min:3','max:255'],
            'surname' => ['required','min:3','max:255'],
            'username' => ['required', Rule::unique('users','username')],
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        // PRS code is the same as the user's PRS code
        $data['prs_code'] = auth()->user()->prs_code;

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

    // Show User Profile
    public function edit(){
        return view('users.edit',[
            'heading' => 'Profile',
        ]);
    }

    // Update User Profile
    public function update(Request $user){

        // Validate the request
        $data = $user->validate([
            'username' => ['required', Rule::unique('users','username')->ignore(auth()->user())],
            'email' => 'required|email',
            'name' => ['required','min:3','max:255'],
            'surname' => ['required','min:3','max:255'],
            'password' => 'nullable|confirmed|min:6',
        ]);

        // Hash the password
        if($data['password']){
            $data['password'] = bcrypt($data['password']);
            auth()->user()->update($data);
            // Log out the user
            auth()->logout();
        }else{
            unset($data['password']);
            // Update the user
            auth()->user()->update($data);
        }

        return back()->with('success','Your profile has been updated.');
    }

    // Update User Avatar
    public function updateAvatar(Request $user){
        // Validate the request
        $data = $user->validate([
            'avatar' => 'required|image',
        ]);
        // If the user already has an avatar, delete the old one from storage and the database
        if(auth()->user()->avatar){
            // Delete the old avatar from storage
            unlink(storage_path('app/public/' . auth()->user()->avatar));
            // Delete the old avatar from the database
            auth()->user()->update([
                'avatar' => null,
            ]);
        }

        // Upload the image
        $data['avatar'] = $user->file('avatar')->store('img/avatars','public');

        // Update the user
        auth()->user()->update($data);

        return back()->with('success','Your avatar has been updated.');
    }
}
