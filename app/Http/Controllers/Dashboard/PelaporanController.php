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

    public function destroy(Request $request)
    {
        $foto_id = $request->input('foto_id'); // Ambil ID foto
        $foto = Foto::find($foto_id); // Cari foto berdasarkan ID
    
        if ($foto) {
            $foto->delete(); // Hapus foto
            return response()->json(['message' => 'Foto berhasil dihapus'], 200); // Respons sukses
        }
    
        return response()->json(['message' => 'Foto tidak ditemukan'], 404); // Respons error
    }
}
