<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle Login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_id' => $admin->id]);
            return redirect()->route('data');
        }

        return redirect()->back()->withErrors(['error' => 'Username atau password anda salah.']);
    }

    // Handle Logout
    public function logout()
    {
        session()->forget('admin_id');
        return redirect()->route('home');
    }

    // Show Register Form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle Register
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:admins,username',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $admin = new Admin();
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->save();

        session(['admin_id' => $admin->id]);

        return redirect()->route('data');
    }
}
