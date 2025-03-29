<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = new User();
        $user->name = trim($validator['name']);
        $user->email = trim($validator['email']);
        $user->password = $validator['password'];
        $user->save();

        Auth::login($user);

        return redirect()->route('tasks.index');
    }

    public function login(Request $request)
    {
        $validator = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (Auth::attempt($validator)) {
            $request->session()->regenerate();

            return redirect()->route('tasks.index');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Incorret credentials',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }
}
