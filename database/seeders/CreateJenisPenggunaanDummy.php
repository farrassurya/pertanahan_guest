<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CreateJenisPenggunaanDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Data jenis penggunaan dengan keterangan yang masuk akal
        $dataJenis = [
            ['nama' => 'Perumahan', 'ket' => 'Lahan untuk bangunan tempat tinggal dan hunian'],
            ['nama' => 'Pertanian', 'ket' => 'Lahan untuk kegiatan budidaya tanaman pangan'],
            ['nama' => 'Perkebunan', 'ket' => 'Lahan untuk tanaman keras seperti kelapa sawit, karet, dll'],
            ['nama' => 'Peternakan', 'ket' => 'Lahan untuk pemeliharaan hewan ternak'],
            ['nama' => 'Industri', 'ket' => 'Lahan untuk kegiatan industri dan manufaktur'],
            ['nama' => 'Perdagangan', 'ket' => 'Lahan untuk kegiatan jual beli dan komersial'],
            ['nama' => 'Pendidikan', 'ket' => 'Lahan untuk bangunan sekolah dan institusi pendidikan'],
            ['nama' => 'Kesehatan', 'ket' => 'Lahan untuk rumah sakit, puskesmas, dan fasilitas kesehatan'],
            ['nama' => 'Ibadah', 'ket' => 'Lahan untuk tempat ibadah seperti masjid, gereja, dll'],
            ['nama' => 'Rekreasi', 'ket' => 'Lahan untuk taman, tempat wisata, dan fasilitas rekreasi'],
            ['nama' => 'Perkantoran', 'ket' => 'Lahan untuk gedung kantor dan administrasi'],
            ['nama' => 'Transportasi', 'ket' => 'Lahan untuk terminal, stasiun, dan infrastruktur transportasi'],
            ['nama' => 'Pergudangan', 'ket' => 'Lahan untuk gudang penyimpanan barang dan logistik'],
            ['nama' => 'Hotel', 'ket' => 'Lahan untuk bangunan hotel dan penginapan'],
            ['nama' => 'Restoran', 'ket' => 'Lahan untuk usaha kuliner dan tempat makan'],
            ['nama' => 'Olahraga', 'ket' => 'Lahan untuk lapangan olahraga dan pusat kebugaran'],
            ['nama' => 'Seni & Budaya', 'ket' => 'Lahan untuk museum, galeri, dan pusat kebudayaan'],
            ['nama' => 'Penelitian', 'ket' => 'Lahan untuk laboratorium dan pusat penelitian'],
            ['nama' => 'Teknologi', 'ket' => 'Lahan untuk pusat teknologi dan inovasi'],
            ['nama' => 'Energi', 'ket' => 'Lahan untuk pembangkit listrik dan energi terbarukan'],
            ['nama' => 'Pertambangan', 'ket' => 'Lahan untuk kegiatan eksplorasi dan eksploitasi mineral'],
            ['nama' => 'Kehutanan', 'ket' => 'Lahan untuk konservasi hutan dan hasil hutan'],
            ['nama' => 'Perikanan', 'ket' => 'Lahan untuk budidaya ikan dan perikanan'],
            ['nama' => 'Pariwisata', 'ket' => 'Lahan untuk objek wisata dan destinasi pariwisata'],
            ['nama' => 'Telekomunikasi', 'ket' => 'Lahan untuk tower dan infrastruktur komunikasi'],
            ['nama' => 'Campuran', 'ket' => 'Lahan dengan kombinasi beberapa fungsi penggunaan'],
            ['nama' => 'Pasar', 'ket' => 'Lahan untuk pasar tradisional dan modern'],
            ['nama' => 'Bengkel', 'ket' => 'Lahan untuk bengkel dan jasa perbaikan kendaraan'],
            ['nama' => 'Salon', 'ket' => 'Lahan untuk salon kecantikan dan perawatan'],
            ['nama' => 'Toko', 'ket' => 'Lahan untuk toko retail dan minimarket'],
            ['nama' => 'Bank', 'ket' => 'Lahan untuk kantor bank dan lembaga keuangan'],
            ['nama' => 'Apotek', 'ket' => 'Lahan untuk apotek dan toko obat'],
            ['nama' => 'Klinik', 'ket' => 'Lahan untuk klinik dan praktek dokter'],
            ['nama' => 'Gym', 'ket' => 'Lahan untuk pusat kebugaran dan fitness center'],
            ['nama' => 'Kolam Renang', 'ket' => 'Lahan untuk kolam renang dan fasilitas air'],
            ['nama' => 'Laundry', 'ket' => 'Lahan untuk usaha jasa laundry dan cuci'],
            ['nama' => 'Fotokopi', 'ket' => 'Lahan untuk usaha fotokopi dan percetakan'],
            ['nama' => 'Warnet', 'ket' => 'Lahan untuk warung internet dan gaming center'],
            ['nama' => 'Kafe', 'ket' => 'Lahan untuk kafe dan coffee shop'],
            ['nama' => 'Warung', 'ket' => 'Lahan untuk warung makan dan kedai'],
            ['nama' => 'Kontraktor', 'ket' => 'Lahan untuk kantor kontraktor dan jasa konstruksi'],
            ['nama' => 'Studio', 'ket' => 'Lahan untuk studio foto, musik, atau seni'],
            ['nama' => 'Spa', 'ket' => 'Lahan untuk spa dan pusat relaksasi'],
            ['nama' => 'Pet Shop', 'ket' => 'Lahan untuk toko hewan peliharaan dan aksesoris'],
            ['nama' => 'Florist', 'ket' => 'Lahan untuk toko bunga dan dekorasi'],
            ['nama' => 'Bookstore', 'ket' => 'Lahan untuk toko buku dan alat tulis'],
            ['nama' => 'Showroom', 'ket' => 'Lahan untuk showroom kendaraan atau produk'],
            ['nama' => 'Workshop', 'ket' => 'Lahan untuk workshop dan pelatihan'],
            ['nama' => 'Coworking Space', 'ket' => 'Lahan untuk ruang kerja bersama dan kolaborasi'],
            ['nama' => 'Parkir', 'ket' => 'Lahan untuk area parkir kendaraan'],
        ];

        // Generate 50 data
        foreach (range(1, 50) as $index) {
            $data = $dataJenis[$index - 1];

            \App\Models\JenisPenggunaan::create([
                'nama_penggunaan' => $data['nama'],
                'keterangan' => $data['ket']
            ]);
        }

        $this->command->info('✅ Berhasil membuat 50 data jenis penggunaan dummy!');
    }
}

