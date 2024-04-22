<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\foto;
use App\Models\JenisLaporan;
use App\Models\KategoriFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class kategoriController extends Controller
{
    public function kategori()
    {
        $user = Auth::user();
        $kategoris = KategoriFoto::orderBy('judul_kategori', 'asc')->get();
        $fotos = Foto::with('user')->get();
        $albums = Album::where('user_id', auth()->id())->get();
        $jenisLaporans = JenisLaporan::all();

        return view('user.kategori', compact('kategoris', 'albums', 'fotos', 'user', 'jenisLaporans'));
    }

    public function showKategori($kategori_id)
    {
        $user = Auth::user();
        $kategoris = KategoriFoto::all();
        $showKategori = KategoriFoto::findOrFail($kategori_id);

        $fotos = Foto::where('kategori_id', $kategori_id)->with('user')->get();
        $albums = Album::where('user_id', auth()->id())->get();
        $jenisLaporans = JenisLaporan::all();

        return view('user.show-kategori', compact('showKategori', 'fotos', 'albums', 'kategoris', 'user', 'jenisLaporans'));
    }
}
