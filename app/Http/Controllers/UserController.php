<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function updateProfile(Request $request)
    {
        $validator = $request->validate([
            'name' => ['sometimes', 'nullable', 'max:50', 'min:5'],
            'email' => ['sometimes', 'nullable', 'email', 'unique:users'],
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if ($validator['name']) {
            $user->name = $validator['name'];
        }
        if ($validator['email']) {
            $user->email = $validator['email'];
        }

        $user->save();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Profile uptated successfully');
    }
    public function updatePassword(Request $request)
    {
        $validator = $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()
                ->route('tasks.index')
                ->withErrors(['current_password' => 'Incorrect password']);
        }

        $user->update([
            'password' => $validator['password'],
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Password uptated successfully');
    }
}
