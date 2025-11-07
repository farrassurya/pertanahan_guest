<!DOCTYPE html>
<html lang="en">

@include('layouts.guest.head')

<body class="db-no-sidebar">
    <!-- Intentionally omitted topbar, navbar, and sidebar for a clean DB-style page -->

    <style>
        /* Override the global sidebar margin for DB pages and center the content */
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
                <h3 class="m-0">Daftar Jenis Penggunaan</h3>
            </div>
            <a href="{{ route('pages.jenis-penggunaan.create') }}" class="btn btn-success">Tambah</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <style>
            /* Card grid */
            .card-grid { display: grid; grid-template-columns: repeat(auto-fill,minmax(260px,1fr)); gap: 1.25rem; }

            /* Card base */
            .jp-card {
                border: 0; border-radius: 12px; overflow: hidden;
                background: linear-gradient(180deg, #ffffff 0%, #fbfbfd 100%);
                box-shadow: 0 8px 30px rgba(11,18,35,0.06);
                transition: transform .28s cubic-bezier(.2,.9,.3,1), box-shadow .28s ease;
                position: relative;
                border-left: 6px solid rgba(184,125,26,0.14);
                min-height: 140px;
                opacity: 0; transform: translateY(10px) scale(.995);
                animation: cardIn .42s ease forwards;
            }
            .jp-card .card-body { padding: 1.1rem 1.15rem; }
            .jp-card:hover { transform: translateY(-8px); box-shadow: 0 18px 48px rgba(11,18,35,0.12); }

            /* Title and meta */
            .jp-title { font-weight:700; letter-spacing:.2px; font-family: 'Poppins', sans-serif; font-size: 1.05rem; color:#1f2d3d; }
            .jp-meta { font-size: 13px; color: #6c757d; }

            /* Actions */
            .jp-actions a, .jp-actions form { display:inline-block; }
            .jp-actions .btn { font-size: 13px; }

            /* Accent ribbon */
            .jp-card::after{
                content: '';
                position: absolute; left: 0; top: 0; bottom: 0; width: 6px;
                background: linear-gradient(180deg,#b87d1a,#e6b66a);
                opacity: .08;
            }

            /* Entrance animation with stagger using nth-child */
            @keyframes cardIn { to { opacity: 1; transform: translateY(0) scale(1); } }
            .card-grid .card:nth-child(1){ animation-delay: .05s }
            .card-grid .card:nth-child(2){ animation-delay: .10s }
            .card-grid .card:nth-child(3){ animation-delay: .15s }
            .card-grid .card:nth-child(4){ animation-delay: .20s }
            .card-grid .card:nth-child(5){ animation-delay: .25s }

            @media (max-width: 576px) {
                .jp-card{ min-height: auto; }
            }
        </style>

        <div class="card-grid">
            @foreach($items as $it)
                <div class="card jp-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <div class="jp-title">{{ $it->nama_penggunaan }}</div>
                                <div class="jp-meta">ID: {{ $it->id }}</div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-secondary">Jenis</span>
                            </div>
                        </div>

                        <p class="mb-3 text-muted">{{ Str::limit($it->keterangan, 180) }}</p>

                        <div class="d-flex justify-content-between align-items-center jp-actions">
                            <div class="small text-muted">Dibuat: {{ $it->created_at ? $it->created_at->format('d M Y') : '-' }}</div>
                            <div>
                                <a href="{{ route('pages.jenis-penggunaan.edit', $it->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('pages.jenis-penggunaan.destroy', $it->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">{{ $items->links() }}</div>
        </div>
    </div>

    @include('layouts.guest.scripts')
</body>

</html>
