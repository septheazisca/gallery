<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\foto;
use App\Models\KategoriFoto;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil($id)
    {
        $kategoris = KategoriFoto::orderBy('judul_kategori', 'asc')->get();
        $fotos = Foto::where('user_id', $id)->get();
        $albums = Album::where('user_id', $id)->get();
        $user = User::find($id);
        $totalPost = $fotos->count();
        $totalAlbum = $albums->count();
        return view('user.profil', compact('kategoris', 'albums', 'fotos', 'user','totalPost', 'totalAlbum'));
    }
}
