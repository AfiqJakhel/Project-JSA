<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestPasswordSeeder extends Seeder
{
    public function run()
    {
        $email = 'afiqjakhel26@gmail.com';
        $testPassword = 'password123';
        
        $user = User::where('email', $email)->first();
        
        if ($user) {
            echo "=== TESTING PASSWORD ===\n";
            echo "Email: {$email}\n";
            echo "Role: {$user->role}\n";
            echo "Password hash: " . substr($user->password, 0, 20) . "...\n";
            
            $isValid = Hash::check($testPassword, $user->password);
            echo "Password '{$testPassword}' valid: " . ($isValid ? 'YES' : 'NO') . "\n";
            
            if (!$isValid) {
                echo "\n=== RESETTING PASSWORD ===\n";
                $user->update([
                    'password' => Hash::make($testPassword)
                ]);
                echo "✅ Password berhasil direset!\n";
                
                // Test again
                $isValidAfter = Hash::check($testPassword, $user->fresh()->password);
                echo "Password '{$testPassword}' valid after reset: " . ($isValidAfter ? 'YES' : 'NO') . "\n";
            }
        } else {
            echo "❌ User tidak ditemukan!\n";
        }
    }
}
