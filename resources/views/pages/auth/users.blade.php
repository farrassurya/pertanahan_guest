<!DOCTYPE html>
<html lang="id">
@include('layouts.guest.head')
<body class="db-no-sidebar">

    <style>
        /* Page-level override for DB-style pages that intentionally omit the sidebar.
           Remove the global left margin and center the content for better visual balance. */
        @media (min-width: 992px) {
            body.db-no-sidebar {
                margin-left: 0 !important;
            }
        }
        .db-centered { max-width: 1100px; margin: 0 auto; }
    </style>

    <div class="db-centered">
        <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <a href="{{ route('pages.guest.home') }}" class="btn btn-outline-secondary me-3" title="Kembali ke Home">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <h3 class="m-0">Users</h3>
            </div>
            <a href="{{ route('pages.auth.register') }}" class="btn btn-success">Tambah User</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <style>
            .user-grid { display: grid; grid-template-columns: repeat(auto-fill,minmax(260px,1fr)); gap: 1.25rem; }
            .user-card {
                border: 0; border-radius: 12px; padding: 1rem; background: linear-gradient(180deg,#fff,#fbfbfd);
                box-shadow: 0 8px 28px rgba(11,18,35,0.06); transition: transform .28s cubic-bezier(.2,.9,.3,1), box-shadow .28s ease;
                position: relative; overflow: hidden; opacity:0; transform: translateY(10px) scale(.995); animation: cardIn .42s ease forwards;
            }
            .user-card:hover{ transform: translateY(-8px); box-shadow: 0 18px 48px rgba(11,18,35,0.12); }
            .user-name { font-weight:800; font-family: 'Poppins', sans-serif; color:#12202b; }
            .user-meta { font-size:13px; color:#6c757d; }
            .user-actions a, .user-actions form { display:inline-block; }
            .user-hash { font-family: monospace; font-size:12px; color:#444; background: linear-gradient(90deg,#f7f8fa,#ffffff); padding:6px 8px; border-radius:8px; display:inline-block; max-width:100%; overflow:auto; }

            /* Accent corner */
            .user-card::before{ content: ''; position: absolute; right: -40px; top: -24px; width: 120px; height:120px; background: radial-gradient(circle at 30% 30%, rgba(184,125,26,0.12), rgba(184,125,26,0.06)); transform: rotate(18deg); }

            /* entrance animation */
            @keyframes cardIn { to { opacity: 1; transform: translateY(0) scale(1); } }
            .user-grid .user-card:nth-child(1){ animation-delay: .04s }
            .user-grid .user-card:nth-child(2){ animation-delay: .09s }
            .user-grid .user-card:nth-child(3){ animation-delay: .14s }
            .user-grid .user-card:nth-child(4){ animation-delay: .19s }

            @media (max-width:576px){ .user-card{ padding: .85rem } }
        </style>

        <div class="user-grid">
            @foreach($users as $u)
                <div class="user-card">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="user-name">{{ $u->name }}</div>
                            <div class="user-meta">{{ $u->email }}</div>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-secondary">ID {{ $u->id }}</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="small text-muted">Password (hash)</div>
                        <div class="user-hash">{{ $u->password }}</div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center user-actions">
                        <div class="small text-muted">Terdaftar: {{ $u->created_at ? $u->created_at->format('d M Y') : '-' }}</div>
                        <div>
                            <a href="{{ route('pages.auth.users.edit', $u->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('pages.auth.users.destroy', $u->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus user ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">{{ $users->links() }}</div>
        </div>
    </div>

    @include('layouts.guest.scripts')
</body>
</html>
