<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\foto;
use App\Models\KategoriFoto;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function kategori()
    {
        $kategoris = KategoriFoto::all();
        $fotos = foto::all();
        $albums = Album::where('user_id', auth()->id())->get();
        return view('landing.kategori', compact('kategoris', 'fotos', 'albums'));
    }
}
