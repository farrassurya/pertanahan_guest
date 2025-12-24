<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DokumenPersil;
use App\Models\Persil;
use Faker\Factory as Faker;

class CreateDokumenPersilDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua persil yang ada
        $persilIds = Persil::pluck('persil_id')->toArray();

        if (empty($persilIds)) {
            $this->command->error('Tidak ada data persil! Jalankan seeder persil terlebih dahulu.');
            return;
        }

        // Jenis dokumen yang umum untuk pertanahan
        $jenisDokumen = [
            'Sertifikat Hak Milik (SHM)',
            'Sertifikat Hak Guna Bangunan (SHGB)',
            'Sertifikat Hak Pakai (SHP)',
            'SPPT PBB',
            'Akta Jual Beli (AJB)',
            'Akta Hibah',
            'Akta Waris',
            'Surat Keterangan Tanah',
            'IMB (Izin Mendirikan Bangunan)',
            'Girik/Letter C',
            'Petok D',
            'Surat Ukur',
            'Gambar Situasi',
            'SKGR (Surat Keterangan Ganti Rugi)',
        ];

        $this->command->info('Membuat 100 data dokumen persil dummy...');

        for ($i = 1; $i <= 100; $i++) {
            // Pilih persil secara random
            $persilId = $faker->randomElement($persilIds);

            // Pilih jenis dokumen secara random
            $jenis = $faker->randomElement($jenisDokumen);

            // Generate nomor dokumen
            $tahun = $faker->numberBetween(2015, 2025);
            $nomor = sprintf('%04d/%s/%s/%d',
                $faker->numberBetween(1, 9999),
                $faker->randomElement(['SHM', 'SHGB', 'AJB', 'PBB', 'IMB']),
                $faker->randomElement(['KEL', 'KEC', 'BPN']),
                $tahun
            );

            // Keterangan random (50% ada keterangan)
            $keterangan = $faker->boolean(50) ? $faker->sentence($faker->numberBetween(10, 30)) : null;

            DokumenPersil::create([
                'persil_id' => $persilId,
                'jenis_dokumen' => $jenis,
                'nomor' => $nomor,
                'keterangan' => $keterangan,
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);

            if ($i % 10 == 0) {
                $this->command->info("Progress: {$i}/100 dokumen persil telah dibuat.");
            }
        }

        $this->command->info('✓ Berhasil membuat 100 data dokumen persil dummy!');
    }
}
