<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function createAlbum(Request $request) 
    {
        $data = Album::create([
            // 'user_id' => Auth::user()->id,
            'user_id' => 1,
            'nama_album' => $request->nama_album,
            'deskripsi' => $request->deskripsi,
            'tanggal_dibuat' => Carbon::now(),
        ]);

        return response()->json(['status'=> $data]);
    }
}
