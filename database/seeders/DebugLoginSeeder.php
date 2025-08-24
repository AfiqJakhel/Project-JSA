<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;

class DebugLoginSeeder extends Seeder
{
    public function run()
    {
        $identifier = 'afiqjakhel26@gmail.com';
        $password = 'password123';
        
        echo "=== DEBUGGING LOGIN LOGIC ===\n";
        echo "Identifier: {$identifier}\n";
        echo "Password: {$password}\n\n";
        
        // Step 1: Check if identifier is email
        $isEmail = filter_var($identifier, FILTER_VALIDATE_EMAIL);
        echo "Step 1 - Is email: " . ($isEmail ? 'YES' : 'NO') . "\n";
        
        // Step 2: Try to find dosen user
        echo "\nStep 2 - Looking for dosen user:\n";
        $dosen = User::where('email', $identifier)->where('role', 'dosen')->first();
        if ($dosen) {
            echo "✅ Dosen found: {$dosen->name}\n";
            echo "   Role: {$dosen->role}\n";
            echo "   Password hash: " . substr($dosen->password, 0, 20) . "...\n";
            
            // Step 3: Check password
            echo "\nStep 3 - Checking password:\n";
            $passwordValid = Hash::check($password, $dosen->password);
            echo "Password valid: " . ($passwordValid ? 'YES' : 'NO') . "\n";
            
            if ($passwordValid) {
                echo "✅ LOGIN SUCCESS - Should redirect to /dosen/dashboard\n";
            } else {
                echo "❌ LOGIN FAILED - Password incorrect\n";
            }
        } else {
            echo "❌ Dosen not found!\n";
            
            // Check if user exists but wrong role
            $user = User::where('email', $identifier)->first();
            if ($user) {
                echo "⚠️  User exists but wrong role: {$user->role}\n";
            }
        }
        
        // Step 4: Check mahasiswa (should not match)
        echo "\nStep 4 - Checking mahasiswa:\n";
        $mahasiswa = Mahasiswa::where('nim', $identifier)->first();
        if ($mahasiswa) {
            echo "⚠️  Mahasiswa found with NIM: {$mahasiswa->nim}\n";
        } else {
            echo "✅ No mahasiswa found (expected)\n";
        }
        
        echo "\n=== END DEBUG ===\n";
    }
}
