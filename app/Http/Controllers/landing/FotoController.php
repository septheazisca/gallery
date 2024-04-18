<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class FotoController extends Controller
{
    public function addFoto(Request $request)
    {
        // Validasi request
        $validator = Validator::make($request->all(), [
            'lokasi_foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul_foto' => 'required|string|max:255',
            'deskripsi_foto' => 'nullable|string',
            'kategori' => 'nullable|exists:kategori_foto,kategori_id',
            'album' => 'nullable|exists:album,album_id',
            'new_album' => 'nullable|string|max:255',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Simpan gambar
            $imageName = $request->lokasi_foto->store('public/images');
            $lokasi_foto = url(Storage::url($imageName));

            // Buat objek foto baru
            $photo = new Foto();
            $photo->judul_foto = $request->judul_foto;
            $photo->lokasi_foto = $lokasi_foto;
            $photo->tanggal_unggahan = now();
            $photo->user_id = auth()->id();
            $photo->deskripsi_foto = $request->filled('deskripsi_foto') ? $request->deskripsi_foto : null;

            // Menetapkan nilai kategori_id, jika tidak null
            $photo->kategori_id = $request->filled('kategori') ? $request->kategori : null;

            // Menetapkan nilai album_id
            if ($request->filled('new_album')) {
                // Jika album baru dipilih, simpan informasi album baru
                $album = new Album();
                $album->nama_album = $request->new_album;
                $album->user_id = auth()->id();
                $album->save();

                // Setel album_id foto ke album baru yang dibuat
                $photo->album_id = $album->album_id;
            } elseif ($request->filled('album')) {
                // Jika album yang ada dipilih
                $photo->album_id = $request->album;
            } else {
                // Jika tidak ada album yang dipilih
                $photo->album_id = null;
            }

            $photo->save();

            return redirect()->back()->with('success', 'Foto berhasil diunggah.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengunggah foto. Silakan coba lagi.');
        }
    }



    public function editFoto(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul_foto' => 'required',
            // 'deskripsi_foto' => 'required',
            // 'kategori' => 'required',
        ]);

        $foto = Foto::findOrFail($id);

        $foto->judul_foto = $request->judul_foto;
        $foto->deskripsi_foto = $request->deskripsi_foto;
        $foto->kategori_id = $request->kategori;
        $foto->save();

        return redirect()->back()->with('success', 'Foto berhasil diperbarui.');
    }


    public function hapusFoto($id)
    {
        try {
            $foto = Foto::findOrFail($id);

            Storage::delete($foto->lokasi_foto);

            $foto->delete();

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus foto. Silakan coba lagi.');
        }
    }
}
