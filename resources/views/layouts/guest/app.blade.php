<!DOCTYPE html>
<html lang="en">

@include('layouts.guest.head')

<body>
    <style>
        /* Global responsive styles */
        @media (max-width: 768px) {
            .container-fluid {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .container {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }

            h1 {
                font-size: 1.75rem !important;
            }

            h2 {
                font-size: 1.5rem !important;
            }

            h3 {
                font-size: 1.25rem !important;
            }
        }

        @media (max-width: 576px) {
            .container-fluid {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            h1 {
                font-size: 1.5rem !important;
            }

            h2 {
                font-size: 1.25rem !important;
            }
        }
    </style>

    {{-- Topbar partial --}}
    @include('layouts.guest.topbar')

    {{-- Navbar partial --}}
    @include('layouts.guest.navbar')

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    {{-- Footer partial --}}
    @include('layouts.guest.footer')

    <!-- Scripts -->
    @include('layouts.guest.scripts')
</body>
</html>
