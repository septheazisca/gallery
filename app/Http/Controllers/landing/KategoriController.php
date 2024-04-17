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
        $kategoris = KategoriFoto::orderBy('judul_kategori', 'asc')->get();
        $fotos = Foto::with('user')->get();
        $albums = Album::where('user_id', auth()->id())->get();

        return view('user.kategori', compact('kategoris', 'albums', 'fotos'));
    }

    public function showKategori($kategori_id)
    {
        $kategoris = KategoriFoto::all();
        $showKategori = KategoriFoto::findOrFail($kategori_id);

        $fotos = Foto::where('kategori_id', $kategori_id)->with('user')->get();
        $albums = Album::where('user_id', auth()->id())->get();

        return view('user.show-kategori', compact('showKategori', 'fotos', 'albums', 'kategoris'));
    }
}
