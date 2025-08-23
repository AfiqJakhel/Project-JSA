<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mataKuliahData = [
            // Kelas 1 Semester Ganjil (1)
            ['semester' => 1, 'kelas' => 1, 'nama_matakuliah' => 'Fundamental Listrik dan Elektronik'],
            ['semester' => 1, 'kelas' => 1, 'nama_matakuliah' => 'Fundamental Sistem Engine'],
            
            // Kelas 1 Semester Genap (2)
            ['semester' => 2, 'kelas' => 1, 'nama_matakuliah' => 'Teknik Dasar Operasi Mesin (TDOM)'],
            ['semester' => 2, 'kelas' => 1, 'nama_matakuliah' => 'Technical Core Skill 2'],
            ['semester' => 2, 'kelas' => 1, 'nama_matakuliah' => 'Fundamental Sistem Hidrolik'],
            ['semester' => 2, 'kelas' => 1, 'nama_matakuliah' => 'Fundamental Sistem Power Train'],
            ['semester' => 2, 'kelas' => 1, 'nama_matakuliah' => 'Preventive Maintenance'],
            
            // Kelas 2 Semester Ganjil (3)
            ['semester' => 3, 'kelas' => 2, 'nama_matakuliah' => 'Intermediate Power Train System'],
            ['semester' => 3, 'kelas' => 2, 'nama_matakuliah' => 'Intermediate Engine System'],
            ['semester' => 3, 'kelas' => 2, 'nama_matakuliah' => 'Intermediate Hydraulic System'],
            ['semester' => 3, 'kelas' => 2, 'nama_matakuliah' => 'Electric dan Electronic System'],
            ['semester' => 3, 'kelas' => 2, 'nama_matakuliah' => 'Basic Machine Operating Technique'],
            
            // Kelas 2 Semester Genap (4)
            ['semester' => 4, 'kelas' => 2, 'nama_matakuliah' => 'Sistem Power Train Lanjut'],
            ['semester' => 4, 'kelas' => 2, 'nama_matakuliah' => 'Software Alat Berat'],
            ['semester' => 4, 'kelas' => 2, 'nama_matakuliah' => 'Engine Rebuilt'],
            ['semester' => 4, 'kelas' => 2, 'nama_matakuliah' => 'Troubleshooting Lanjut'],
            
            // Kelas 3 Semester Genap (6) - Kelas 3A tidak ada mata kuliah karena magang
            ['semester' => 6, 'kelas' => 3, 'nama_matakuliah' => 'Air Conditioning (AC)'],
        ];

        foreach ($mataKuliahData as $data) {
            MataKuliah::create($data);
        }
    }
}
