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
                </div>
            </div>
        </div>
    </div>

    @include('layouts.guest.scripts')
</body>

</html>
