<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CreatePetaPersilDummy extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua persil_id yang ada
        $persilIds = DB::table('persil')->pluck('persil_id')->toArray();

        if (empty($persilIds)) {
            echo "❌ Tidak ada data persil. Jalankan seeder persil terlebih dahulu.\n";
            return;
        }

        echo "🗺️  Mulai membuat 100 data peta persil dummy...\n";

        // Koordinat area Indonesia (berbagai provinsi)
        $baseCoordinates = [
            // Jakarta
            [106.8456, -6.2088],
            // Bandung
            [107.6191, -6.9175],
            // Surabaya
            [112.7521, -7.2575],
            // Yogyakarta
            [110.3695, -7.7956],
            // Semarang
            [110.4203, -6.9932],
            // Medan
            [98.6722, 3.5952],
            // Makassar
            [119.4327, -5.1477],
            // Denpasar
            [115.2126, -8.6705],
            // Palembang
            [104.7458, -2.9761],
            // Balikpapan
            [116.8289, -1.2379],
        ];

        $created = 0;

        foreach ($persilIds as $index => $persilId) {
            if ($created >= 100) break;

            // Pilih base coordinate random
            $baseCoord = $baseCoordinates[array_rand($baseCoordinates)];
            $baseLng = $baseCoord[0];
            $baseLat = $baseCoord[1];

            // Generate polygon coordinates (4 titik membentuk segi empat)
            $offset = 0.002; // ~200 meter
            $randomOffsetLng = $faker->randomFloat(4, -0.01, 0.01);
            $randomOffsetLat = $faker->randomFloat(4, -0.01, 0.01);

            $lng = $baseLng + $randomOffsetLng;
            $lat = $baseLat + $randomOffsetLat;

            // Buat polygon segi empat
            $coordinates = [
                [
                    [$lng, $lat], // Point 1 (bottom-left)
                    [$lng + $offset, $lat], // Point 2 (bottom-right)
                    [$lng + $offset, $lat + $offset], // Point 3 (top-right)
                    [$lng, $lat + $offset], // Point 4 (top-left)
                    [$lng, $lat], // Close polygon (back to point 1)
                ]
            ];

            $geojson = json_encode([
                'type' => 'Polygon',
                'coordinates' => $coordinates
            ]);

            // Generate ukuran lahan
            $panjang = $faker->randomFloat(2, 10, 100); // 10-100 meter
            $lebar = $faker->randomFloat(2, 8, 80); // 8-80 meter

            // Tentukan timestamp acak dalam 2 tahun terakhir
            $createdAt = $faker->dateTimeBetween('-2 years', 'now');
            $updatedAt = $faker->dateTimeBetween($createdAt, 'now');

            DB::table('peta_persil')->insert([
                'persil_id' => $persilId,
                'geojson' => $geojson,
                'panjang_m' => $panjang,
                'lebar_m' => $lebar,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ]);

            $created++;

            // Progress indicator
            if ($created % 10 == 0) {
                echo "  ✓ {$created}/100 peta persil telah dibuat.\n";
            }
        }

        echo "✅ Berhasil membuat {$created} data peta persil dummy!\n";
        echo "📊 Total luas area: " . number_format($created * 50 * 40, 0) . " m² (estimasi)\n";
    }
}
