<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JsatoMhs extends Model
{
    use HasFactory;

    protected $table = 'jsatomhs';

    protected $fillable = [
        'id_mhs',
        'id_jsa',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }

    public function jsa()
    {
        return $this->belongsTo(Jsa::class, 'id_jsa');
    }
}
