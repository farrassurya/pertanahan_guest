<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CreateWargaDummy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Membuat data dummy warga menggunakan Faker
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Gunakan locale Indonesia

        // Generate 50 data warga dummy
        foreach (range(1, 50) as $index) {
            Warga::create([
                'no_ktp'        => $faker->unique()->numerify('################'), // 16 digit angka random
                'nama'          => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'agama'         => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'pekerjaan'     => $faker->randomElement([
                    'Pegawai Negeri Sipil',
                    'Pegawai Swasta',
                    'Wiraswasta',
                    'Guru',
                    'Dokter',
                    'Petani',
                    'Buruh',
                    'Pedagang',
                    'Pengusaha',
                    'Karyawan',
                    'Mahasiswa',
                    'Ibu Rumah Tangga'
                ]),
                'telp'          => $faker->numerify('08##########'), // Format: 08xxxxxxxxxx (12-13 digit)
                'email'         => $faker->unique()->safeEmail(),
            ]);
        }

        $this->command->info('✅ Berhasil membuat 50 data warga dummy!');
    }
}
