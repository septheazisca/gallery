<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\foto;
use App\Models\KategoriFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    // public function showAlbum()
    // {
    //     $kategoris = KategoriFoto::orderBy('judul_kategori', 'asc')->get();
    //     $fotos = foto::with('user')->get(); // Memuat data foto beserta data pengguna (user) yang mengunggahnya
    //     $albums = Album::where('user_id', auth()->id())->get();

    //     return view('user.show-album', compact('kategoris', 'albums', 'fotos'));
    // }

    public function showAlbum($album_id)
    {

        $user = Auth::user();

        $albums = Album::where('user_id', auth()->id())->get();

        // Ambil album yang dipilih
        $album = Album::findOrFail($album_id);
        $album = Album::findOrFail($album_id); // Ambil detail album berdasarkan $album_id


        // Ambil kategoris (jika diperlukan)
        $kategoris = KategoriFoto::orderBy('judul_kategori', 'asc')->get();

        // Ambil foto-foto yang terkait dengan album yang dipilih
        $fotos = Foto::where('album_id', $album_id)->with('user')->get();

        // Kembalikan tampilan dengan data yang diperlukan
        return view('user.show-album', compact('albums', 'album', 'kategoris', 'fotos', 'user'));
    }
}
