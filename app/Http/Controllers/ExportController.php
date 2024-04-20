<?php

namespace App\Http\Controllers;

use App\Models\AktivitasUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;

class ExportController extends Controller
{
    public function exportPDF()
    {
        $userId = Auth::id();
        $aktivitas = AktivitasUser::where('user_id', $userId)->get();
        $user = User::findOrFail($userId);

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Memuat tampilan ke objek Dompdf
        $html = view('user.export.pdf', compact('aktivitas', 'user'));
        $dompdf->loadHtml($html);

        // Render PDF
        $dompdf->render();

        // Mengunduh file PDF
        return $dompdf->stream('aktivitas.pdf');
    }
}
