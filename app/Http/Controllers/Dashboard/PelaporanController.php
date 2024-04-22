<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\foto;
use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    public function index()
    {
        $fotos = foto::all();
        return view('dashboard.pelaporan', compact('fotos'));
    }
}
