<!DOCTYPE html>
<html lang="en">

@include('layouts.guest.head')

<body>
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
