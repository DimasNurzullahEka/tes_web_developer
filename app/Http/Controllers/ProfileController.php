<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Impor Storage
use Illuminate\Support\Facades\Hash; // Untuk hashing password

class ProfileController extends Controller
{
    //
    public function edit()
    {
        $user = Auth::user();
        return view('Profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        // Simpan foto profil jika diupload
        if ($request->hasFile('profile_photo')) {
            // Hapus foto profil lama jika ada
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Simpan foto profil baru
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $profilePhotoPath;
        }

        // Update data pengguna
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'profile_photo' => $user->profile_photo, // Simpan path foto profil
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
