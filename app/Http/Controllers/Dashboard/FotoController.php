<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function foto()
    {
        $fotos = foto::all();
        return view('dashboard.foto', compact('fotos'));
    }
}
