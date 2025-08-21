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
        // Check if all dosen already exists
        $existingDosen = DB::table('dosens')->pluck('nip')->toArray();
        
        $dosenData = [
            [
                'nip' => '123456789',
                'nama' => 'Dr. Dosen Satu',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => '987654321',
                'nama' => 'Dr. Dosen Dua',
                'password' => Hash::make('987654321'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => '111222333',
                'nama' => 'Prof. Dosen Tiga',
                'password' => Hash::make('111222333'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => '444555666',
                'nama' => 'Dr. Dosen Empat',
                'password' => Hash::make('444555666'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => '777888999',
                'nama' => 'Prof. Dosen Lima',
                'password' => Hash::make('777888999'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $addedCount = 0;
        foreach ($dosenData as $dosen) {
            if (!in_array($dosen['nip'], $existingDosen)) {
                DB::table('dosens')->insert($dosen);
                $addedCount++;
                $this->command->info("Added dosen: {$dosen['nama']} ({$dosen['nip']})");
            }
        }

        if ($addedCount > 0) {
            $this->command->info("Added {$addedCount} new dosen successfully!");
        } else {
            $this->command->info("All dosen already exist. No new data added.");
        }
    }
}
