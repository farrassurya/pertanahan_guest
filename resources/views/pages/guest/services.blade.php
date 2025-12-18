<!DOCTYPE html>
<html lang="en">

@include('layouts.guest.head')

<body>
    {{-- Topbar partial --}}
    @include('layouts.guest.topbar')

    {{-- Navbar partial --}}
    @include('layouts.guest.navbar')

    <!-- Janji temu -->
    <div class="container-fluid appoinment mt-0 mb-1 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container pt-5">
            <div class="row gy-5 gx-0">
                <div class="col-lg-5 col-md-12 pe-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 text-uppercase text-white mb-4">Pertanahan - guest (farrassurya)
                    </h1>
                    <p class="text-white mb-5 wow fadeIn" data-wow-delay="0.4s">Belum tau mau diisi apa hehe, nanti
                        dipikirin mau diisi deskripsi seperti apa, terimakasihh</p>
                    <div class="d-flex align-items-start wow fadeIn" data-wow-delay="0.5s">
                        <div class="btn-lg-square bg-white">
                            <i class="bi bi-geo-alt text-dark fs-3"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="text-white text-uppercase">Alamat Kampus</h6>
                            <span class="text-white">Jl. Umban Sari, No 1, Pekanbaru</span>
                        </div>
                    </div>
                    <hr class="bg-body">
                    <div class="d-flex align-items-start wow fadeIn" data-wow-delay="0.6s">
                        <div class="btn-lg-square bg-white">
                            <i class="bi bi-clock text-dark fs-3"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="text-white text-uppercase">Jam Kerja</h6>
                            <span class="text-white">Sen-Sab 06.00-17.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 mb-n5 wow fadeIn" data-wow-delay="0.7s">
                    <div class="bg-white p-5">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 id="jenis" class="text-uppercase mb-0">Jenis Penggunaan</h2>
                            <!-- Tombol Lihat Daftar -->
                            <a href="{{ route('pages.jenis-penggunaan.index') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-list me-1"></i> Lihat Daftar
                            </a>
                        </div>

                        <!-- Flash Messages -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('pages.jenis-penggunaan.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <input type="text"
                                            class="form-control border-0 bg-light @error('nama_penggunaan') is-invalid @enderror"
                                            id="nama_penggunaan" name="nama_penggunaan" placeholder="Your Name"
                                            value="{{ old('nama_penggunaan', $oldInput['nama_penggunaan'] ?? '') }}">
                                        <label for="nama_penggunaan">Nama Penggunaan</label>
                                        @error('nama_penggunaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0 bg-light @error('keterangan') is-invalid @enderror"
                                            placeholder="Leave a message here" id="keterangan" name="keterangan" style="height: 130px">{{ old('keterangan', $oldInput['keterangan'] ?? '') }}</textarea>
                                        <label for="keterangan">Keterangan</label>
                                        @error('keterangan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer partial --}}
    @include('layouts.guest.footer')

    <!-- Appoinment End -->
    @include('layouts.guest.scripts')
</body>
</html>
