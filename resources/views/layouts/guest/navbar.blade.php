<!-- Navbar Partial -->
<div class="container-fluid bg-white sticky-top wow fadeIn" data-wow-delay="0.1s" style="padding: 0; z-index: 1000; position: sticky;">
    <div class="container" id="navbar-container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0" style="padding:0.6rem 0;">
            <style>
                .navbar-brand-custom {
                    font-family: 'Poppins', sans-serif;
                    color: #b87d1a;
                    font-weight: 700;
                    letter-spacing: 1px;
                }

                .navbar .nav-link {
                    color: #222 !important;
                    font-weight: 600;
                    text-transform: uppercase;
                    padding: .6rem 1rem;
                }

                .navbar .nav-link:hover {
                    color: #b87d1a !important;
                }

                .navbar .nav-link.active {
                    color: #b87d1a !important;
                    border-bottom: 3px solid #b87d1a;
                    border-radius: 0;
                }

                .navbar {
                    background: #fff;
                    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
                }

                .btn-get-quote {
                    background: #b87d1a;
                    border-color: #b87d1a;
                    color: #fff;
                    font-weight: 700;
                }

                .btn-get-quote:hover {
                    background: #a36b14;
                    border-color: #a36b14;
                }

                .dropdown-menu.centered a.dropdown-item {
                    color: #222;
                }

                /* Samakan border color untuk user dropdown dengan navbar-toggler */
                .sidebar-toggle-btn {
                    border-color: rgba(255, 255, 255, 0.3);
                    color: white;
                }

                .sidebar-toggle-btn:hover,
                .sidebar-toggle-btn:focus {
                    border-color: rgba(255, 255, 255, 0.5);
                    color: white;
                    background: rgba(255, 255, 255, 0.1);
                }

                @media (max-width: 991px) {
                    .navbar-toggler {
                        border-color: rgba(255, 255, 255, 0.3) !important;
                    }

                    .navbar-toggler-icon {
                        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
                    }
                }

                .nav-item .dropdown-menu.centered {
                    left: 50% !important;
                    transform: translateX(-50%) !important;
                    position: absolute;
                    top: calc(100% + 6px);
                    min-width: 200px;
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
                }

                .nav-item.dropdown {
                    position: relative;
                }

                /* Responsive Styles */
                @media (max-width: 991px) {
                    /* Orange background untuk mobile */
                    .container-fluid.bg-white {
                        background: #b87d1a !important;
                    }

                    .navbar.bg-white {
                        background: #b87d1a !important;
                    }

                    /* Hilangkan semua container padding dan margin di mobile */
                    .container-fluid {
                        padding-left: 0 !important;
                        padding-right: 0 !important;
                    }

                    #navbar-container {
                        max-width: 100% !important;
                        padding-left: 0 !important;
                        padding-right: 0 !important;
                        margin-left: 0 !important;
                        margin-right: 0 !important;
                        width: 100% !important;
                    }

                    .navbar {
                        padding-left: 0 !important;
                        padding-right: 0 !important;
                        width: 100%;
                    }

                    .navbar-brand {
                        padding-left: 15px !important;
                        margin-left: 0 !important;
                    }

                    .navbar-toggler {
                        margin-right: 15px !important;
                    }

                    .dropdown.d-lg-none {
                        margin-right: 0 !important;
                    }

                    .navbar-brand h1 {
                        font-size: 1.5rem;
                    }

                    .navbar-nav {
                        padding: 0 !important;
                        margin: 0 !important;
                        width: 100%;
                        background: #fff;
                    }

                    .navbar .nav-link {
                        padding: 0.75rem 1.5rem !important;
                        width: 100%;
                        border-bottom: 1px solid #e9ecef;
                        margin: 0 !important;
                    }

                    .nav-item {
                        width: 100%;
                        margin: 0 !important;
                    }

                    .navbar-collapse {
                        margin: 0 !important;
                        padding: 0 !important;
                        background: #fff;
                        width: 100%;
                    }

                    .nav-item .dropdown-menu.centered {
                        left: 0 !important;
                        transform: none !important;
                        position: relative;
                        top: 0;
                        box-shadow: none;
                        border: none;
                        background: #f8f9fa !important;
                        padding-left: 2rem !important;
                        width: 100%;
                        margin: 0 !important;
                    }

                    .dropdown-menu .dropdown-item {
                        padding: 0.5rem 1rem;
                        font-size: 0.9rem;
                    }
                }

                @media (max-width: 576px) {
                    .navbar-brand h1 {
                        font-size: 1.2rem;
                    }

                    .sidebar-toggle-btn {
                        padding: 0.4rem 0.75rem;
                        font-size: 0.9rem;
                    }
                }
            </style>

            <a href="{{ url('/') }}" class="navbar-brand d-lg-none" style="padding: 0; margin: 0;">
                <img src="{{ asset('assets-guest/img/logoHorizontal.png') }}?v={{ time() }}" alt="Logo" style="height: 50px; width: auto; margin-left: 15px;">
            </a>

            <div class="ms-auto d-flex align-items-center d-lg-none">
                <!-- User Menu Dropdown untuk Mobile -->
                <div class="dropdown me-2">
                    <button class="btn btn-outline-secondary dropdown-toggle sidebar-toggle-btn" type="button" id="userMenuMobile" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenuMobile">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('pages.auth.index') }}">
                                <i class="fa fa-sign-in-alt me-2"></i> Login
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('pages.auth.register') }}">
                                <i class="fa fa-user-plus me-2"></i> Sign Up
                            </a></li>
                        @else
                            <li><h6 class="dropdown-header">{{ auth()->user()->name }}</h6></li>
                            <li><small class="dropdown-item-text text-muted px-3">{{ auth()->user()->email }}</small></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fa fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>

                <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-lg-4">
                    <a href="{{ route('pages.guest.home') }}"
                        class="nav-item nav-link {{ request()->routeIs('pages.guest.home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('pages.guest.about') }}"
                        class="nav-item nav-link {{ request()->routeIs('pages.guest.about') ? 'active' : '' }}">About</a>

                    <!-- Services dengan Dropdown -->
                    <div class="nav-item dropdown">
                        <a href="#"
                            class="nav-link dropdown-toggle {{ request()->routeIs('pages.guest.services') || request()->routeIs('pages.persil.*') || request()->routeIs('pages.jenis-penggunaan.*') || request()->routeIs('pages.dokumen-persil.*') ? 'active' : '' }}"
                            data-bs-toggle="dropdown">Services</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0 centered">
                            <a href="{{ route('pages.persil.index') }}" class="dropdown-item">
                                <i class="fa fa-certificate me-2 text-warning"></i> Persil
                            </a>
                            <a href="{{ route('pages.dokumen-persil.index') }}" class="dropdown-item">
                                <i class="fa fa-file-alt me-2 text-info"></i> Dokumen Persil
                            </a>
                            <a href="{{ route('pages.guest.services') }}#jenis" class="dropdown-item">
                                <i class="fa fa-tags me-2 text-success"></i> Jenis Penggunaan
                            </a>
                            <!-- Data dari DB Jenis Penggunaan -->
                            @if (isset($jenisPenggunaanList) && count($jenisPenggunaanList) > 0)
                                @foreach ($jenisPenggunaanList as $jenis)
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-circle me-2 text-primary" style="font-size: 8px;"></i>
                                        {{ $jenis->nama_penggunaan }}
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- MENU WARGA - TAMBAHKAN INI -->
                    <a href="{{ route('pages.warga.index') }}"
                        class="nav-item nav-link {{ request()->routeIs('pages.warga.*') ? 'active' : '' }}">
                        Warga
                    </a>

                    <!-- Contact dengan Dropdown (tanpa route) -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Contact</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0 centered">
                            <a class="dropdown-item" href="https://wa.me/+628117691328" target="_blank" rel="noopener">
                                <i class="fab fa-whatsapp me-2 text-success"></i> WhatsApp
                            </a>
                            <a class="dropdown-item" href="https://www.instagram.com/farrassuryaa?igsh=cnJjY3U2MWdkd2pt"
                                target="_blank" rel="noopener">
                                <i class="fab fa-instagram me-2 text-danger"></i> Instagram
                            </a>
                        </div>
                    </div>

                    <!-- Menu USER hanya untuk Operator -->
                    @auth
                        @if(auth()->user()->isOperator())
                            <a href="{{ route('pages.auth.users') }}"
                                class="nav-item nav-link {{ request()->routeIs('pages.auth.users') ? 'active' : '' }}">
                                User
                            </a>
                        @endif
                    @endauth
                </div>

                <div class="ms-auto d-none d-lg-block">
                    <a href="" class="btn btn-get-quote py-2 px-3">Get A Quote</a>
                </div>
            </div>
        </nav>
    </div>
</div>
