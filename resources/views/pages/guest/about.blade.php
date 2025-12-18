<!DOCTYPE html>
<html lang="en">

@include('layouts.guest.head')

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>

    {{-- Topbar + Navbar partials --}}
    @include('layouts.guest.topbar')
    @include('layouts.guest.navbar')

    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">TENTANG SAYA</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Tentang Saya</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-fluid pt-5 pb-5">
        <div class="container">
            <div class="row g-4 align-items-center">

                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid w-100 rounded shadow-sm" src="{{ asset('assets-guest/img/aboutPG.webp') }}" alt="Ilustrasi Administrasi Tanah Digital">
                    </div>
                </div>

                {{-- Right: Friendly content --}}
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-6 text-uppercase mb-4">PERTANAHAN — Guest</h1>

                    <p class="mb-4">
                        Halo! Kenalin, saya M.Farras Suryaputra (rass) dari kelompok 12 <strong>PERTANAHAN</strong>. Mengurus data tanah itu bisa ribet—jadi kami buat solusi digital yang menyederhanakan semua administrasi persil. Tujuan kami jelas: data yang terstruktur, aman, dan gampang diakses.
                    </p>

                    <p class="mb-4">
                        Di sini kamu bisa menyimpan <strong>data persil</strong> (koordinat, luas, pemilik), <strong>dokumen persil</strong> secara digital, melihat <strong>peta persil</strong> interaktif, dan merekam riwayat jika ada <strong>sengketa</strong>. Semua data tersusun rapi untuk keperluan statistik dan perencanaan.
                    </p>

                    <p class="mb-4">
                        Alurnya simpel: <em>Login &rarr; Create / Read / Update</em>. Sistem ini dibuat supaya administrasi lebih cepat, akurat, dan dapat dipercaya.
                    </p>

                    <a href="{{ route('pages.guest.home') }}" class="btn btn-primary py-2 px-4">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer partial --}}
    @include('layouts.guest.footer')

    {{-- Scripts --}}
    @include('layouts.guest.scripts')

</body>


</html>
