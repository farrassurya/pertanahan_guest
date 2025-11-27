<?php

namespace Database\Seeders;

use App\Models\Persil;
use App\Models\Warga;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CreatePersilDummy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Membuat data dummy persil menggunakan Faker
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Gunakan locale Indonesia

        // Ambil semua warga_id yang tersedia untuk relasi
        $wargaIds = Warga::pluck('warga_id')->toArray();

        // Pastikan ada data warga dulu
        if (empty($wargaIds)) {
            $this->command->error('❌ Tidak ada data warga! Jalankan CreateWargaDummy terlebih dahulu.');
            return;
        }

        // Cek apakah sudah ada data dummy persil (dengan kode PRS-)
        // $existingDummy = Persil::where('kode_persil', 'LIKE', 'PRS-%')->count();
        // if ($existingDummy > 0) {
        //     $this->command->warn("⚠️  Sudah ada {$existingDummy} data persil dummy! Skip seeding.");
        //     $this->command->info('💡 Jika ingin reset, hapus dulu data persil dummy dengan:');
        //     $this->command->info('   php artisan tinker --execute="\\App\\Models\\Persil::where(\'kode_persil\', \'LIKE\', \'PRS-%\')->delete();"');
        //     return;
        // }

        // Generate 50 data persil dummy
        foreach (range(1, 50) as $index) {
            Persil::create([
                'kode_persil'       => $faker->unique()->numerify('PRS-####-####'), // Format: PRS-1234-5678
                'pemilik_warga_id'  => $faker->randomElement($wargaIds), // Pilih random dari warga yang ada
                'luas_m2'           => $faker->randomFloat(2, 50, 1000), // Luas antara 50-1000 m² dengan 2 desimal
                'penggunaan'        => $faker->randomElement([
                    'Rumah Tinggal',
                    'Pertanian',
                    'Perkebunan',
                    'Peternakan',
                    'Toko/Warung',
                    'Gudang',
                    'Kantor',
                    'Tanah Kosong',
                    'Sawah',
                    'Kebun'
                ]),
                'alamat_lahan'      => $faker->address(), // Alamat lengkap
                'rt'                => $faker->numberBetween(1, 20), // RT 1-20
                'rw'                => $faker->numberBetween(1, 10), // RW 1-10
            ]);
        }

        $this->command->info('✅ Berhasil membuat 50 data persil dummy!');
    }
}
