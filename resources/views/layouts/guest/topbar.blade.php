<!-- Topbar Partial -->
<!-- Desktop Topbar -->
<div class="container-fluid bg-primary text-white d-none d-lg-flex wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-4">
        <div class="d-flex align-items-center justify-content-between">
            <!-- Logo dan PERTANAHAN di kiri -->
            <div class="d-flex align-items-center">
                <div class="logo">
                    <style>
                        .logo-img {
                            width: 50px;
                            height: auto;
                            margin-right: 10px;
                        }
                        .btn-login-custom {
                            background: #ffe3a3;
                            color: #b87d1a;
                            border: 2px solid #b87d1a;
                            font-weight: 600;
                            transition: background 0.18s, color 0.18s, border 0.18s, box-shadow 0.18s;
                            box-shadow: none;
                        }
                        .btn-login-custom:hover, .btn-login-custom:active, .btn-login-custom:focus {
                            background: #ffd37a;
                            color: #a36b14;
                            border-color: #a36b14;
                            box-shadow: 0 0 0 0.18rem #f5e3c2;
                            outline: none;
                        }
                        .btn-signup-custom {
                            background: #ffe3a3;
                            color: #b87d1a;
                            border: 2px solid #b87d1a;
                            font-weight: 600;
                            transition: background 0.18s, color 0.18s, border 0.18s, box-shadow 0.18s;
                            box-shadow: none;
                        }
                        .btn-signup-custom:hover, .btn-signup-custom:active, .btn-signup-custom:focus {
                            background: #ffd37a;
                            color: #a36b14;
                            border-color: #a36b14;
                            box-shadow: 0 0 0 0.18rem #f5e3c2;
                            outline: none;
                        }

                        /* Mobile Topbar Styles */
                        .mobile-topbar {
                            background: #b87d1a;
                            padding: 0.75rem 0;
                        }
                        .mobile-topbar .btn {
                            font-size: 0.85rem;
                            padding: 0.4rem 0.8rem;
                        }
                    </style>
                    <img src="{{ asset('assets-guest/img/Logo_BPN-KemenATR_(2017).png') }}" alt="Logo" class="logo-img">
                </div>
                <a href="{{ url('/') }}">
                    <h2 class="text-white fw-bold m-0">PERTANAHAN</h2>
                </a>
            </div>

            <!-- Informasi kontak di tengah -->
            <div class="text-center flex-grow-1 mx-4">
                <small class="me-4"><i class="fa fa-map-marker-alt me-2"></i>Jl. Bukit Barisan, Pekanbaru</small>
                <small class="me-4"><i class="fa fa-envelope me-2"></i>suryaputra24si@mahasiswa.pcr.ac.id</small>
                <small class="me-4"><i class="fa fa-phone-alt me-2"></i>+62 812 75166478</small>
            </div>

            <!-- Tombol Login & Sign Up di kanan -->
            @guest
                <div class="d-flex align-items-center">
                    <a class="btn btn-info btn-login-custom px-3 py-2 me-2" href="{{ route('pages.auth.index') }}"
                        title="Masuk ke Akun">
                        <i class="fa fa-sign-in-alt me-1"></i>
                        Login
                    </a>
                    <a class="btn btn-light btn-signup-custom px-3 py-2" href="{{ route('pages.auth.register') }}"
                        title="Daftar Akun Baru">
                        <i class="fa fa-user-plus me-1"></i>
                        Sign Up
                    </a>
                </div>
            @else
                <!-- Jika sudah login, tampilkan info user -->
                <div class="d-flex align-items-center">
                    <div class="user-avatar bg-white text-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="me-3">
                        <div class="small fw-bold">{{ auth()->user()->name }}</div>
                        <div class="small">{{ auth()->user()->email }}</div>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">
                            <i class="fa fa-sign-out-alt me-1"></i> Logout
                        </button>
                    </form>
                </div>
            @endguest
        </div>
    </div>
</div>

<!-- Mobile Topbar dihapus - Fitur login/signup dipindah ke navbar dropdown -->
