<!DOCTYPE html>
<html lang="en">

@include('layouts.guest.head')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>


    {{-- Login sukses--}}
    <div class="modal fade" id="loginSuccessModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login Berhasil</h5>
                </div>
                <div class="modal-body">
                    <p class="mb-0">{{ session('success') ?? 'Login Berhasil' }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Topbar + Navbar partials --}}
    @include('layouts.guest.topbar')
    @include('layouts.guest.navbar')

    <!-- Carousel Start -->
    {{-- <div class="container-fluid p-0 mb-6 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                    <img class="img-fluid" src="img/carousel-3.jpg" alt="Image">
                </button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <h1 class="display-1 text-uppercase text-white mb-4 animated zoomIn">Best Metalcraft Solutions
                        </h1>
                        <a href="#" class="btn btn-primary py-3 px-4">Explore More</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <h1 class="display-1 text-uppercase text-white mb-4 animated zoomIn">Best Metalcraft Solutions
                        </h1>
                        <a href="#" class="btn btn-primary py-3 px-4">Explore More</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-3.jpg" alt="Image">
                    <div class="carousel-caption">
                        <h1 class="display-1 text-uppercase text-white mb-4 animated zoomIn">Best Metalcraft Solutions
                        </h1>
                        <a href="#" class="btn btn-primary py-3 px-4">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- About Start -->
    <div class="container-fluid pt-6 pb-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid w-100" src="{{ asset('assets-guest/img/beranda3 (1)-min.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-6 text-uppercase mb-4">pertanahan</h1>
                    <p class="mb-4">Belum tau mau diisi apa hehe, nanti
                        dipikirin mau diisi deskripsi seperti apa, terimakasihh</p>
                    <div class="row g-5 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-xl-square bg-light me-3">
                                    <i class="fa fa-users-cog fa-2x text-primary"></i>
                                </div>
                                <h5 class="lh-base text-uppercase mb-0">Certified Expert & Team</h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-xl-square bg-light me-3">
                                    <i class="fa fa-tachometer-alt fa-2x text-primary"></i>
                                </div>
                                <h5 class="lh-base text-uppercase mb-0">Fast & Reliable Services</h5>
                            </div>
                        </div>
                    </div>
                    <p><i class="fa fa-check-square text-primary me-3"></i>Many variations of passages of lorem ipsum
                    </p>
                    <p><i class="fa fa-check-square text-primary me-3"></i>Many variations of passages of lorem ipsum
                    </p>
                    <p><i class="fa fa-check-square text-primary me-3"></i>Many variations of passages of lorem ipsum
                    </p>
                    {{-- <div class="border border-5 border-primary p-4 text-center mt-4">
                        <h4 class="lh-base text-uppercase mb-0">We’re Good in All Metal Works Using Quality Welding Tools</h4>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Features Start -->
    <div class="container-fluid pt-2 pb-2">
        <div class="container pt-4">
            <div class="row g-0 feature-row wow fadeIn" data-wow-delay="0.1s">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="feature-item border h-100">
                        <div class="feature-icon btn-xxl-square bg-primary mb-4 mt-n4">
                            <i class="fa fa-hammer fa-2x text-white"></i>
                        </div>
                        <div class="p-5 pt-0">
                            <h5 class="text-uppercase mb-3">Quality Welding</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.</p>
                            <a class="position-relative text-body text-uppercase small d-flex justify-content-between"
                                href="#"><b class="bg-white pe-3">Read More</b> <i
                                    class="bi bi-arrow-right bg-white ps-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.4s">
                    <div class="feature-item border h-100">
                        <div class="feature-icon btn-xxl-square bg-primary mb-4 mt-n4">
                            <i class="fa fa-dollar-sign fa-2x text-white"></i>
                        </div>
                        <div class="p-5 pt-0">
                            <h5 class="text-uppercase">Affordable Pricing</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur augue.</p>
                            <a class="position-relative text-body text-uppercase small d-flex justify-content-between"
                                href="#"><b class="bg-white pe-3">Read More</b> <i
                                    class="bi bi-arrow-right bg-white ps-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature-item border h-100">
                        <div class="feature-icon btn-xxl-square bg-primary mb-4 mt-n4">
                            <i class="fa fa-check-double fa-2x text-white"></i>
                        </div>
                        <div class="p-5 pt-0">
                            <h5 class="text-uppercase">Best Welder</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.</p>
                            <a class="position-relative text-body text-uppercase small d-flex justify-content-between"
                                href="#"><b class="bg-white pe-3">Read More</b> <i
                                    class="bi bi-arrow-right bg-white ps-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.6s">
                    <div class="feature-item border h-100">
                        <div class="feature-icon btn-xxl-square bg-primary mb-4 mt-n4">
                            <i class="fa fa-tools fa-2x text-white"></i>
                        </div>
                        <div class="p-5 pt-0">
                            <h5 class="text-uppercase">Quality Tools</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.</p>
                            <a class="position-relative text-body text-uppercase small d-flex justify-content-between"
                                href="#"><b class="bg-white pe-3">Read More</b> <i
                                    class="bi bi-arrow-right bg-white ps-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Features Start -->
    {{-- <div class="container-fluid feature mt-6 mb-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-0 justify-content-end">
                <div class="col-lg-6 pt-5">
                    <div class="mt-5">
                        <h1 class="display-6 text-white text-uppercase mb-4 wow fadeIn" data-wow-delay="0.3s">Why You should Choose Our welding Services</h1>
                        <p class="text-light mb-4 wow fadeIn" data-wow-delay="0.4s">Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Curabitur tellus augue, iaculis id elit eget, ultrices pulvinar
                            tortor. Quisque vel lorem porttitor, malesuada arcu quis, fringilla risus. Pellentesque eu
                            consequat augue.</p>
                        <div class="row g-4 pt-2 mb-4">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                                <div class="flex-column text-center border border-5 border-primary p-5">
                                    <h1 class="text-white" data-toggle="counter-up">9999</h1>
                                    <p class="text-white text-uppercase mb-0">Satisfied Clients</p>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="flex-column text-center border border-5 border-primary p-5">
                                    <h1 class="text-white" data-toggle="counter-up">9999</h1>
                                    <p class="text-white text-uppercase mb-0">Complete Projects</p>
                                </div>
                            </div>
                        </div>
                        <div class="border border-5 border-primary border-bottom-0 p-5">
                            <div class="experience mb-4 wow fadeIn" data-wow-delay="0.6s">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-white text-uppercase">Experience</span>
                                    <span class="text-white">90%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="experience wow fadeIn" data-wow-delay="0.7s">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-white text-uppercase">Work Done</span>
                                    <span class="text-white">95%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="95"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Features End -->


    <!-- Service Start -->
    {{-- <div class="container-fluid service pt-6 pb-6">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 text-uppercase mb-5">Reliable & High-Quality Welding Services</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="service-inner pb-5">
                            <img class="img-fluid w-100" src="img/service-1.jpg" alt="">
                            <div class="service-text px-5 pt-4">
                                <h5 class="text-uppercase">Metal Works</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.
                                    </p>
                            </div>
                            <a class="btn btn-light px-3" href="">Read More<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-inner pb-5">
                            <img class="img-fluid w-100" src="img/service-2.jpg" alt="">
                            <div class="service-text px-5 pt-4">
                                <h5 class="text-uppercase">Steel welding</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.
                                    </p>
                            </div>
                            <a class="btn btn-light px-3" href="">Read More<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="service-inner pb-5">
                            <img class="img-fluid w-100" src="img/service-3.jpg" alt="">
                            <div class="service-text px-5 pt-4">
                                <h5 class="text-uppercase">pipe welding</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.
                                    </p>
                            </div>
                            <a class="btn btn-light px-3" href="">Read More<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-inner pb-5">
                            <img class="img-fluid w-100" src="img/service-4.jpg" alt="">
                            <div class="service-text px-5 pt-4">
                                <h5 class="text-uppercase">Custom welding</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.
                                    </p>
                            </div>
                            <a class="btn btn-light px-3" href="">Read More<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="service-inner pb-5">
                            <img class="img-fluid w-100" src="img/service-5.jpg" alt="">
                            <div class="service-text px-5 pt-4">
                                <h5 class="text-uppercase">Steel welding</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.
                                    </p>
                            </div>
                            <a class="btn btn-light px-3" href="">Read More<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-inner pb-5">
                            <img class="img-fluid w-100" src="img/service-6.jpg" alt="">
                            <div class="service-text px-5 pt-4">
                                <h5 class="text-uppercase">Metal Work</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.
                                    </p>
                            </div>
                            <a class="btn btn-light px-3" href="">Read More<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="service-inner pb-5">
                            <img class="img-fluid w-100" src="img/service-7.jpg" alt="">
                            <div class="service-text px-5 pt-4">
                                <h5 class="text-uppercase">Custom Welding</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.
                                    </p>
                            </div>
                            <a class="btn btn-light px-3" href="">Read More<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-inner pb-5">
                            <img class="img-fluid w-100" src="img/service-8.jpg" alt="">
                            <div class="service-text px-5 pt-4">
                                <h5 class="text-uppercase">Pipe Welding</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.
                                    </p>
                            </div>
                            <a class="btn btn-light px-3" href="">Read More<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Service End -->


    <!-- Janji temu -->
    {{-- <div class="container-fluid appoinment mt-6 mb-6 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container pt-5">
            <div class="row gy-5 gx-0">
                <div class="col-lg-6 pe-lg-5 wow fadeIn" data-wow-delay="0.3s">
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
                <div class="col-lg-6 mb-n5 wow fadeIn" data-wow-delay="0.7s">
                    <div class="bg-white p-5">
                        <h2 class="text-uppercase mb-4">Jenis Penggunaan</h2>

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

                        <form method="POST" action="{{ route('jenis-penggunaan.store') }}">
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
    </div> --}}
    <!-- Appoinment End -->


    <!-- Team Start -->
    {{-- <div class="container-fluid team pt-6 pb-6">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 text-uppercase mb-5">Meet Our Professional and Experience Welder</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-1">Alex Robin</h5>
                            <span>Welder</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-1">Andrew Bon</h5>
                            <span>Welder</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-1">Martin Tompson</h5>
                            <span>Welder</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-4.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-1">Clarabelle Samber</h5>
                            <span>Welder</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid pt-6 pb-6">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 text-uppercase mb-5">What They’re Talking About Our Welding Work</h1>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="testimonial-img">
                        <div class="animated flip infinite">
                            <img class="img-fluid" src="{{ asset('assets-guest/img/testimonial-1.jpg') }}" alt="Testimonial 1">
                        </div>
                        <div class="animated flip infinite">
                            <img class="img-fluid" src="{{ asset('assets-guest/img/testimonial-2.jpg') }}" alt="Testimonial 2">
                        </div>
                        <div class="animated flip infinite">
                            <img class="img-fluid" src="{{ asset('assets-guest/img/testimonial-3.jpg') }}" alt="Testimonial 3">
                        </div>
                        <div class="animated flip infinite">
                            <img class="img-fluid" src="{{ asset('assets-guest/img/testimonial-4.jpg') }}" alt="Testimonial 4">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item">
                            <div class="d-flex align-items-center mb-4">
                                <img class="img-fluid rounded-circle" src="{{ asset('assets-guest/img/testimonial-1.jpg') }}" alt="Client 1" style="width:64px;height:64px;object-fit:cover;">
                                <div class="ms-3">
                                    <div class="mb-2">
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                    </div>
                                    <h5 class="text-uppercase">Client Name</h5>
                                    <span>Profession</span>
                                </div>
                            </div>
                            <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                                lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                            </p>
                        </div>
                        <div class="testimonial-item">
                            <div class="d-flex align-items-center mb-4">
                                <img class="img-fluid rounded-circle" src="{{ asset('assets-guest/img/testimonial-2.jpg') }}" alt="Client 2" style="width:64px;height:64px;object-fit:cover;">
                                <div class="ms-3">
                                    <div class="mb-2">
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                    </div>
                                    <h5 class="text-uppercase">Client Name</h5>
                                    <span>Profession</span>
                                </div>
                            </div>
                            <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                                lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                            </p>
                        </div>
                        <div class="testimonial-item">
                            <div class="d-flex align-items-center mb-4">
                                <img class="img-fluid rounded-circle" src="{{ asset('assets-guest/img/testimonial-3.jpg') }}" alt="Client 3" style="width:64px;height:64px;object-fit:cover;">
                                <div class="ms-3">
                                    <div class="mb-2">
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                    </div>
                                    <h5 class="text-uppercase">Client Name</h5>
                                    <span>Profession</span>
                                </div>
                            </div>
                            <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                                lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                            </p>
                        </div>
                        <div class="testimonial-item">
                            <div class="d-flex align-items-center mb-4">
                                <img class="img-fluid rounded-circle" src="{{ asset('assets-guest/img/testimonial-4.jpg') }}" alt="Client 4" style="width:64px;height:64px;object-fit:cover;">
                                <div class="ms-3">
                                    <div class="mb-2">
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                        <i class="far fa-star text-primary"></i>
                                    </div>
                                    <h5 class="text-uppercase">Client Name</h5>
                                    <span>Profession</span>
                                </div>
                            </div>
                            <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                                lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Developer Profile Start -->
    <div class="container-fluid py-6 wow fadeIn" data-wow-delay="0.1s" style="background: linear-gradient(135deg, #ffffff 0%, #fff8e7 100%); position: relative; overflow: hidden; padding-bottom: 100px !important;">
        <!-- Decorative elements -->
        <div style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(228, 158, 16, 0.08); border-radius: 50%;"></div>
        <div style="position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; background: rgba(228, 158, 16, 0.06); border-radius: 50%;"></div>
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 400px; height: 400px; background: rgba(228, 158, 16, 0.03); border-radius: 50%; z-index: 0;"></div>

        <div class="container" style="position: relative; z-index: 1;">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 700px;">
                <h1 class="display-5 text-uppercase mb-2" style="color: #2c3e50; font-weight: 800; letter-spacing: 2px;">Meet The Developer</h1>
                <div style="width: 80px; height: 4px; background: linear-gradient(90deg, #e49e10 0%, #d88a0a 100%); margin: 0 auto; border-radius: 2px;"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <div class="card border-0 wow fadeInUp" data-wow-delay="0.3s"
                         style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 20px 60px rgba(0,0,0,0.1);">
                        <!-- Card Header with Gradient -->
                        <div class="card-header border-0 p-0 d-flex align-items-center justify-content-center"
                             style="background: linear-gradient(135deg, #e49e10 0%, #d88a0a 100%); height: 120px; position: relative;">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-pill px-5 py-3"
                                 style="background: rgba(255,255,255,0.25); box-shadow: 0 4px 15px rgba(0,0,0,0.2); z-index: 2;">
                                <i class="fa fa-code text-white me-3" style="font-size: 18px;"></i>
                                <span class="text-white fw-bold" style="font-size: 18px; letter-spacing: 1.5px;">Profil Pengembang</span>
                            </div>
                            <div style="position: absolute; top: 0; right: 0; width: 200px; height: 120px; background: rgba(255,255,255,0.1); clip-path: polygon(100% 0, 0 0, 100% 100%);"></div>
                        </div>

                        <div class="card-body p-4 p-md-5" style="padding-top: 2.5rem !important; position: relative;">
                            <div class="row g-4 align-items-center">
                                <!-- Profile Image -->
                                <div class="col-lg-4 d-flex justify-content-center align-items-start">
                                    <div class="position-relative mb-3" style="width: 100%; max-width: 300px;">
                                        <div class="developer-photo-container" style="width: 100%; padding-bottom: 100%; position: relative; border-radius: 20px; overflow: hidden; border: 5px solid white; box-shadow: 0 15px 35px rgba(228, 158, 16, 0.3); background: white; transition: all 0.4s ease; cursor: pointer;">
                                            <img src="{{ asset('assets-guest/img/rass3-min.jpeg') }}"
                                                 alt="Developer"
                                                 style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;">
                                        </div>
                                        <!-- Badge overlay -->
                                        <div class="developer-badge" style="position: absolute; bottom: -10px; right: -10px; width: 55px; height: 55px; background: linear-gradient(135deg, #e49e10 0%, #d88a0a 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(228, 158, 16, 0.4); border: 3px solid white; transition: all 0.4s ease;">
                                            <i class="fas fa-code text-white" style="font-size: 20px;"></i>
                                        </div>
                                    </div>
                                </div>

                                <style>
                                    .developer-photo-container:hover {
                                        transform: translateY(-8px);
                                        box-shadow: 0 25px 50px rgba(228, 158, 16, 0.5);
                                        border-color: #e49e10;
                                    }

                                    .developer-photo-container:hover img {
                                        transform: scale(1.1);
                                    }

                                    .developer-photo-container:hover + .developer-badge {
                                        transform: scale(1.1) rotate(5deg);
                                        box-shadow: 0 8px 25px rgba(228, 158, 16, 0.6);
                                    }
                                </style>

                                <!-- Profile Info -->
                                <div class="col-lg-8">
                                    <div class="mb-4">

                                        <div class="row g-3 mb-3">
                                            <!-- NAMA -->
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-start p-3" style="background: #ffffff; box-shadow: 0 4px 15px rgba(0,0,0,0.08), 0 2px 6px rgba(0,0,0,0.05); border: 1px solid #f0f0f0; border-radius: 18px;">
                                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #e49e10 0%, #d88a0a 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 3px 8px rgba(228, 158, 16, 0.3);">
                                                        <i class="fas fa-user text-white"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <small class="text-muted d-block" style="font-size: 11px; text-transform: uppercase; letter-spacing: 1px; font-weight: 600;">NAMA</small>
                                                        <strong style="color: #2c3e50; font-size: 15px;">M. Farras Suryaputra</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- NIM -->
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-start p-3" style="background: #ffffff; box-shadow: 0 4px 15px rgba(0,0,0,0.08), 0 2px 6px rgba(0,0,0,0.05); border: 1px solid #f0f0f0; border-radius: 18px;">
                                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #e49e10 0%, #d88a0a 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 3px 8px rgba(228, 158, 16, 0.3);">
                                                        <i class="fas fa-id-card text-white"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <small class="text-muted d-block" style="font-size: 11px; text-transform: uppercase; letter-spacing: 1px; font-weight: 600;">NIM</small>
                                                        <strong style="color: #2c3e50; font-size: 15px;">2457301078</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- KAMPUS -->
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-start p-3" style="background: #ffffff; box-shadow: 0 4px 15px rgba(0,0,0,0.08), 0 2px 6px rgba(0,0,0,0.05); border: 1px solid #f0f0f0; border-radius: 18px;">
                                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #e49e10 0%, #d88a0a 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 3px 8px rgba(228, 158, 16, 0.3);">
                                                        <i class="fas fa-university text-white"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <small class="text-muted d-block" style="font-size: 11px; text-transform: uppercase; letter-spacing: 1px; font-weight: 600;">Kampus</small>
                                                        <strong style="color: #2c3e50; font-size: 15px;">Politeknik Caltex Riau</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- PRODI -->
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-start p-3" style="background: #ffffff; box-shadow: 0 4px 15px rgba(0,0,0,0.08), 0 2px 6px rgba(0,0,0,0.05); border: 1px solid #f0f0f0; border-radius: 18px;">
                                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #e49e10 0%, #d88a0a 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 3px 8px rgba(228, 158, 16, 0.3);">
                                                        <i class="fas fa-graduation-cap text-white"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <small class="text-muted d-block" style="font-size: 11px; text-transform: uppercase; letter-spacing: 1px; font-weight: 600;">Prodi</small>
                                                        <strong style="color: #2c3e50; font-size: 15px;">Sistem Informasi</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Badges -->
                                    <div class="d-flex flex-wrap gap-2 mb-4">
                                        <span class="badge px-3 py-2" style="background: linear-gradient(135deg, #e49e10 0%, #d88a0a 100%); font-size: 12px; border-radius: 8px; font-weight: 600;">
                                            <i class="fas fa-user-graduate me-2"></i>Mahasiswa
                                        </span>
                                        <span class="badge px-3 py-2" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); font-size: 12px; border-radius: 8px; font-weight: 600;">
                                            <i class="fas fa-users me-2"></i>G24
                                        </span>
                                        <span class="badge px-3 py-2" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); font-size: 12px; border-radius: 8px; font-weight: 600;">
                                            <i class="fas fa-map-marker-alt me-2"></i>Indonesia
                                        </span>
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-4 p-3 rounded" style="background: #fff5e6; border-left: 4px solid #e49e10;">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-envelope me-3" style="color: #e49e10; font-size: 18px;"></i>
                                            <a href="mailto:suryaputra24si@mahasiswa.pcr.ac.id" class="text-decoration-none" style="color: #2c3e50; font-weight: 600;">suryaputra24si@mahasiswa.pcr.ac.id</a>
                                        </div>
                                    </div>

                                    <!-- Social Media Links -->
                                    <div class="d-flex gap-3">
                                        <a href="https://www.linkedin.com/in/farrassurya12/" target="_blank" class="social-link"
                                           style="width: 50px; height: 50px; display: inline-flex; align-items: center; justify-content: center; border-radius: 15px; background: linear-gradient(135deg, #0077b5 0%, #005582 100%); color: white; transition: all 0.3s; box-shadow: 0 4px 12px rgba(0, 119, 181, 0.3); text-decoration: none; padding: 0; margin: 0; overflow: hidden; position: relative;">
                                            <i class="fab fa-linkedin-in" style="font-size: 20px;"></i>
                                        </a>
                                        <a href="https://github.com/farrassurya" target="_blank" class="social-link"
                                           style="width: 50px; height: 50px; display: inline-flex; align-items: center; justify-content: center; border-radius: 15px; background: linear-gradient(135deg, #333 0%, #1a1a1a 100%); color: white; transition: all 0.3s; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); text-decoration: none; padding: 0; margin: 0; overflow: hidden; position: relative;">
                                            <i class="fab fa-github" style="font-size: 20px;"></i>
                                        </a>
                                        <a href="https://www.instagram.com/farrassuryaa/" target="_blank" class="social-link"
                                           style="width: 50px; height: 50px; display: inline-flex; align-items: center; justify-content: center; border-radius: 15px; background: linear-gradient(135deg, #e4405f 0%, #c13584 100%); color: white; transition: all 0.3s; box-shadow: 0 4px 12px rgba(228, 64, 95, 0.3); text-decoration: none; padding: 0; margin: 0; overflow: hidden; position: relative;">
                                            <i class="fab fa-instagram" style="font-size: 20px;"></i>
                                        </a>
                                        <a href="https://wa.me/+62811691328" target="_blank" class="social-link"
                                           style="width: 50px; height: 50px; display: inline-flex; align-items: center; justify-content: center; border-radius: 15px; background: linear-gradient(135deg, #25d366 0%, #128c7e 100%); color: white; transition: all 0.3s; box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3); text-decoration: none; padding: 0; margin: 0; overflow: hidden; position: relative;">
                                            <i class="fab fa-whatsapp" style="font-size: 20px;"></i>
                                        </a>
                                    </div>

                                    <style>
                                        .social-link {
                                            -webkit-tap-highlight-color: transparent;
                                            outline: none !important;
                                            border: none !important;
                                            box-sizing: border-box;
                                        }
                                        .social-link:hover {
                                            transform: translateY(-5px) scale(1.05);
                                        }
                                        .social-link:focus {
                                            outline: none !important;
                                        }
                                        .social-link:active {
                                            transform: scale(0.95);
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Developer Profile End -->

    {{-- Footer partial --}}
    @include('layouts.guest.footer')


    {{-- Scripts partial --}}
    @include('layouts.guest.scripts')
</body>

</html>
