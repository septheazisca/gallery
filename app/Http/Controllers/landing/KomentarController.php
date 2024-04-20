<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\AktivitasUser;
use App\Models\foto;
use App\Models\KomentarFoto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            // Simpan data komentar ke database
            $comment = new KomentarFoto();
            $comment->isi_komentar = $request->isi_komentar;
            $comment->user_id = Auth::user()->user_id; // Menggunakan Auth::user()->user_id untuk mendapatkan ID pengguna
            $comment->foto_id = $request->foto_id;
            $comment->tanggal_komentar = Carbon::now();
            $comment->save();

            $foto = foto::findOrFail($request->foto_id);

            // Ambil username pemilik foto
            $ownerUsername = $foto->user->username;
            $ownerFoto = $foto->lokasi_foto;

            // Buat aktivitas pengguna dengan menyertakan username pemilik foto
            $aktivitas = "Mengirim komentar pada salah satu postingan milik @" . $ownerUsername;

            // Simpan aktivitas ke tabel aktivitas_user
            AktivitasUser::create([
                'user_id' => auth()->id(),
                'aktivitas' => $aktivitas,
                // 'foto' => $ownerFoto
                'foto' =>  str_replace('http://127.0.0.1:8000/storage/', '','public/'.$ownerFoto->lokasi_foto)

            ]);

            // Redirect atau tampilkan respons sesuai kebutuhan aplikasi Anda
            return response()->json(['message' => 'Komentar berhasil ditambahkan!', 'foto_id' => $request->foto_id]);
        } else {
            // Jika pengguna belum login, kembalikan respons dengan pesan kesalahan
            return response()->json(['message' => 'Anda harus login untuk menambahkan komentar'], 401);
        }
    }

    public function getComment($id)
    {
        // $comments = Komentar::where('foto_id', $id)->orderBy('created_at', 'desc')->get();
        $comments = KomentarFoto::where('foto_id', $id)->with('user')->orderBy('created_at', 'desc')->get();
        return response()->json(['comments' => $comments]);

        // return view('comments.index', compact('comments'));
    }
}
