<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;

class UserController extends Controller
{
    public function userlist()
    {
        $user = User::where('user_type', '!=', 'admin')->get();
        return view('admin.user.user-list', compact('user'));
    }

    public function adduser()
    {
        return view('admin.user.add-user');
    }

    public function saveuser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'number' => ['required', 'string', 'number', 'max:20', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->user_type = $request->user_type;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('user-list')->with('success', 'User created successfully.');
    }

    public function edituser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit-user', compact('user'));
    }

    public function updateuser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'number' => 'nullable|string|max:20',
            'user_type' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->user_type = $request->user_type;
        $user->save();

        return redirect()->route('user-list')->with('success', 'User updated successfully.');
    }

    public function changepassword($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.change-password', compact('user'));
    }

    public function updatepassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user-list')->with('success', 'Password updated successfully.');
    }

    public function viewuser($id)
{
    // Fetch the user by ID
    $user = User::findOrFail($id);

    // Return the view and pass the user data to the view
    return view('admin.user.view-user', compact('user'));
}

}
