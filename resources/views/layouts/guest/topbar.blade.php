<!-- Topbar Partial -->
<!-- Desktop Topbar -->
<div class="container-fluid bg-primary text-white d-none d-lg-flex wow fadeIn" data-wow-delay="0.2s" style="position: relative; z-index: 9999;">
    <div class="container py-2">
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
                    <img src="{{ asset('assets-guest/img/logoHorizontal.png') }}?v={{ time() }}" alt="Logo" style="height: 75px; width: auto; margin: 0px 0 0px 30px;">
                </div>
            </div>

            <!-- Informasi kontak di tengah -->
            <div class="text-center flex-grow-1 mx-4">
                <small class="me-4"><i class="fa fa-map-marker-alt me-2"></i>Jl. Bukit Barisan, Pekanbaru</small>
                <small class="me-4"><i class="fa fa-envelope me-2"></i>suryaputra24si@mahasiswa.pcr.ac.id</small>
                <small class="me-4"><i class="fa fa-phone-alt me-2"></i>+62 812 75166478</small>
            </div>

            <!-- Tombol Login & Sign Up atau Profile Dropdown di kanan -->
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
                <!-- Profile Dropdown -->
                <div class="dropdown" style="position: relative; z-index: 10000;">
                    <button class="btn d-flex align-items-center gap-2 dropdown-toggle border-0" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background: transparent; color: white; font-weight: 600; padding: 0.5rem 0; border-radius: 4px; cursor: pointer;">
                        @if(auth()->user()->profile_photo)
                            <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="{{ auth()->user()->name }}" class="rounded-circle" style="width: 35px; height: 35px; object-fit: cover; border: 2px solid white;">
                        @else
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' fill='white'/%3E%3Ctext x='50' y='50' font-family='Arial,sans-serif' font-size='45' font-weight='600' fill='%23b87d1a' text-anchor='middle' dy='.35em'%3E{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}%3C/text%3E%3C/svg%3E" alt="{{ auth()->user()->name }}" class="rounded-circle" style="width: 35px; height: 35px; object-fit: cover; border: 2px solid white;">
                        @endif
                        <div class="text-start">
                            <div class="fw-bold text-uppercase" style="font-size: 0.9rem; color: white;">{{ auth()->user()->name }}</div>
                            <div style="font-size: 0.75rem; color: rgba(255,255,255,0.8);">{{ auth()->user()->email }}</div>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown" style="min-width: 280px; border-radius: 8px; border: 1px solid #e0e0e0; padding: 0.5rem; margin-top: 0.5rem; z-index: 10001 !important; position: absolute !important;">
                        <li class="px-3 py-2">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="fa fa-shield-alt" style="color: {{ auth()->user()->role === 'operator' ? '#28a745' : '#6c757d' }};"></i>
                                <span class="badge" style="background-color: {{ auth()->user()->role === 'operator' ? '#28a745' : '#6c757d' }}; color: white; font-size: 11px; padding: 4px 10px; border-radius: 6px;">
                                    {{ auth()->user()->role === 'operator' ? 'Operator' : 'Warga' }}
                                </span>
                            </div>
                            <small class="text-muted" style="font-size: 10px;">
                                {{ auth()->user()->role === 'operator' ? 'Full CRUD Access' : 'View & Input Only' }}
                            </small>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a href="{{ route('profile') }}" class="dropdown-item py-2">
                                <i class="fa fa-user-edit me-2" style="color: #b87d1a;"></i> Edit Profil
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li class="px-3 py-2">
                            <small class="text-muted d-flex align-items-center gap-2"><i class="fa fa-clock" style="color: #999;"></i> <span id="realtime-clock"></span></small>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger py-2 fw-bold">
                                    <i class="fa fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest
        </div>
    </div>
</div>

<!-- Mobile Topbar dihapus - Fitur login/signup dipindah ke navbar dropdown -->

<script>
    // Realtime Clock
    function updateClock() {
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        const clockElement = document.getElementById('realtime-clock');
        if (clockElement) {
            clockElement.textContent = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        }
    }

    // Update clock immediately and then every second
    updateClock();
    setInterval(updateClock, 1000);
</script>
