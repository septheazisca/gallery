<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    use HasFactory;


    protected $table = 'foto';
    protected $primaryKey = 'foto_id';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(KategoriFoto::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function komentar()
    {
        return $this->hasMany(KomentarFoto::class);
    }

    public function reportFotos()
    {
        return $this->hasMany(ReportFoto::class, 'foto_id', 'foto_id');
    }
}
