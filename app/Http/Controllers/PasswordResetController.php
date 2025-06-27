<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\ActivityLog;


class PasswordResetController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = Str::random(64);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        Mail::send('emails.reset', ['token' => $token], function($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Link');
        });

        return back()->with('success', 'We have emailed your password reset link!');
    }

    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
{
    $request->validate([
        'email'    => 'required|email|exists:users,email',
        'password' => 'required|confirmed|min:6',
        'token'    => 'required',
    ]);

    $reset = DB::table('password_resets')->where([
        ['email', '=', $request->email],
        ['token', '=', $request->token],
    ])->first();

    if (!$reset) {
        return back()->withErrors(['email' => 'Invalid token or email.']);
    }
    if (Carbon::parse($reset->created_at)->addMinutes(60)->isPast()) {
        return back()->withErrors(['email' => 'This password reset link has expired.']);
    }

    $user = User::where('email', $request->email)->first();
    $user->update([
        'password' => Hash::make($request->password)
    ]);

    DB::table('password_resets')->where('email', $request->email)->delete();

    // Log this activity
    \App\Models\ActivityLog::create([
        'user_id'    => $user->id,
        'action'     => 'reset_password',
        'description'=> 'Password was reset successfully',
        'ip_address' => $request->ip(),
        'user_agent' => $request->userAgent(),
    ]);

    return redirect('/login')->with('success', 'Your password has been reset.');
}

}
