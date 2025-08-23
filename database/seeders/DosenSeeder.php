<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // matikan cek FK
        DB::table('dosens')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // aktifkan lagi cek FK
        // Ambil semua NIP yang sudah ada
        $existingDosen = DB::table('dosens')->pluck('nip')->toArray();

        // Data dosen baru
        $dosenData = [
            ['nip' => '19790124 200501 1 009', 'nama' => 'Andriyanto, ST.,MT'],
            ['nip' => '19960930 202103 2 000', 'nama' => 'Atikah Ardi, S.Si.,M.Si.'],
            ['nip' => '19850311 200812 1 005', 'nama' => 'Dian Wahyu, ST.,MT'],
            ['nip' => '19710902 199802 1 001', 'nama' => 'Hanif, ST.,MT'],
            ['nip' => '19811213 200501 1 001', 'nama' => 'Dr. Khairul Amri, S.Si.,M.Si'],
            ['nip' => '19861107 201903 1 006', 'nama' => 'Nofriyandi R, S.Pd.,M.T.'],
            ['nip' => '19621210 000000 1 001', 'nama' => 'Ir. Refnal Marzuki'],
            ['nip' => '19770117 200501 1 002', 'nama' => 'Rino Sukma, ST.,MT'],
            ['nip' => '19581227 198603 1 003', 'nama' => 'Dr. Ir. Drs. Rusmardi, MBA.,M.Pd'],
            ['nip' => '19650816 000000 1 001', 'nama' => 'Ir. Guswandri'],
            ['nip' => '19790117 000000 1 001', 'nama' => 'Rudy Chandra, ST., MT'],
            ['nip' => '19660801 201903 1 000', 'nama' => 'Hendra, A.Md.T'],
        ];

        $addedCount = 0;

        foreach ($dosenData as $dosen) {
            // Trim NIP dan nama untuk menghindari spasi tersembunyi
            $nip = trim($dosen['nip']);
            $nama = trim($dosen['nama']);

            if (!in_array($nip, $existingDosen)) {
                DB::table('dosens')->insert([
                    'nip' => $nip,
                    'nama' => $nama,
                    'password' => Hash::make($nip), // password sama dengan NIP
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $addedCount++;
                $this->command->info("Added dosen: {$nama} ({$nip})");
            }
        }

        if ($addedCount > 0) {
            $this->command->info("Added {$addedCount} new dosen successfully!");
        } else {
            $this->command->info("All dosen already exist. No new data added.");
        }
    }
}
