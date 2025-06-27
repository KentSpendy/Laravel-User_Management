<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\ActivityLog;


class AuthController extends Controller
{
    // Show registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|confirmed|min:6',
        ]);

        $token = Str::random(64);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'verification_token' => $token,
            'role'       => 'user',
            'avatar'     => 'default-avatar.jpg'
        ]);

        // Send verification email
        Mail::send('emails.verify', [
            'user' => $user,
            'token' => $token
        ], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('🌌 Activate Your Sith Access');
        });

        return redirect('/register')->with('success', 'Registration successful! Check your email to verify your account.');
    }

    // Handle email verification
    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            abort(404);
        }

        $user->update([
            'email_verified_at' => now(),
            'verification_token' => null,
        ]);

        return redirect('/login')->with('success', 'Your email has been verified. You can now log in.');
    }

    // Handle login
    public function login(Request $request)
{
    // Step 1: Validate inputs
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Step 2: Retrieve user
    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    if (!$user->email_verified_at) {
        return back()->withErrors(['email' => 'Please verify your email first.']);
    }

    // Step 3: Generate and save OTP
    $otp = rand(100000, 999999);
    $expiresAt = now()->addMinutes(5);

    $user->update([
        'otp_code' => $otp,
        'otp_expires_at' => $expiresAt,
    ]);

    // Step 4: Send OTP email safely
    try {
        Mail::send('emails.otp', ['otp' => $otp], function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Your One-Time Password (OTP)');
        });
    } catch (\Exception $e) {
        return back()->withErrors(['email' => 'Failed to send OTP email. Try again later.']);
    }

    // Step 5: Store session data for verification
    session([
        'otp_user_id' => $user->id,
        'otp_expires_at' => $expiresAt->timestamp, // used for countdown
    ]);

    // Step 6: Log activity
    \App\Models\ActivityLog::create([
        'user_id'    => $user->id,
        'action'     => 'otp_sent',
        'description'=> 'OTP sent for login verification',
        'ip_address' => $request->ip(),
        'user_agent' => $request->userAgent(),
    ]);

    // Step 7: Redirect to OTP input
    return redirect('/verify-otp')->with('success', 'OTP has been sent to your email.');
}




// Show OTP verification form
    public function verifyOtp(Request $request)
{
    $request->validate([
        'otp' => 'required|digits:6'
    ]);

    $userId = session('otp_user_id');
    $user = User::find($userId);

    if (!$user || $user->otp_code !== $request->otp || now()->greaterThan($user->otp_expires_at)) {
        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }

    // OTP verified — log user in
    session(['user' => $user]);
    session()->forget('otp_user_id');

    // Optionally clear OTP from DB
    $user->otp_code = null;
    $user->otp_expires_at = null;
    $user->save();

    // Role-based redirection
    if ($user->role === 'admin') {
        return redirect('/admin/dashboard')->with('success', 'Welcome back, Admin!');
    } else {
        return redirect('/user/dashboard')->with('success', 'Welcome!');
    }

    return redirect('/dashboard')->with('success', 'Login successful. Welcome!');
}

    // Handle logout
    public function logout()
    {
        $user = session('user');

        if ($user) {
            \App\Models\ActivityLog::create([
                'user_id'    => $user->id,
                'action'     => 'logout',
                'description'=> 'User logged out',
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        }

        session()->forget('user');

        return redirect('/login')->with('success', 'You have been logged out.');
    }



    public function showProfile()
    {
        $user = session('user');
        return view('profile.edit', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'avatar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = \App\Models\User::findOrFail(session('user')->id);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }


        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->save();

        // Update session info too
        session(['user' => $user]);
        \Log::info('User avatar path:', ['avatar' => $user->avatar]);


        ActivityLog::create([
            'user_id'    => $user->id,
            'action'     => 'update_profile',
            'description'=> 'User updated profile info',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Profile updated successfully!');
    }



    public function showChangePasswordForm()
    {
        return view('profile.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = \App\Models\User::findOrFail(session('user')->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        ActivityLog::create([
            'user_id'    => $user->id,
            'action'     => 'change_password',
            'description'=> 'User changed their password',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Password changed successfully!');
    }


}
