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
    public function authenticated(Request $request, $user)
    {
        // Cek apakah user adalah mahasiswa
        if ($user->role === 'mahasiswa') {
            // Cari data mahasiswa berdasarkan user_id dan status "Diterima"
            $mahasiswa = \App\Models\Mahasiswa::where('user_id', $user->id)
                ->where('status', 'Diterima')
                ->first();

            // Jika mahasiswa ditemukan dan statusnya "Diterima"
            if ($mahasiswa) {
                // Redirect ke halaman laporan harian
                return redirect()->route('laporan-harian.index');
            } else {
                // Jika belum diterima, bisa redirect ke halaman info atau dashboard
                return redirect()->route('home')->with('error', 'Akses laporan harian hanya untuk mahasiswa yang sudah diterima.');
            }
        }

        // Jika bukan mahasiswa, redirect ke halaman default (misal admin dashboard)
        return redirect()->intended(route('home'));
    }
}
