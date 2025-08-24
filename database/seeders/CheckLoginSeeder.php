<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;

class CheckLoginSeeder extends Seeder
{
    public function run()
    {
        echo "=== CHECKING USER DATA ===\n";
        
        // Check Users table
        echo "\n--- USERS TABLE ---\n";
        $users = User::all();
        foreach ($users as $user) {
            echo "ID: {$user->id} | Name: {$user->name} | Email: {$user->email} | Role: {$user->role} | Password: " . ($user->password ? 'SET' : 'NULL') . "\n";
        }
        
        // Check Mahasiswa table
        echo "\n--- MAHASISWA TABLE ---\n";
        $mahasiswas = Mahasiswa::all();
        foreach ($mahasiswas as $mhs) {
            echo "ID: {$mhs->id} | NIM: {$mhs->nim} | Name: {$mhs->nama} | Password: " . ($mhs->password ? 'SET' : 'NULL') . "\n";
        }
        
        // Test login for afiqjakhel26@gmail.com
        echo "\n--- TESTING LOGIN FOR afiqjakhel26@gmail.com ---\n";
        $testUser = User::where('email', 'afiqjakhel26@gmail.com')->first();
        if ($testUser) {
            echo "User found: {$testUser->name}\n";
            echo "Role: {$testUser->role}\n";
            echo "Password: " . ($testUser->password ? 'SET' : 'NULL') . "\n";
            
            if ($testUser->password) {
                // Test with a sample password
                $testPassword = 'test123';
                $isValid = Hash::check($testPassword, $testUser->password);
                echo "Test password 'test123' valid: " . ($isValid ? 'YES' : 'NO') . "\n";
            }
        } else {
            echo "User not found!\n";
        }
        
        echo "\n=== END CHECK ===\n";
    }
}
