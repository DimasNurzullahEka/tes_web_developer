<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Model User untuk penyimpanan data user
use Illuminate\Support\Facades\Hash; // Untuk hashing password

class ResetController extends Controller
{
    //
 // Menampilkan form reset password
 public function showResetForm()
 {
     return view('auth.forgot-password');
 }

 // Meng-handle reset password
 public function resetPassword(Request $request)
 {
     $request->validate([
         'email' => 'required|email|exists:users,email',
         'password' => 'required|min:6|confirmed',
     ]);

     // Mencari user berdasarkan email
     $user = User::where('email', $request->email)->first();

     // Mengupdate password user
     $user->password = Hash::make($request->password);
     $user->save();

     return redirect()->route('login.index')->with('status', 'Password has been reset!');
 }
}
