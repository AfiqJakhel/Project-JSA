<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Seed the application's database with sample mahasiswa data.
     */
    public function run(): void
    {
        $records = [
            [
                'nim' => '2300001',
                'nama' => 'Budi Santoso',
                'password' => Hash::make('password'),
            ],
            [
                'nim' => '2300002',
                'nama' => 'Siti Aminah',
                'password' => Hash::make('password'),
            ],
            [
                'nim' => '2300003',
                'nama' => 'Andi Wijaya',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($records as $data) {
            Mahasiswa::updateOrCreate(
                ['nim' => $data['nim']],
                $data
            );
        }
    }
}