<!-- Sidebar Partial: resources/views/partials/sidebar.blade.php -->
<aside id="user-sidebar" class="user-sidebar">
    <div class="user-sidebar-inner">
        <div class="d-flex align-items-center mb-3">
            <div class="user-avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                <i class="fa fa-user fa-lg"></i>
            </div>
            <div>
                @if(auth()->check())
                    <div class="fw-bold">{{ auth()->user()->name }}</div>
                    <div class="small text-muted">{{ auth()->user()->email }}</div>
                @else
                    <div class="fw-bold">Guest</div>
                    <div class="small text-muted">Belum masuk</div>
                @endif
            </div>
        </div>

        <div class="list-group mb-3">
            @if(auth()->check())
                <a href="{{ route('profile.index') ?? '#' }}" class="list-group-item list-group-item-action">Profile</a>
                <a href="{{ route('jenis-penggunaan.index') ?? '#' }}" class="list-group-item list-group-item-action">Jenis Penggunaan</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="list-group-item list-group-item-action text-start btn btn-link p-0">Logout</button>
                </form>
            @else
                <a href="{{ route('auth.index') }}" class="list-group-item list-group-item-action">Login</a>
                <a href="{{ route('auth.index') }}" class="list-group-item list-group-item-action">Sign Up</a>
            @endif
        </div>

        <div class="small text-muted">Quick Links</div>
        <a class="d-block mb-2" href="{{ url('/') }}">Home</a>
        <a class="d-block mb-2" href="#contact">Contact</a>

        <button id="sidebar-close" class="btn btn-sm btn-outline-secondary mt-3 d-lg-none">Close</button>
    </div>
</aside>
