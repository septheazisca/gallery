<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\foto;
use App\Models\KategoriFoto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function profil($id)
    {
        $kategoris = KategoriFoto::orderBy('judul_kategori', 'asc')->get();
        $fotos = Foto::where('user_id', $id)->get();
        $albums = Album::where('user_id', $id)->get();
        $userss = User::find($id);
        $user = Auth::user();
        $totalPost = $fotos->count();
        $totalAlbum = $albums->count();
        return view('user.profil', compact('kategoris', 'albums', 'fotos', 'user', 'totalPost', 'totalAlbum', 'userss'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->nama_lengkap = $request->input('nama_lengkap');
        $user->username = $request->input('username');
        $user->alamat = $request->input('alamat');
        $user->email = $request->input('email');

        if ($request->hasFile('profile_image')) {
            // Proses penyimpanan foto profil
            $profileImagePath = $request->file('profile_image')->store('public/profile_images');
            $user->profile_image = $profileImagePath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
