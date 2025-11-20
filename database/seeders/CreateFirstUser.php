<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Membuat user pertama untuk login ke aplikasi
     */
    public function run(): void
    {
        // Buat user admin pertama
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@pertanahan.com',
            'password' => Hash::make('admin123'), // Password: admin123
            'email_verified_at' => now(), // Langsung verified
        ]);

        $this->command->info('✅ User pertama berhasil dibuat!');
        $this->command->info('📧 Email: admin@pertanahan.com');
        $this->command->info('🔑 Password: admin123');
        $this->command->warn('⚠️  Jangan lupa ganti password setelah login pertama kali!');
    }
}
