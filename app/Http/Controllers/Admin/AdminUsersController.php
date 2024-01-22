<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all(); // Retrieve all users
        return view('admin.admin_users', compact('users')); // Return the admin users view with users data
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id User ID
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find the user by ID or fail
        return view('admin.admin_users_edit', compact('user')); // Return the edit view with the user's data
    }

    /**
     * Update the specified user in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id User ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([ // Validate the request data
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id); // Find the user by ID or fail
        $user->update($validatedData); // Update the user with validated data

        return redirect()->route('admin.users')->with('success', 'User updated successfully'); // Redirect back with success message
    }
}
