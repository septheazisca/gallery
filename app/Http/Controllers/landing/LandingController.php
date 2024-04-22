<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\AktivitasUser;
use App\Models\Album;
use App\Models\foto;
use App\Models\JenisLaporan;
use App\Models\KategoriFoto;
use App\Models\KomentarFoto;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LandingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategoris = KategoriFoto::orderBy('judul_kategori', 'asc')->get();
        $fotos = Foto::with('user')->get(); // Memuat data foto beserta data pengguna (user) yang mengunggahnya
        $albums = Album::where('user_id', auth()->id())->get();
        $showKategoris = KategoriFoto::orderBy('judul_kategori', 'asc')->take(20)->get();
        $jenisLaporans = JenisLaporan::all();

        return view('user.index', compact('kategoris', 'albums', 'fotos', 'showKategoris', 'user', 'jenisLaporans'));
    }

    public function masterUser()
    {
        $user = Auth::user();
        return view('user.layout.master-user', compact('user'));
    }

    public function addAlbum(Request $request)
    {
        // Validasi input
        // $validator = Validator::make($request->all(), [
        //     'nama_album' => 'required|string|max:255',
        //     'deskripsi' => 'required|string',
        // ]);

        // Jika validasi gagal
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

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

    public function search(Request $request)
    {

        $kategoris = KategoriFoto::all();
        $fotos = Foto::with('user')->get(); // Memuat data foto beserta data pengguna (user) yang mengunggahnya
        $albums = Album::where('user_id', auth()->id())->get();
        $user = Auth::user();

        $query = $request->input('query');
        $results = Foto::with('user') // Memuat data pengguna (user) yang mengunggah foto
            ->whereRaw("judul_foto @@ plainto_tsquery('english', ?)", [$query])
            ->get();


        if (Auth::check()) {
            // Buat pesan aktivitas
            $aktivitas = 'Melakukan pencarian dengan kata kunci "' . $query. '"';

            // Simpan aktivitas ke tabel aktivitas_user
            AktivitasUser::create([
                'user_id' => auth()->id(),
                'aktivitas' => $aktivitas,
                // Anda mungkin ingin menyertakan informasi tambahan seperti jenis pencarian yang dilakukan
            ]);
        }

        return view('user.search', compact('results', 'query', 'kategoris', 'albums', 'fotos', 'user'));
    }
}
