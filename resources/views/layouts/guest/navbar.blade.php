<!-- Navbar Partial -->
<div class="container-fluid bg-white sticky-top wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0" style="padding:0.6rem 0;">
                <style>
                    /* navbar theming */
                    .navbar-brand-custom { font-family: 'Poppins', sans-serif; color:#b87d1a; font-weight:700; letter-spacing:1px; }
                    .navbar .nav-link { color: #222 !important; font-weight:600; text-transform:uppercase; padding:.6rem 1rem; }
                    .navbar .nav-link:hover { color: #b87d1a !important; }
                    .navbar .nav-link.active { color:#b87d1a !important; border-bottom:3px solid #b87d1a; border-radius:0; }
                    .navbar { background: #fff; box-shadow: 0 2px 12px rgba(0,0,0,0.04); }
                    .btn-get-quote { background:#b87d1a; border-color: #b87d1a; color:#fff; font-weight:700; }
                    .btn-get-quote:hover { background:#a36b14; border-color:#a36b14; }
                    /* compact dropdown styling (centered handled elsewhere) */
                    .dropdown-menu.centered a.dropdown-item { color:#222; }
                </style>

            <a href="index.html" class="navbar-brand d-lg-none">
                <h1 class="fw-bold m-0">WELDORK</h1>
            </a>
            <!-- Sidebar toggle (mobile) -->
            <button id="sidebar-open" type="button" class="btn btn-outline-secondary me-2 d-lg-none sidebar-toggle-btn"
                title="Open user sidebar">
                <i class="fa fa-user"></i>
            </button>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <style>
                    /* center dropdown under the Services toggle without affecting surrounding items */
                    .nav-item .dropdown-menu.centered {
                        left: 50% !important;
                        transform: translateX(-50%) !important;
                        position: absolute;
                        top: calc(100% + 6px);
                        min-width: 200px;
                        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
                    }
                    /* ensure dropdown toggle doesn't expand layout */
                    .nav-item.dropdown { position: relative; }
                </style>

                <div class="navbar-nav">
                    <a href="{{ route('pages.guest.home') }}" class="nav-item nav-link {{ request()->routeIs('pages.guest.home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('pages.guest.about') }}" class="nav-item nav-link {{ request()->is('about*') ? 'active' : '' }}">About</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('pages.guest.services') ? 'active' : '' }}" data-bs-toggle="dropdown">Services</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0 centered">
                            <a href="{{ route('pages.guest.services') }}#jenis" class="dropdown-item">Jenis Penggunaan</a>
                            {{-- add more dropdown items here if needed --}}
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->is('contact*') ? 'active' : '' }}" data-bs-toggle="dropdown">Contact</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0 centered">
                            <a class="dropdown-item" href="https://wa.me/+628117691328" target="_blank" rel="noopener">
                                <i class="fab fa-whatsapp me-2 text-success"></i> WhatsApp
                            </a>
                            <a class="dropdown-item" href="https://www.instagram.com/farrassuryaa?igsh=cnJjY3U2MWdkd2pt" target="_blank" rel="noopener">
                                <i class="fab fa-instagram me-2 text-danger"></i> Instagram
                            </a>
                        </div>
                    </div>

                </div>

                <div class="ms-auto d-none d-lg-block">
                    <a href="" class="btn btn-get-quote py-2 px-3">Get A Quote</a>
                </div>
            </div>
        </nav>
    </div>
</div>
