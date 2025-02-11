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
        return $this->belongsTo(Album::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
