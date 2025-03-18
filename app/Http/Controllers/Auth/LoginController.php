<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Pastikan user ditemukan sebelum pengecekan role
            if (!$user) {
                return redirect('/');
            }

            // Jika role user adalah nonaktif, logout dan tampilkan pesan error
            if ($user->role === 'nonaktif') {
                Auth::logout();
                return redirect()->back()->withErrors([
                    'email' => 'Akun Anda tidak aktif.'
                ]);
            }

            // Tandai user sebagai online selama 15 menit
            Cache::put('user_online_' . $user->id, true, now()->addMinutes(15));

            // Catat aktivitas login (catat hanya sekali di sini)
            activity()
                ->causedBy($user)
                ->withProperties(['ip' => $request->ip()])
                ->log('User berhasil login');

            // Redirect berdasarkan role
            if ($user->hasRole('superadmin')) {
                return redirect('/admin');
            } elseif ($user->hasRole('admin')) {
                return redirect('/admin');
            } elseif ($user->hasRole('user')) {
                return redirect('/');
            } else {
                return redirect('/');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        // Hapus status online
        Cache::forget('user_online_' . Auth::id());

        // Catat aktivitas logout
        activity()
            ->causedBy(Auth::user())
            ->log('User logout');


        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
