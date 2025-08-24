<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordSeeder extends Seeder
{
    public function run()
    {
        $email = 'afiqjakhel26@gmail.com';
        $newPassword = 'password123'; // Password yang mudah diingat
        
        $user = User::where('email', $email)->first();
        
        if ($user) {
            $user->update([
                'password' => Hash::make($newPassword)
            ]);
            
            echo "✅ Password berhasil direset untuk: {$email}\n";
            echo "📧 Email: {$email}\n";
            echo "🔑 Password baru: {$newPassword}\n";
            echo "👤 Role: {$user->role}\n";
            echo "\n💡 Silakan login dengan:\n";
            echo "   Email: {$email}\n";
            echo "   Password: {$newPassword}\n";
        } else {
            echo "❌ User dengan email {$email} tidak ditemukan!\n";
        }
    }
}
