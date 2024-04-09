<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\KategoriFoto;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $kategoris = KategoriFoto::all();
        return view('landing.index', compact('kategoris'));
    }
}
