<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'jsa_id',
        'area_inspeksi',
        'item_inspeksi',
        'standar_kebersihan',
        'hasil_pemeriksaan',
        'status',
        'ok_ng',
        'tindakan_korektif',
        'tanggal_selesai',
    ];

    protected $casts = [
        'tanggal_selesai' => 'date',
    ];

    // Relasi ke JSA
    public function jsa()
    {
        return $this->belongsTo(Jsa::class, 'jsa_id');
    }
}
