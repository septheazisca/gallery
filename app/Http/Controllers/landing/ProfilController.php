<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\AktivitasUser;
use App\Models\Album;
use App\Models\foto;
use App\Models\JenisLaporan;
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
        // $albums = Album::where('user_id', $id)->get();
        $albums = Album::with('foto')->where('user_id', $id)->get(); // Eager loading
        $userss = User::find($id);
        $user = Auth::user();
        $totalPost = $fotos->count();
        $totalAlbum = $albums->count();
        $jenisLaporans = JenisLaporan::all();
        return view('user.profil', compact('kategoris', 'albums', 'fotos', 'user', 'totalPost', 'totalAlbum', 'userss', 'jenisLaporans'));
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
            $photo_profile = str_replace('public/', '', $profileImagePath);

            $user->profile_image = $photo_profile;
        }

        $user->save();

        $aktivitas = 'Mengupdate profil';

        // Simpan aktivitas ke tabel aktivitas_user
        AktivitasUser::create([
            'user_id' => $user->user_id,
            'aktivitas' => $aktivitas,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
