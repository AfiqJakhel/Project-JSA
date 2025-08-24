<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Mail\DosenWelcomeMail;
use Illuminate\Support\Facades\Mail;

class EmailTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Test email sending
        $user = User::where('email', 'afiqjakhel26@gmail.com')->first();
        
        if ($user) {
            $testPassword = 'test123456';
            
            try {
                Mail::to($user->email)->send(new DosenWelcomeMail($user, $testPassword));
                $this->command->info('✅ Email test berhasil dikirim ke: ' . $user->email);
            } catch (\Exception $e) {
                $this->command->error('❌ Email test gagal: ' . $e->getMessage());
                $this->command->info('💡 Pastikan konfigurasi email di .env sudah benar:');
                $this->command->info('   MAIL_MAILER=smtp');
                $this->command->info('   MAIL_HOST=smtp.gmail.com');
                $this->command->info('   MAIL_PORT=587');
                $this->command->info('   MAIL_USERNAME=sisteminformasiunand23@gmail.com');
                $this->command->info('   MAIL_PASSWORD=dplf ffdi ecup tgjl');
                $this->command->info('   MAIL_ENCRYPTION=tls');
                $this->command->info('   MAIL_FROM_ADDRESS=sisteminformasiunand23@gmail.com');
                $this->command->info('   MAIL_FROM_NAME="Sistem JSA"');
            }
        } else {
            $this->command->error('❌ User afiqjakhel26@gmail.com tidak ditemukan');
        }
    }
}
