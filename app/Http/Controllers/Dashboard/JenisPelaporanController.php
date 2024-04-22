<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\foto;
use App\Models\KategoriFoto;
use Illuminate\Http\Request;

class JenisPelaporanController extends Controller
{
    public function jenisPelaporan()
    {
        $fotos = foto::all();
        $kategoris = KategoriFoto::all();
        return view('dashboard.jenis-pelaporan', compact('fotos', 'kategoris'));
    }
}
