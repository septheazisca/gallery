<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriFoto extends Model
{
    use HasFactory;
    protected $table = 'kategori_foto';
    protected $primaryKey = 'kategori_id';
    protected $guarded = [];
}
