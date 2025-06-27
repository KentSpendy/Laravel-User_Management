<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile'); // You must have this Blade file
    }

    public function update(Request $request)
    {
        $user = session('user');
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'avatar'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads'), $filename);
            $data['avatar'] = $filename;
        }

        // Update session and database
        $user = User::find($user->id);
        $user->update($data);
        session(['user' => $user]); // Refresh session data

        return back()->with('success', 'Profile updated successfully.');
    }
}
