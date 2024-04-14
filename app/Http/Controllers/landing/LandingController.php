<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\KategoriFoto;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LandingController extends Controller
{
    public function index()
    {
        $kategoris = KategoriFoto::all();
        return view('landing.index', compact('kategoris'));
    }

    public function addAlbum(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_album' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil
        $album = new Album();
        $album->nama_album = $request->nama_album;
        $album->deskripsi = $request->deskripsi;
        $album->tanggal_dibuat = now();

        // Set user_id dari pengguna yang sedang login
        $album->user_id = auth()->id();

        if ($album->save()) {
            return redirect()->back()->with('success', 'Album berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan album. Silakan coba lagi.');
        }
    }
}
