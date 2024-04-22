<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportFoto extends Model
{
    use HasFactory;

    protected $table = 'report_foto';
    protected $primaryKey = 'report_foto_id';
    protected $guarded = [];

    public function foto()
    {
        return $this->belongsTo(Foto::class, 'foto_id', 'foto_id');
    }

    public function jenisLaporan()
    {
        return $this->belongsTo(JenisLaporan::class, 'jenislaporan_id', 'jenislaporan_id');
    }

    public function pelapor()
    {
        return $this->belongsTo(User::class, 'pelapor_id', 'user_id');
    }
}
