@extends('layouts.guest.app')

@section('title', 'Data Jenis Penggunaan - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex flex-row justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase mb-0">Data Jenis Penggunaan</h2>
            <a href="{{ route('pages.jenis-penggunaan.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-1"></i> Tambah Jenis
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

            /* Card grid */
            .jp-card-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 1.25rem;
            }

            @media (max-width: 576px) {
                .jp-card-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }
            }

            /* Card base */
            .jp-card {
                border: 0;
                border-radius: 12px;
                overflow: hidden;
                background: linear-gradient(180deg, #ffffff 0%, #fbfbfd 100%);
                box-shadow: 0 8px 30px rgba(11, 18, 35, 0.06);
                transition: transform .28s cubic-bezier(.2, .9, .3, 1), box-shadow .28s ease;
                position: relative;
                border-left: 6px solid rgba(184, 125, 26, 0.14);
                min-height: 140px;
                padding: 1.1rem 1.25rem;
            }

            .jp-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 18px 48px rgba(11, 18, 35, 0.12);
            }

            .jp-card::after {
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                width: 6px;
                background: linear-gradient(180deg, #b87d1a, #e6b66a);
                opacity: .08;
            }

            /* Title and meta */
            .jp-card .card-title {
                font-weight: 700;
                letter-spacing: .2px;
                font-family: 'Poppins', sans-serif;
                font-size: 1.05rem;
                color: #1f2d3d;
                margin-bottom: 0.4rem;
            }

            .jp-card .card-meta {
                font-size: 13px;
                color: #6c757d;
                margin-bottom: 0.6rem;
            }

            .jp-card .card-body {
                padding: 0;
            }

            .jp-card .card-info {
                color: #555;
                margin-bottom: 0.35rem;
                font-size: 14px;
                line-height: 1.5;
            }

            .jp-card .card-info strong {
                color: #b87d1a;
                font-weight: 600;
            }

            /* Actions */
            .jp-card .card-actions {
                display: flex;
                gap: 0.5rem;
            }

            .jp-card .card-actions .btn {
                font-size: 12px;
                padding: 0.35rem 0.65rem;
                border-radius: 6px;
                transition: all 0.2s ease;
            }

            .jp-card .card-actions .btn i {
                font-size: 12px;
            }

            .jp-card .btn-outline-primary {
                color: #b87d1a;
                border-color: #b87d1a;
            }

            .jp-card .btn-outline-primary:hover {
                background-color: #b87d1a;
                border-color: #b87d1a;
                color: #fff;
            }

            .jp-card .btn-outline-danger {
                color: #dc3545;
                border-color: #dc3545;
            }

            .jp-card .btn-outline-danger:hover {
                background-color: #dc3545;
                border-color: #dc3545;
                color: #fff;
            }

            @media (max-width: 576px) {
                .jp-card {
                    padding: 1rem;
                }
                .jp-card .card-title {
                    font-size: 0.95rem;
                }
                .jp-card .card-meta,
                .jp-card .card-info {
                    font-size: 12px;
                }
                .jp-card .card-actions .btn {
                    font-size: 11px;
                    padding: 0.3rem 0.5rem;
                }
            }
        </style>

        <div class="jp-card-grid">
            @forelse($items as $item)
                <div class="card jp-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <div class="card-title">{{ $item->nama_penggunaan }}</div>
                                <div class="card-meta">ID: {{ $item->id }}</div>
                            </div>
                            <div class="text-end">
                                <span class="badge" style="background-color: #b87d1a;">Jenis</span>
                            </div>
                        </div>

                        <p class="card-info mb-3">{{ Str::limit($item->keterangan, 180) }}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="small text-muted">Dibuat: {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</div>
                            <div class="card-actions">
                                <a href="{{ route('pages.jenis-penggunaan.edit', $item->id) }}"
                                   class="btn btn-sm btn-outline-primary"
                                   title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('pages.jenis-penggunaan.destroy', $item->id) }}"
                                      method="POST"
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Hapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card jp-card">
                    <div class="card-body">
                        <div class="card-title">Belum ada data jenis penggunaan.</div>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($items->hasPages())
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-4 mb-3">
            <div class="text-muted small mb-3 mb-md-0">
                Showing <strong>{{ $items->firstItem() ?? 0 }}</strong> to <strong>{{ $items->lastItem() ?? 0 }}</strong> of <strong>{{ $items->total() }}</strong> results
            </div>

            <nav aria-label="Pagination Jenis Penggunaan">
                {{ $items->onEachSide(2)->links('pagination::bootstrap-5') }}
            </nav>
        </div>
        @endif
    </div>
</div>
@endsection
