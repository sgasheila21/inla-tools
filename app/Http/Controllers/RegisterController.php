<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
       if (Auth::check()){
        return redirect('/home');
        }
        else {
            return view('auth.register');
        }
    }

    public function register(Request $request)
    {
        $validateData = $request->validate([
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:100|unique:users,email',
            'passwords' => 'required|min:8|max:20',
            'confirmPassword' => 'required|same:passwords',
        ],
        [
            'fullname.required' => 'The full name field is required.',
            'fullname.max' => 'The maximum length of full name field is 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email field must be in email format.',
            'email.max' => 'The maximum length of email field is 100 characters.',
            'email.unique' => 'This email has already been used for another account.',
            'passwords.required' => 'The password field is required.',
            'passwords.min' => 'The minimum length of password field is 8 characters.',
            'passwords.max' => 'The maximum length of password field is 20 characters.',
            'confirmPassword.required' => 'The confirm password field is required.',
            'confirmPassword.same' => 'The confirm password is not same with the password.'
        ]);
        
        $user = User::create([
            'id' => Str::uuid(),
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->passwords),
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }
}
