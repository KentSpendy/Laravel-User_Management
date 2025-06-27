<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // make sure this is at the top

class AdminUserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:user,admin',
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = now();
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }


    public function edit(User $user) {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Step 1: Validate input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'role'       => 'required|in:user,admin',
            'password'   => 'nullable|confirmed|string|min:6', // confirmation added
        ]);

        // Step 2: Update fields
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->role       = $request->role;

        // Step 3: Only update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }


    public function destroy(User $user) {
        $user->delete(); // Soft delete if using SoftDeletes trait
        return redirect()->route('admin.users.index')->with('success', 'User deleted.');
    }

    public function show(User $user) {
        return view('admin.users.show', compact('user'));
    }
}

