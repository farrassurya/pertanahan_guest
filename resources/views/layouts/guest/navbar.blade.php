<!-- Navbar Partial -->
<div class="container-fluid bg-white sticky-top wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
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
            </style>

            <a href="{{ url('/') }}" class="navbar-brand d-lg-none">
                <h1 class="fw-bold m-0">PERTANAHAN</h1>
            </a>

            <button id="sidebar-open" type="button" class="btn btn-outline-secondary me-2 d-lg-none sidebar-toggle-btn"
                title="Open user sidebar">
                <i class="fa fa-user"></i>
            </button>

            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="{{ route('pages.guest.home') }}"
                        class="nav-item nav-link {{ request()->routeIs('pages.guest.home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('pages.guest.about') }}"
                        class="nav-item nav-link {{ request()->routeIs('pages.guest.about') ? 'active' : '' }}">About</a>

                    <!-- Services dengan Dropdown -->
                    <div class="nav-item dropdown">
                        <a href="#"
                            class="nav-link dropdown-toggle {{ request()->routeIs('pages.guest.services') ? 'active' : '' }}"
                            data-bs-toggle="dropdown">Services</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0 centered">
                            <a href="{{ route('pages.guest.services') }}#jenis" class="dropdown-item">Jenis
                                Penggunaan</a>
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

                    <!-- Menu untuk user yang sudah login -->
                    @auth
                        <a href="{{ route('pages.auth.users') }}"
                            class="nav-item nav-link {{ request()->routeIs('pages.auth.users') ? 'active' : '' }}">
                            User
                        </a>
                    @endauth
                </div>

                <div class="ms-auto d-none d-lg-block">
                    <a href="" class="btn btn-get-quote py-2 px-3">Get A Quote</a>
                </div>
            </div>
        </nav>
    </div>
</div>
