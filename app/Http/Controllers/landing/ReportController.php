<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\ReportFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function reportFoto(Request $request)
    {
        // Validasi input yang masuk
        $request->validate([
            'jenis_laporan' => 'required|exists:jenis_laporan,jenislaporan_id', // Pastikan ini ada di DB
            'foto_id' => 'required|exists:foto,foto_id', // ID foto yang akan dilaporkan
        ]);

        // Buat laporan baru
        $report = new ReportFoto();
        $report->foto_id = $request->input('foto_id'); // ID foto yang dilaporkan
        $report->jenislaporan_id = $request->input('jenis_laporan'); // ID jenis laporan
        $report->pelapor_id = Auth::id(); // ID pengguna yang melaporkan
        $report->status = 'Panding'; // tambahkan style ini <span class="badge text-bg-danger">Panding</span>
        $report->save();

        // Redirect atau memberikan respons setelah laporan dibuat
        return redirect()->back()->with('success', 'Laporan berhasil dibuat.');
    }
}
