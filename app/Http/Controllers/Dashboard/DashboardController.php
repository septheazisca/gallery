<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\foto;
use App\Models\KategoriFoto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $kategoris = KategoriFoto::all();
        $fotos = foto::all();
        $users = User::all();

        $totalKategoris = KategoriFoto::count();
        $totalFotos = foto::count();
        $totalUsers= User::count();

        $latestkategoris = KategoriFoto::orderBy('created_at', 'desc')->take(3)->get();
        $latestFotos = foto::orderBy('created_at', 'desc')->take(3)->get();
        $latestUsers = User::orderBy('created_at', 'desc')->take(3)->get();
        return view('dashboard.index', compact('kategoris','fotos', 'users', 'totalKategoris', 'totalFotos', 'totalUsers','latestkategoris', 'latestFotos', 'latestUsers'));
    }

}
