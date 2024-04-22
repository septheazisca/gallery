<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\foto;
use App\Models\ReportFoto;
use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    public function index()
    {
        // $fotos = foto::all();
        // $reports = ReportFoto::with(['foto.user', 'jenisLaporan', 'pelapor'])->get();
        // return view('dashboard.pelaporan', compact('fotos', 'reports'));
        // Ambil semua laporan
        $reports = ReportFoto::all();

        // Kelompokkan berdasarkan foto_id
        $groupedReports = $reports->groupBy('foto_id');

        return view('dashboard.pelaporan', [
            'groupedReports' => $groupedReports
        ]);
    }
}
