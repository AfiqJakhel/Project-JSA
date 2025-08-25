<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jsa extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas',
        'semester',
        'matakuliah',
        'no_jsa',
        'nama_pekerjaan',
        'lokasi_pekerjaan',
        'tanggal_pelaksanaan',
        'urutan_kerja',
        'potensi_bahaya',
        'upaya_pengendalian',
        'status',
    ];

    // Relasi ke Mahasiswa melalui pivot jsatomhs
    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'jsatomhs', 'id_jsa', 'id_mhs')
                    ->withTimestamps();
    }

    // Relasi ke Dosen melalui pivot jsatodsn
    public function dosens()
    {
        return $this->belongsToMany(Dosen::class, 'jsatodsn', 'id_jsa', 'id_dsn')
                    ->withPivot('catatan_dsn')
                    ->withTimestamps();
    }

    // Relasi ke APD
    public function apds()
    {
        return $this->hasMany(Apd::class, 'id_jsa');
    }

    // Relasi ke Work Steps
    public function workSteps()
    {
        return $this->hasMany(WorkStep::class, 'jsa_id')->orderBy('step_number');
    }

    // Relasi ke Inspections
    public function inspections()
    {
        return $this->hasMany(Inspection::class, 'jsa_id');
    }
}
