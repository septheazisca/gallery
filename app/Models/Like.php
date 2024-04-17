<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'like_foto';
    protected $primaryKey = 'like_id';
    protected $guarded = [];

    // Relasi ke model User (many-to-one)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Foto (many-to-one)
    public function foto()
    {
        return $this->belongsTo(foto::class);
    }
}
