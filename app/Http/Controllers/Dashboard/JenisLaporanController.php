<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\foto;
use App\Models\JenisLaporan;
use App\Models\KategoriFoto;
use Illuminate\Http\Request;

class JenisLaporanController extends Controller
{
    public function index()
    {
        $jenisLaporans = JenisLaporan::all();
        return view('dashboard.jenis-laporan', compact('jenisLaporans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_laporan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        JenisLaporan::create($validated);

        return redirect()->back()->with('success', 'Jenis laporan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'jenis_laporan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $jenisLaporan = Jenislaporan::find($id);

        if (!$jenisLaporan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $jenisLaporan->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenisLaporan = JenisLaporan::find($id);

        if (!$jenisLaporan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $jenisLaporan->delete();

        return redirect()->back()->with('success', 'Jenis pelaporan berhasil dihapus.');
    }
}
