<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\KategoriFoto;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function kategori()
    {
        $kategoris = KategoriFoto::all();
        return view('landing.kategori', compact('kategoris'));
    }
}
