<!DOCTYPE html>
<html lang="en">

@include('layouts.guest.head')

    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">TENTANG KAMI</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Tentang Kami</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-fluid pt-6 pb-6">
        <div class="container">
            <div class="row g-5 align-items-center">

                    {{-- Topbar + Navbar partials --}}
    @include('layouts.guest.topbar')
    @include('layouts.guest.navbar')

                {{-- Bagian Kiri: Gambar --}}
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        {{-- Ganti dengan gambar yang mendukung tujuan website (misalnya ilustrasi digital map) --}}
                                                <img class="img-fluid w-100 rounded" src="{{ asset('assets-guest/img/digital_map_placeholder.jpg') }}" alt="Ilustrasi Administrasi Tanah Digital">
                    </div>
                </div>

                {{-- Bagian Kanan: Konten Santai Gen Z --}}
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-6 text-uppercase mb-4">🚀 Tentang Kita: PERTANAHAN, *Your Digital Land Admin*</h1>

                    <p class="mb-4">
                        Halo! Kenalin, kita dari tim **PERTANAHAN**, dan jujur aja, ngurusin data tanah itu ribet banget, kan? Nah, di sinilah kita hadir! **Tujuan utama kita cuma satu: bikin administrasi persil (alias bidang tanah) jadi *sat-set-sat-set* dan enggak bikin pusing.** Kita sadar kalau data yang akurat itu wajib banget, makanya kita bikin sistem ini biar semua data tanah, dokumen, peta, sampai urusan sengketa bisa ngumpul di satu tempat yang aman dan gampang diakses. Intinya, kita mau bikin segalanya *clear*, transparan, dan pastinya, enggak ada lagi drama data yang hilang atau dobel. **Biar pelayanan pertanahan di sini naik level!**
                    </p>

                    <p class="mb-4">
                        Terus, apa aja sih yang bisa kita *handle* di sini? Bayangin aja, ini kayak **pusat kendali digital** buat semua urusan tanah kamu. Mulai dari **Data Persil** itu sendiri (koordinat, luas, siapa pemiliknya, dan alamat lengkapnya), semua kita catat rapi. Enggak cuma itu, kita juga *backup* semua **Dokumen Persil** penting kamu dalam bentuk digital—jadi enggak perlu lagi takut kertasnya dimakan rayap. Mau cek lokasi tanah? Ada **Peta Persil** lengkap dengan data spasialnya. Bahkan, kalau ada masalah atau **Sengketa**, kita punya modul khusus buat rekam semua kronologinya dari awal sampai selesai. Semua data warga dan jenis penggunaan tanah juga kita kategorikan, jadi kalau mau cek statistik atau perencanaan, tinggal klik.
                    </p>

                    <p class="mb-4">
                        Intinya, alur di PERTANAHAN ini *simple* banget, kayak pakai aplikasi media sosial. Begitu kamu **Login** (sebagai warga atau admin), kamu bisa langsung **Buat (Create)** data persil baru, **Baca (Read)** semua detail dan riwayatnya, dan kalau ada perubahan atau update dokumen, tinggal **Ubah (Update)** data yang sudah ada. Jadi, kamu enggak perlu khawatir data lama enggak terurus. Semuanya terintegrasi dan siap *support* kamu untuk administrasi yang lebih cepat dan pastinya, lebih *reliable*. **Yuk, *upgrade* cara kita ngurusin tanah!**
                    </p>

                    {{-- Tambahkan link kembali ke halaman tertentu jika relevan --}}
                    {{-- <a href="{{ route('auth.index') }}" class="btn btn-primary py-3 px-5">Mulai Sekarang</a> --}}
                </div>
            </div>
        </div>
    </div>
    @endsection

            {{-- Footer partial --}}
    @include('layouts.guest.footer')

    <!-- Appoinment End -->
    @include('layouts.guest.scripts')
</body>
