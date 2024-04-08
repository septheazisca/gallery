<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KategoriFoto;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
  public function store(Request $request)
  {
    $request->validate([
      'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
      'judul' => 'required|string|max:255',
      'detail' => 'required|string',
    ]);

    try {
      $thumbnailPath = $request->file('thumbnail')->store('thumbnails');

      KategoriFoto::create([
        'thumbnail_kategori' => $thumbnailPath,
        'judul_kategori' => $request->judul,
        'deskripsi_kategori' => $request->detail,
      ]);

      return redirect('/dashboard-kategori')->with('success', 'Kategori berhasil ditambahkan!');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
    }
  }
}
