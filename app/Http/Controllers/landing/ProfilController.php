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
        $kategoris = KategoriFoto::all();
        $fotos = Foto::where('user_id', auth()->id())->orderBy('tanggal_unggahan', 'desc')->take(12)->get();
        $albums = Album::where('user_id', auth()->id())->get();
        return view('landing.profil', compact('kategoris', 'fotos', 'albums'));
    }
}
