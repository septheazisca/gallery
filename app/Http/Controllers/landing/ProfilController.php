<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\foto;
use App\Models\KategoriFoto;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil()
    {
        $kategoris = KategoriFoto::orderBy('judul_kategori', 'asc')->get();
        $fotos = Foto::where('user_id', auth()->id())->get();
        $albums = Album::where('user_id', auth()->id())->get();

        return view('user.profil', compact('kategoris', 'albums', 'fotos'));
    }
}
