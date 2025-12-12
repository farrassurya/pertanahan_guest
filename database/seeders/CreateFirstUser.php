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
        // Buat user operator pertama (full CRUD access)
        User::create([
            'name'     => 'Operator Pertanahan',
            'email'    => 'operator@pertanahan.com',
            'password' => Hash::make('operator123'), // Password: operator123
            'role'     => 'operator', // Role operator
            'email_verified_at' => now(), // Langsung verified
        ]);

        // Buat user warga contoh (only view & input access)
        User::create([
            'name'     => 'Warga Contoh',
            'email'    => 'warga@pertanahan.com',
            'password' => Hash::make('warga123'), // Password: warga123
            'role'     => 'warga', // Role warga
            'email_verified_at' => now(), // Langsung verified
        ]);

        $this->command->info('✅ User berhasil dibuat!');
        $this->command->info('');
        $this->command->info('👤 OPERATOR (Full CRUD Access):');
        $this->command->info('   📧 Email: operator@pertanahan.com');
        $this->command->info('   🔑 Password: operator123');
        $this->command->info('');
        $this->command->info('👤 WARGA (View & Input Only):');
        $this->command->info('   📧 Email: warga@pertanahan.com');
        $this->command->info('   🔑 Password: warga123');
        $this->command->warn('⚠️  Jangan lupa ganti password setelah login pertama kali!');
    }
}
