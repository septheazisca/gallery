<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // public function showRegisterForm()
    // {
    //     return view('auth.signup');
    // }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|email|unique:users',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
        ]);
        $defaultImagePath = 'storage/profile/user.jpg'; // Ganti dengan path gambar default Anda
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'profile_image' => $defaultImagePath, // Tambahkan path gambar default
        ]);

        // Autentikasi pengguna setelah berhasil mendaftar
        Auth::login($user);

        return redirect('/gallery');
    }
}
