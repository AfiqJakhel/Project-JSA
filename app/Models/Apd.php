<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apd extends Model
{
    use HasFactory;

    protected $table = 'apd';

    protected $fillable = [
        'id_jsa',
        'id_mhs',
        'apd_shelmet',
        'apd_sgloves',
        'apd_shoes',
        'apd_sglasses',
        'apd_svest',
        'apd_earplug',
        'apd_fmask',
        'apd_respiratory'
    ];

    public function jsa()
    {
        return $this->belongsTo(Jsa::class, 'id_jsa');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }
}
