<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Model User untuk penyimpanan data user
use Illuminate\Support\Facades\Hash; // Untuk hashing password
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Impor Storage

class AuthController extends Controller
{
    //
    public function  showRegisterForm()
    {
        // Return the register view (make sure this view exists)
        return view('auth.register');
    }
    public function process_register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Simpan data user ke database
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum disimpan
        ]);

        // Login user setelah berhasil register
        Auth::login($user);

        // Redirect ke halaman dashboard atau sesuai keinginan
        return redirect()->route('login.index')->with('success', 'Registration successful. Please login.'); // Sesuaikan dengan route dashboard Anda
    }

    public function showLoginForm()
    {
        // Return the register view (make sure this view exists)
        return view('Auth.Login');
    }
    public function process_login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt untuk login dengan email dan password
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            // Jika berhasil login, redirect ke dashboard
            return redirect()->intended('dashboard');
        }

        // Jika gagal login, kembali ke halaman login dengan error
        return back()->withErrors([
            'email' => 'Invalid email or password',
        ])->withInput($request->only('email', 'remember'));
    }

    // Method untuk logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    public function index()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login

        return view('dashboard.dashboard', compact('user')); // Kirimkan data pengguna ke view
    }
}
