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
                'nim' => '2201102008',
                'nama' => 'Abdul Rahman Faiz',
                'password' => Hash::make('2201102008'),
            ],
            [
                'nim' => '2201102010',
                'nama' => 'Muhammad Iqbal',
                'password' => Hash::make('2201102010'),
            ],
            [
                'nim' => '2201102011',
                'nama' => 'Muhammad Zakhi',
                'password' => Hash::make('2201102011'),
            ],
            [
                'nim' => '2201102012',
                'nama' => 'Muhammad Zaki',
                'password' => Hash::make('2201102012'),
            ],
            [
                'nim' => '2201102013',
                'nama' => 'Raditya Rahmaputra',
                'password' => Hash::make('2201102013'),
            ],
            [
                'nim' => '2201102014',
                'nama' => 'Rafi Jumaidil Afif',
                'password' => Hash::make('2201102014'),
            ],
            [
                'nim' => '2201102016',
                'nama' => 'Restu Nugraha',
                'password' => Hash::make('2201102016'),
            ],
            [
                'nim' => '2201102017',
                'nama' => 'Ronald Ananda Putra',
                'password' => Hash::make('2201102017'),
            ],
            [
                'nim' => '2201102018',
                'nama' => 'Tengku Wildhan Alhakim',
                'password' => Hash::make('2201102018'),
            ],
            [
                'nim' => '2201102019',
                'nama' => 'Yopi Mahardi',
                'password' => Hash::make('2201102019'),
            ],
            [
                'nim' => '2201102021',
                'nama' => 'Dadang Julianto',
                'password' => Hash::make('2201102021'),
            ],
            [
                'nim' => '2201102023',
                'nama' => 'Fadly Nugraha',
                'password' => Hash::make('2201102023'),
            ],
            [
                'nim' => '2201102025',
                'nama' => 'Fauzan Alan Kurniawan',
                'password' => Hash::make('2201102025'),
            ],
            [
                'nim' => '2201102026',
                'nama' => 'Jodi Adytia',
                'password' => Hash::make('2201102026'),
            ],
            [
                'nim' => '2201102027',
                'nama' => 'M.azziatul Fiqri',
                'password' => Hash::make('2201102027'),
            ],
            [
                'nim' => '2201102028',
                'nama' => 'Mufiq Arfan',
                'password' => Hash::make('2201102028'),
            ],
            [
                'nim' => '2201102031',
                'nama' => 'Muhammad Farid Alfarizi',
                'password' => Hash::make('2201102031'),
            ],
            [
                'nim' => '2201102033',
                'nama' => 'Rohimul Mustakim',
                'password' => Hash::make('2201102033'),
            ],
            [
                'nim' => '2201102034',
                'nama' => 'Taufiiqul Hakim P.irawan',
                'password' => Hash::make('2201102034'),
            ],
            [
                'nim' => '2201102037',
                'nama' => 'Rahmad Andika',
                'password' => Hash::make('2201102037'),
            ],
            [
                'nim' => '2201104002',
                'nama' => 'Ahmad Alim Aditya',
                'password' => Hash::make('2201104002'),
            ],
            [
                'nim' => '2201104003',
                'nama' => 'Alfin Febriansyah',
                'password' => Hash::make('2201104003'),
            ],
            [
                'nim' => '2201104004',
                'nama' => 'Dava Muhaimin',
                'password' => Hash::make('2201104004'),
            ],
            [
                'nim' => '2201104005',
                'nama' => 'Dava Razif',
                'password' => Hash::make('2201104005'),
            ],
            [
                'nim' => '2201104015',
                'nama' => 'Fadhil Ramadhan',
                'password' => Hash::make('2201104015'),
            ],
            [
                'nim' => '2201104017',
                'nama' => 'Adam Febriyand Putra',
                'password' => Hash::make('2201104017'),
            ],
            [
                'nim' => '2201104018',
                'nama' => 'Aditya Darmansa',
                'password' => Hash::make('2201104018'),
            ],
        ];

        foreach ($records as $data) {
            Mahasiswa::updateOrCreate(
                ['nim' => $data['nim']],
                $data
            );
        }

        $this->command->info('Seeder mahasiswa berhasil dijalankan!');
        $this->command->info('Total mahasiswa: ' . count($records));
    }
}