<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|email|unique:users',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
        ]);

        return redirect('/gallery');
    }
}
