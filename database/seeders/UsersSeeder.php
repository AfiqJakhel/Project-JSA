<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data yang sudah ada (opsional)
        User::truncate();

        // Buat beberapa user untuk testing
        $users = [
            [
                'name' => 'Admin Sistem',
                'email' => 'admin@pnpadang.ac.id',
                'role' => 'admin',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Dosen Test 1',
                'email' => 'dosen1@pnpadang.ac.id',
                'role' => 'mahasiswa', // Akan diubah menjadi dosen saat register
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Dosen Test 2',
                'email' => 'dosen2@pnpadang.ac.id',
                'role' => 'mahasiswa', // Akan diubah menjadi dosen saat register
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Dosen Test 3',
                'email' => 'dosen3@pnpadang.ac.id',
                'role' => 'mahasiswa', // Akan diubah menjadi dosen saat register
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Mahasiswa Test',
                'email' => 'mahasiswa@pnpadang.ac.id',
                'role' => 'mahasiswa',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Muhammad Afiq Jakhel',
                'email' => 'afiqjakhel26@gmail.com',
                'role' => 'dosen',
                'password' => null, // Password NULL untuk testing register
                'email_verified_at' => null,
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        $this->command->info('Users seeded successfully!');
        $this->command->info('Email yang bisa digunakan untuk register dosen:');
        $this->command->info('- afiqjakhel26@gmail.com (password NULL)');
        $this->command->info('- dosen1@pnpadang.ac.id');
        $this->command->info('- dosen2@pnpadang.ac.id');
        $this->command->info('- dosen3@pnpadang.ac.id');
    }
}
