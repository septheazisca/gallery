<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        'profile_image' => 'required' // tambahkan validasi untuk gambar
    ]);

    try {
        $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'profile_image' => $profileImagePath,
        ]);

        Auth::login($user);

        return redirect('/');
    } catch (\Exception $e) {
        Log::error('Error occurred while registering user: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
    }
}

}
