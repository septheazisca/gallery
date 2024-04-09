<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KategoriFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
  public function index()
  {
    $kategoris = KategoriFoto::all();
    return view('dashboard.kategori', compact('kategoris'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
      'judul' => 'required|string|max:255',
      'detail' => 'required|string',
    ]);

    try {
      $thumbnail = $request->file('thumbnail');

      // Memeriksa apakah file yang diunggah adalah gambar yang valid
      if (!$thumbnail->isValid()) {
        return redirect()->back()->with('error', 'File gambar tidak valid.');
      }

      // Menyimpan file dengan nama yang unik di dalam direktori storage/app/thumbnails
      $thumbnailPath = $thumbnail->store('thumbnails', 'public');

      KategoriFoto::create([
        'thumbnail_kategori' => $thumbnailPath,
        'judul_kategori' => $request->judul,
        'deskripsi_kategori' => $request->detail,
      ]);

      return redirect('/dashboard-kategori')->with('success', 'Kategori berhasil ditambahkan!');
    } catch (\Exception $e) {
      // Logging error
      Log::error('Error occurred while storing category: ' . $e->getMessage());
      return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
    }
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'judul' => 'required|string|max:255',
      'detail' => 'required|string',
    ]);

    try {
      $kategori = KategoriFoto::findOrFail($id);

      if ($request->hasFile('thumbnail')) {
        $thumbnail = $request->file('thumbnail');

        // Memeriksa apakah file yang diunggah adalah gambar yang valid
        if (!$thumbnail->isValid()) {
          return redirect()->back()->with('error', 'File gambar tidak valid.');
        }

        // Menyimpan file dengan nama yang unik di dalam direktori storage/app/thumbnails
        $thumbnailPath = $thumbnail->store('thumbnails', 'public');

        // Menghapus thumbnail lama jika ada dan menyimpan yang baru
        if ($kategori->thumbnail_kategori) {
          Storage::disk('public')->delete($kategori->thumbnail_kategori);
        }
        $kategori->thumbnail_kategori = $thumbnailPath;
      }

      // Mengupdate data kategori
      $kategori->judul_kategori = $request->judul;
      $kategori->deskripsi_kategori = $request->detail;
      $kategori->save();

      return redirect('/dashboard-kategori')->with('success', 'Kategori berhasil diperbarui!');
    } catch (\Exception $e) {
      // Logging error
      Log::error('Error occurred while updating category: ' . $e->getMessage());
      return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
    }
  }
}
