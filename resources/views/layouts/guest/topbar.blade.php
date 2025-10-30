<!-- Topbar Partial -->
<div class="container-fluid bg-primary text-white d-none d-lg-flex wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-4">
        <div class="d-flex align-items-center">
            <a href="{{ url('/') }}">
                <h2 class="text-white fw-bold m-0">PERTANAHAN</h2>
            </a>
            <div class="ms-auto d-flex align-items-center">
                <small class="ms-4"><i class="fa fa-map-marker-alt me-2"></i>Jl. Bukit Barisan, Pekanbaru</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>suryaputra24si@mahasiswa.pcr.ac.id</small>
                <small class="ms-4"><i class="fa fa-phone-alt me-2"></i>+62 812 75166478</small>

                @guest
                    <div class="ms-3 d-flex align-items-center">
                        <a class="btn btn-info btn-login-custom px-1 py-2 me-2" href="{{ route('auth.index') }}"
                            title="Masuk ke Akun">
                            <i class="fa fa-sign-in-alt me-1"></i>
                            Login
                        </a>
                        <a class="btn btn-primary btn-signup-custom px-1 py-2" href="{{ route('auth.register') }}"
                            title="Daftar Akun Baru">
                            <i class="fa fa-user-plus me-1"></i>
                            Sign Up
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</div>
