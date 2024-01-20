<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
       if (Auth::check()){
        return redirect('/home');
        }
        else {
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email|max:100',
            'passwords' => 'required|min:8|max:20'
        ],
        [
            'email.required' => 'The email field is required.',
            'email.email' => 'The email field must be in email format.',
            'email.max' => 'The maximum length of email field is 100 characters.',
            'passwords.required' => 'The password field is required.',
            'passwords.min' => 'The minimum length of password field is 8 characters.',
            'passwords.max' => 'The maximum length of password field is 20 characters.'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->passwords])){
            return redirect('/home');
        }
        else{
            return redirect('/login')->with('failure', 'Invalid credentials. Please check your e-mail and password!')->withInput();
        }

    }

    public function logout (Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
