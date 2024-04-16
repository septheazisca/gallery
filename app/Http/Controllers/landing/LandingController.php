<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\foto;
use App\Models\KategoriFoto;
use App\Models\KomentarFoto;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LandingController extends Controller
{
    public function index()
    {
        $kategoris = KategoriFoto::all();
        $fotos = Foto::with('user')->get(); // Memuat data foto beserta data pengguna (user) yang mengunggahnya
        $albums = Album::where('user_id', auth()->id())->get();

        return view('user.index', compact('kategoris', 'albums', 'fotos'));
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

    public function addFoto(Request $request)
    {
        // Validasi request
        $request->validate([
            'lokasi_foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul_foto' => 'required|string|max:255',
            'deskripsi_foto' => 'required|string',
            'kategori' => 'required|exists:kategori_foto,kategori_id',
            'album' => 'required|exists:album,album_id',
        ]);

        try {
            // Menyimpan gambar ke dalam direktori storage
            $imageName = $request->lokasi_foto->store('public/images');

            // Mendapatkan URL gambar yang tepat
            $lokasi_foto = url(Storage::url($imageName));

            // Menyimpan data foto ke dalam database dengan user_id yang sedang login
            Foto::create([
                'judul_foto' => $request->judul_foto,
                'deskripsi_foto' => $request->deskripsi_foto,
                'lokasi_foto' => $lokasi_foto, // Menggunakan URL gambar yang telah dibuat
                'tanggal_unggahan' => now(),
                'kategori_id' => $request->kategori,
                'album_id' => $request->album,
                'user_id' => auth()->id(), // Mengambil user_id pengguna yang sedang login
            ]);

            // Redirect atau response sesuai kebutuhan
            return redirect()->back()->with('success', 'Foto berhasil diunggah.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, redirect dengan pesan error
            return redirect()->back()->with('error', 'Gagal mengunggah foto. Silakan coba lagi.');
        }
    }

    public function simpanKomentar(Request $request)
    {
        // Validasi data
        $request->validate([
            'isi_komentar' => 'required|string',
            'foto_id' => 'required|exists:foto,foto_id', // Pastikan foto_id ada dalam tabel foto
        ]);

        // Simpan komentar ke database
        $komentar = new KomentarFoto();
        $komentar->isi_komentar = $request->isi_komentar;
        $komentar->user_id = auth()->id();
        $komentar->foto_id = $request->foto_id;
        $komentar->tanggal_komentar = now(); // Menetapkan nilai tanggal saat ini
        $komentar->save();

        // Kirim tanggapan kembali sebagai konfirmasi
        return response()->json(['message' => 'Komentar berhasil disimpan.']);
    }
}
