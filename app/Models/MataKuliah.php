<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    protected $fillable = [
        'semester',
        'kelas',
        'nama_matakuliah'
    ];

    /**
     * Scope untuk mengambil mata kuliah berdasarkan semester dan kelas
     */
    public function scopeBySemesterAndKelas($query, $semester, $kelas)
    {
        return $query->where('semester', $semester)
                    ->where('kelas', $kelas)
                    ->orderBy('nama_matakuliah');
    }

    /**
     * Relasi ke JSA (jika diperlukan di masa depan)
     */
    public function jsas()
    {
        return $this->hasMany(Jsa::class, 'matakuliah', 'nama_matakuliah');
    }
}
