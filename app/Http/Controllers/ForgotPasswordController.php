<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password.index', [
            'title' => 'Forgot Password'
        ]);
    }

    public function forgotPasswordPost(Request $request)
    {
        // Validate email
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        // Create token
        $token = Str::random(32);

        // create insert form
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        // Send email
        Mail::send('auth.forgot-password.email', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->to(route('forgot-password'))->with('success', 'We have send an email to reset password.');
    }

    public function resetPassword($token)
    {
        return view('auth.forgot-password.reset-password', [
            'title' => 'Reset Password',
            'token' => $token
        ]);
    }

    public function resetPasswordPost(Request $request)
    {
        // Validate form reset
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:5|max:50|confirmed',
            'password_confirmation' => 'required'
        ]);

        // Check is email and token is the same as before
        $updatePassword = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        // If error return to reset password
        if (!$updatePassword) {
            return redirect()->to(route('reset-password'))->with('error', 'Your email or token is invalid!');
        }

        // Update new password
        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect()->to(route('login'))->with('success', 'Your reset password is success!');
    }
}
