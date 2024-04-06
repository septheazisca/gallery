<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function profil()
    {
        $user = Auth::user(); 
        $data = User::where('user_id', $user->user_id)->get(); 
        return view('dashboard.profil', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required', 
        ]);
    
        $user = Auth::user();
    
        // Validasi Password Lama
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama yang dimasukkan salah.');
        }
    
        // Hash Password Baru
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }
}
