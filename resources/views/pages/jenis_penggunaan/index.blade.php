@extends('layouts.guest.app')

@section('title', 'Data Jenis Penggunaan - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex flex-row justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('pages.guest.services') }}#jenis" class="btn btn-outline-secondary">
                    <i class="fa fa-arrow-left me-1"></i>
                </a>
                <h2 class="text-uppercase mb-0">Data Jenis Penggunaan</h2>
            </div>
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

        {{-- Wrapper with border --}}
        <div class="position-relative rounded-3 p-4 bg-white" style="border: 1px solid #e0e0e0; box-shadow: 0 4px 12px rgba(0,0,0,0.08), 0 2px 4px rgba(0,0,0,0.05); background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);">
            {{-- Top accent border --}}
            <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #b87d1a 0%, #d4a055 50%, #b87d1a 100%); border-radius: 8px 8px 0 0;"></div>

            {{-- Search --}}
            <div class="mb-4">
                <style>
                    .btn-clear-custom-jp:hover {
                        background-color: #b87d1a !important;
                        color: white !important;
                    }
                    .btn-clear-custom-jp:active {
                        background-color: #a36b14 !important;
                        color: white !important;
                    }
                </style>
                <form method="GET" action="{{ route('pages.jenis-penggunaan.index') }}" class="d-flex gap-2 align-items-end">
                    <div style="min-width: 250px;">
                        <div class="input-group input-group-lg">
                            <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}" style="border-radius: 12px 0 0 12px; padding: 12px 20px; font-size: 1rem;">
                            <button type="submit" class="btn" style="background-color: white; border: 1px solid #ced4da; border-radius: 0 {{ request('search') ? '' : '12px 12px' }} 0; border-left: 1px solid #ced4da; color: #6c757d;">
                                <i class="fa fa-search"></i>
                            </button>
                            @if(request('search'))
                            <a href="{{ route('pages.jenis-penggunaan.index') }}" class="btn btn-clear-custom-jp" style="background-color: white; color: #b87d1a; border: 1px solid #ced4da; border-radius: 0 12px 12px 0; border-left: 1px solid #ced4da; font-weight: normal; transition: all 0.3s ease;">
                                Clear
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

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
                padding: 1.5rem;
                background: linear-gradient(180deg, #fff, #fbfbfd);
                box-shadow: 0 8px 28px rgba(11,18,35,0.06);
                transition: transform .28s cubic-bezier(.2,.9,.3,1), box-shadow .28s ease;
                position: relative;
                overflow: hidden;
            }

            .jp-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 18px 48px rgba(11, 18, 35, 0.12);
            }

            /* Accent corner */
            .jp-card::before {
                content: '';
                position: absolute;
                right: -40px;
                top: -24px;
                width: 120px;
                height: 120px;
                background: radial-gradient(circle at 30% 30%, rgba(184,125,26,0.12), rgba(184,125,26,0.06));
                transform: rotate(18deg);
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
        <div class="mt-4 mb-0">
            <nav aria-label="Pagination Jenis Penggunaan">
                {{ $items->onEachSide(2)->links('pagination::bootstrap-5') }}
            </nav>
        </div>
        @endif
        </div>
        {{-- End wrapper --}}
    </div>
</div>
@endsection
