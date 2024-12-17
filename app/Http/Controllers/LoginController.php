<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    // Method untuk menampilkan halaman login
    public function index() 
    {
        return view('login.index');
    }

    // Method untuk memproses login
    public function login(Request $request) 
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Temukan pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek kredensial login secara manual
        if ($user && $user->password === $request->password)
        {
            // Login pengguna secara manual
            Auth::login($user);

            // Regenerate session untuk keamanan
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        // Kembali ke halaman login dengan pesan error
        return back()->withErrors(['loginError' => 'Login failed! Please check your credentials and try again.'])->withInput();
    }

    

    // Method untuk logout
    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
