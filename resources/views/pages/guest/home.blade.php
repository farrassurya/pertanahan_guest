<!DOCTYPE html>
<html lang="en">

@include('layouts.guest.head')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>

    {{-- Sidebar partial --}}
    @include('layouts.guest.sidebar')

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
                        <img class="img-fluid w-100" src="{{ asset('assets-guest/img/image1.png') }}">
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


    <!-- Saran & Masukan -->
    {{-- <div class="container-fluid newsletter mt-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container pb-5">
            <div class="bg-white p-5 mb-5">
                <div class="row g-5">
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                        <h1 class="display-6 text-uppercase mb-4">Saran & Masukan</h1>
                        <div class="d-flex">
                            <i class="far fa-envelope-open fa-3x text-primary me-4"></i>
                            <p class="fs-5 fst-italic mb-0">Semua saran & masukan kalian sangat berharga dan akan
                                selalu kami cek juga pertimbangkan, terimakasih.</p>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control border-0 bg-light" id="mail"
                                placeholder="Your Email">
                            <label for="mail">Email</label>
                        </div>
                        <button class="btn btn-primary w-100 py-3" type="submit">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Newsletter Start -->


    {{-- Footer partial --}}
    @include('layouts.guest.footer')


    {{-- Scripts partial --}}
    @include('layouts.guest.scripts')
</body>

</html>
