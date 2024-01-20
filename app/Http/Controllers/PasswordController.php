<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class PasswordController extends Controller
{
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email|max:100|exists:users,email',
        ],
        [
            'email.required' => 'The email field is required.',
            'email.email' => 'The email field must be in email format.',
            'email.max' => 'The maximum length of email field is 100 characters.',
            'email.exists' => 'The email does not exist.'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found']);
        }
    
        $token = Str::random(60); 
        $user->update([
            'reset_password_token' => $token,
            'reset_token_expires_at' => now()->addMinutes(30),
        ]);
        $resetLink = route('change.password.forgot', ['token' => $token]);

        try {
            Mail::to($user->email)->send(new ResetPasswordMail($resetLink));
            return back()->with(['success' => 'Email sent! Please check your email to reset your password.']);
        } catch (\Exception $e) {
            return back()->with(['failure' => 'Failed to send reset instructions. Please try again.']);
        }

        return back()->with(['status' => 'Email sent with reset instructions']);
    }

    public function showChangePasswordForgot($token)
    {
        $user = User::where('reset_password_token', $token)->where('reset_token_expires_at', '>', now())->first();
        $email = $user->email;

        if(!$user){
            return redirect()->route('login')->with('error', 'Invalid or expired reset password token. Please request a new link.');
        }
        return view('auth.change-password', compact('email'));
    }

    public function showChangePassword()
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $validator = FacadesValidator::make($request->all(),[
            'passwords' => 'required|min:8|max:20',
            'confirmPassword' => 'required|same:passwords',
        ],
        [
            'passwords.required' => 'The password field is required.',
            'passwords.min' => 'The minimum length of password field is 8 characters.',
            'passwords.max' => 'The maximum length of password field is 20 characters.',
            'confirmPassword.required' => 'The confirm password field is required.',
            'confirmPassword.same' => 'The confirm password is not same with the password.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->has(['emailHidden'])){
            $user = User::where('email',$request->emailHidden)->first();
            $user->password = Hash::make($request->input('passwords'));
            $user->update(['reset_password_token' => null]);
            $user->save();
        }
        else{
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->input('passwords'));
            $user->save();
            Auth::logout();
        }
        
        return redirect()->route('login')->with('success', 'Password changed successfully. Please login with your new password.');
    }
}
