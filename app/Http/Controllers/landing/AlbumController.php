<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\foto;
use App\Models\JenisLaporan;
use App\Models\KategoriFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class AlbumController extends Controller
{

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
        $jenisLaporans = JenisLaporan::all();


        // Kembalikan tampilan dengan data yang diperlukan
        return view('user.show-album', compact('albums', 'album', 'kategoris', 'fotos', 'user', 'jenisLaporans'));
    }

    public function editAlbum(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_album' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Temukan album yang akan diedit
            $album = Album::findOrFail($id);

            // Periksa apakah pengguna memiliki izin untuk mengedit album
            if ($album->user_id != auth()->id()) {
                return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengedit album ini.');
            }

            // Update data album
            $album->nama_album = $request->nama_album;
            $album->deskripsi = $request->deskripsi;
            $album->save();

            // Redirect ke halaman yang sesuai dengan pesan sukses
            return redirect()->back()->with('success', 'Album berhasil diperbarui.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, redirect dengan pesan error
            return redirect()->back()->with('error', 'Gagal memperbarui album. Silakan coba lagi.');
        }
    }

    public function deleteAlbum(Request $request, $id)
    {
        try {
            $album = Album::findOrFail($id);
    
            // Periksa apakah pengguna memiliki izin untuk menghapus album
            if ($album->user_id != auth()->id()) {
                return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus album ini.');
            }
    
            // Simpan user_id untuk pengguna yang akan diarahkan kembali ke halaman profil
            $userId = Auth::id();
    
            // Hapus album
            $album->delete();
    
            // Redirect kembali ke halaman profil
            return Redirect::route('profil', ['id' => $userId])->with('success', 'Album berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus album. Silakan coba lagi.');
        }
    }
}
