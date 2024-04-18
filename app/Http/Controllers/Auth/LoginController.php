<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if ($request->username === 'admingallery1975@gmail.com') {
                return redirect('/dashboard'); 
            } else {
                return redirect('/');
            }
        }
    
        return redirect('/')->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
