<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SengketaPersil;
use App\Models\Persil;

class CreateSengketaPersilDummy extends Seeder
{
    public function run(): void
    {
        $persils = Persil::all();
        if ($persils->isEmpty()) {
            $this->command->error('No persils found. Please seed persil data first.');
            return;
        }

        $statusOptions = ['Proses', 'Mediasi', 'Pengadilan', 'Selesai'];

        $pihak1Names = [
            'Ahmad Sugiarto', 'Budi Santoso', 'Chandra Wijaya', 'Deni Firmansyah', 'Eko Prasetyo',
            'Fajar Nugroho', 'Gunawan Setiawan', 'Hendra Kusuma', 'Irwan Budiman', 'Joko Widodo',
            'Kusno Wibowo', 'Lukman Hakim', 'Mochammad Ridwan', 'Nanang Suryadi', 'Oki Setiono',
            'Pandu Pratama', 'Qomar Effendi', 'Rizky Firmansyah', 'Sutrisno Hadi', 'Teguh Santosa',
        ];

        $pihak2Names = [
            'Andi Wijayanto', 'Bambang Suharto', 'Cecep Rahman', 'Dimas Anggara', 'Edi Gunawan',
            'Fery Susanto', 'Gatot Subroto', 'Herman Syafei', 'Indra Lesmana', 'Januar Harianto',
            'Kurniawan Dwi', 'Lutfi Hakim', 'Mulyadi Pranoto', 'Nanda Firdaus', 'Oka Mahendra',
            'Panji Kusuma', 'Qowim Hilmi', 'Rudi Hermawan', 'Surya Dinata', 'Taufik Rahman',
        ];

        $kronologiTemplates = [
            'Sengketa terjadi karena batas lahan yang tidak jelas antara kedua pihak. Pihak 1 mengklaim bahwa lahan tersebut adalah miliknya berdasarkan bukti sertifikat, namun Pihak 2 juga memiliki dokumen yang mengklaim kepemilikan yang sama.',
            'Perselisihan dimulai ketika Pihak 1 membangun pagar di lahan yang diklaim oleh Pihak 2. Pihak 2 melaporkan ke RT/RW setempat namun tidak ada penyelesaian yang memuaskan.',
            'Konflik bermula dari warisan tanah yang tidak dibagi dengan adil. Pihak 1 merasa haknya tidak dipenuhi dan menuntut pembagian ulang, sementara Pihak 2 menolak karena merasa pembagian sudah sesuai.',
            'Sengketa timbul akibat jual beli lahan yang tidak sah. Pihak 1 mengaku sudah membeli lahan tersebut, namun Pihak 2 mengatakan transaksi tidak pernah terjadi dan tidak ada bukti yang sah.',
            'Permasalahan muncul karena penggunaan lahan yang berbeda dari perjanjian awal. Pihak 1 menggunakan lahan untuk tujuan komersial, sedangkan Pihak 2 keberatan karena perjanjian awal adalah untuk penggunaan pribadi.',
            'Sengketa terjadi karena adanya klaim ganda atas satu bidang tanah. Kedua pihak sama-sama memiliki dokumen kepemilikan yang berbeda namun mengklaim lahan yang sama.',
            'Konflik bermula saat Pihak 1 menebang pohon di lahan yang diklaim sebagai milik bersama. Pihak 2 menolak dan menuntut ganti rugi atas kerugian yang ditimbulkan.',
            'Perselisihan terjadi karena akses jalan menuju lahan Pihak 1 melewati lahan Pihak 2. Pihak 2 menutup akses tersebut, sementara Pihak 1 merasa berhak atas hak lewat.',
        ];

        $penyelesaianTemplates = [
            'Telah dilakukan mediasi dengan hasil kesepakatan pembagian lahan secara adil. Kedua pihak sepakat untuk membuat ulang batas lahan dengan disaksikan oleh aparat desa.',
            'Permasalahan diselesaikan melalui pengadilan dengan putusan yang memenangkan Pihak 1. Pihak 2 diwajibkan untuk mengosongkan lahan dalam waktu 30 hari.',
            'Dicapai kesepakatan damai dengan Pihak 1 membayar kompensasi kepada Pihak 2 sebesar nilai yang disepakati. Kedua pihak setuju untuk mengakhiri sengketa.',
            'Setelah proses mediasi panjang, kedua pihak sepakat untuk menjual lahan tersebut dan membagi hasilnya sesuai proporsi kepemilikan yang disepakati.',
            'Pengadilan memutuskan untuk mengembalikan status quo dan kedua pihak diminta untuk menyelesaikan secara kekeluargaan dengan bantuan mediator dari desa.',
        ];

        $count = 0;
        foreach ($persils->random(min(50, $persils->count())) as $persil) {
            $status = $statusOptions[array_rand($statusOptions)];

            SengketaPersil::create([
                'persil_id' => $persil->persil_id,
                'pihak_1' => $pihak1Names[array_rand($pihak1Names)],
                'pihak_2' => $pihak2Names[array_rand($pihak2Names)],
                'kronologi' => $kronologiTemplates[array_rand($kronologiTemplates)],
                'status' => $status,
                'penyelesaian' => $status === 'Selesai' ? $penyelesaianTemplates[array_rand($penyelesaianTemplates)] : null,
                'created_at' => now()->subDays(rand(1, 365)),
                'updated_at' => now()->subDays(rand(0, 30)),
            ]);

            $count++;
        }

        $this->command->info("Created {$count} sengketa persil records.");
    }
}
