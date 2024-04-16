<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_album',
        'deskripsi',
        'tanggal_dibuat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
