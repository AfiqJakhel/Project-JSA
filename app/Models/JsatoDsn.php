<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JsatoDsn extends Model
{
    use HasFactory;

    protected $table = 'jsatodsn';

    protected $fillable = [
        'id_jsa',
        'id_dsn',
        'catatan_dsn',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dsn');
    }

    public function jsa()
    {
        return $this->belongsTo(Jsa::class, 'id_jsa');
    }
}
