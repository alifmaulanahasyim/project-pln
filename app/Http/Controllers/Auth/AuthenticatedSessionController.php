<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Tambahkan session khusus untuk mahasiswa yang memiliki user_id sesuai id user yang login
            $mahasiswa = \App\Models\Mahasiswa::where('user_id', $user->id)->first();
            if ($mahasiswa) {
                session([
                    'mahasiswa_user_id' => $user->id,
                    'mahasiswa_id' => $mahasiswa->user_id, // user_id pada tabel mahasiswas
                    'mahasiswa_data' => $mahasiswa,
                ]);
            }

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect('/data'); // Admin dashboard
            } else {
                return redirect('/'); // Mahasiswa home page
            }
        }

        return back()->withErrors([
            'email' => 'Akun anda tidak ditemukan atau password salah.',
        ])->onlyInput('email');
    }


    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 🔁 Redirect to login page after logout
        return redirect()->route('login');
    }
}
