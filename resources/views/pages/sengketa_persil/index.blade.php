@extends('layouts.guest.app')

@section('title', 'Sengketa Persil - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex flex-row justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('pages.guest.services') }}#sengketa" class="btn btn-outline-secondary">
                    <i class="fa fa-arrow-left me-1"></i>
                </a>
                <h2 class="text-uppercase mb-0">Sengketa Persil</h2>
            </div>
            <a href="{{ route('pages.sengketa-persil.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-1"></i> Tambah Sengketa
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

            {{-- Filter --}}
            <div class="mb-4">
                <style>
                    .btn-clear-custom-sengketa:hover {
                        background-color: #b87d1a !important;
                        color: white !important;
                    }
                    .btn-clear-custom-sengketa:active {
                        background-color: #a36b14 !important;
                        color: white !important;
                    }
                </style>
                <form method="GET" action="{{ route('pages.sengketa-persil.index') }}" class="d-flex gap-2 align-items-end">
                    <div>
                        <select name="status" class="form-select form-select-lg" onchange="this.form.submit()" style="border-radius: 12px; min-width: 180px; padding: 12px 20px; font-size: 1rem; cursor: pointer;">
                            <option value="">Semua Status</option>
                            <option value="Proses" {{ request('status') == 'Proses' ? 'selected' : '' }}>Proses</option>
                            <option value="Mediasi" {{ request('status') == 'Mediasi' ? 'selected' : '' }}>Mediasi</option>
                            <option value="Pengadilan" {{ request('status') == 'Pengadilan' ? 'selected' : '' }}>Pengadilan</option>
                            <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                    <div>
                        <select name="persil_id" class="form-select form-select-lg" onchange="this.form.submit()" style="border-radius: 12px; min-width: 200px; padding: 12px 20px; font-size: 1rem; cursor: pointer;">
                            <option value="">Semua Persil</option>
                            @foreach($persils as $p)
                                <option value="{{ $p->persil_id }}" {{ request('persil_id') == $p->persil_id ? 'selected' : '' }}>
                                    {{ $p->kode_persil }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="min-width: 250px;">
                        <div class="input-group input-group-lg">
                            <input type="text" name="search" class="form-control" placeholder="Cari pihak/kronologi..." value="{{ request('search') }}" style="border-radius: 12px 0 0 12px; padding: 12px 20px; font-size: 1rem;">
                            <button type="submit" class="btn" style="background-color: white; border: 1px solid #ced4da; border-radius: 0 {{ request('search') ? '' : '12px 12px' }} 0; border-left: 1px solid #ced4da; color: #6c757d;">
                                <i class="fa fa-search"></i>
                            </button>
                            @if(request('search'))
                            <a href="{{ route('pages.sengketa-persil.index', ['status' => request('status'), 'persil_id' => request('persil_id')]) }}" class="btn btn-clear-custom-sengketa" style="background-color: white; color: #b87d1a; border: 1px solid #ced4da; border-radius: 0 12px 12px 0; border-left: 1px solid #ced4da; font-weight: normal; transition: all 0.3s ease;">
                                Clear
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

                /* Card grid - Responsive */
                .sengketa-card-grid {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 1.5rem;
                }

                @media (max-width: 1400px) {
                    .sengketa-card-grid {
                        grid-template-columns: repeat(3, 1fr);
                        gap: 1.25rem;
                    }
                }

                @media (max-width: 1024px) {
                    .sengketa-card-grid {
                        grid-template-columns: repeat(2, 1fr);
                        gap: 1.25rem;
                    }
                }

                @media (max-width: 768px) {
                    .sengketa-card-grid {
                        grid-template-columns: 1fr;
                        gap: 1rem;
                    }
                }

                @media (max-width: 576px) {
                    .sengketa-card-grid {
                        grid-template-columns: 1fr;
                        gap: 0.75rem;
                    }
                }

                /* Card base */
                .sengketa-card {
                    border: 0;
                    border-radius: 12px;
                    padding: 1.5rem;
                    background: linear-gradient(180deg, #fff, #fbfbfd);
                    box-shadow: 0 8px 28px rgba(11,18,35,0.06);
                    transition: transform .28s cubic-bezier(.2,.9,.3,1), box-shadow .28s ease;
                    position: relative;
                    overflow: hidden;
                }

                .sengketa-card:hover {
                    transform: translateY(-8px);
                    box-shadow: 0 18px 48px rgba(11, 18, 35, 0.12);
                }

                /* Accent corner */
                .sengketa-card::before {
                    content: '';
                    position: absolute;
                    right: -40px;
                    top: -24px;
                    width: 120px;
                    height: 120px;
                    background: radial-gradient(circle at 30% 30%, rgba(184,125,26,0.12), rgba(184,125,26,0.06));
                    transform: rotate(18deg);
                    z-index: 1;
                }

                /* Title and meta */
                .sengketa-card .card-title {
                    font-weight: 700;
                    letter-spacing: .2px;
                    font-family: 'Poppins', sans-serif;
                    font-size: 1.05rem;
                    color: #1f2d3d;
                    margin-bottom: 0.4rem;
                }

                .sengketa-card .card-meta {
                    font-size: 13px;
                    color: #6c757d;
                    margin-bottom: 0.6rem;
                }

                .sengketa-card .card-body {
                    padding: 0;
                    position: relative;
                    z-index: 2;
                }

                .sengketa-card .card-info {
                    color: #555;
                    margin-bottom: 0.35rem;
                    font-size: 14px;
                    line-height: 1.5;
                }

                .sengketa-card .card-info strong {
                    color: #b87d1a;
                    font-weight: 600;
                }

                /* Actions */
                .sengketa-card .card-actions {
                    display: flex;
                    gap: 0.5rem;
                    position: relative;
                    z-index: 3;
                }

                .sengketa-card .card-actions .btn {
                    font-size: 12px;
                    padding: 0.35rem 0.65rem;
                    border-radius: 6px;
                    transition: all 0.2s ease;
                }

                .sengketa-card .card-actions .btn i {
                    font-size: 12px;
                }

                .sengketa-card .btn-outline-primary {
                    color: #b87d1a;
                    border-color: #b87d1a;
                }

                .sengketa-card .btn-outline-primary:hover {
                    background-color: #b87d1a;
                    border-color: #b87d1a;
                    color: #fff;
                }

                .sengketa-card .btn-outline-secondary {
                    color: #6c757d;
                    border-color: #6c757d;
                }

                .sengketa-card .btn-outline-secondary:hover {
                    background-color: #6c757d;
                    border-color: #6c757d;
                    color: #fff;
                }

                .sengketa-card .btn-outline-danger {
                    color: #dc3545;
                    border-color: #dc3545;
                }

                .sengketa-card .btn-outline-danger:hover {
                    background-color: #dc3545;
                    border-color: #dc3545;
                    color: #fff;
                }

                /* Status badges */
                .badge-proses { background: #ffc107; color: #fff; }
                .badge-mediasi { background: #17a2b8; color: #fff; }
                .badge-pengadilan { background: #dc3545; color: #fff; }
                .badge-selesai { background: #28a745; color: #fff; }

                @media (max-width: 768px) {
                    .sengketa-card {
                        padding: 1.25rem;
                    }
                }

                @media (max-width: 576px) {
                    .sengketa-card {
                        padding: 1rem;
                    }
                    .sengketa-card .card-title {
                        font-size: 0.95rem;
                    }
                    .sengketa-card .card-meta,
                    .sengketa-card .card-info {
                        font-size: 12px;
                    }
                    .sengketa-card .card-actions .btn {
                        font-size: 11px;
                        padding: 0.3rem 0.5rem;
                    }
                }
            </style>

            {{-- Card Grid --}}
            <div class="sengketa-card-grid">
                @forelse($sengketas as $sengketa)
                <div class="card sengketa-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <div class="card-title">{{ $sengketa->persil->kode_persil ?? '-' }}</div>
                                <div class="card-meta">ID: {{ $sengketa->sengketa_id }}</div>
                            </div>
                            <div class="text-end card-actions">
                                <a href="{{ route('pages.sengketa-persil.show', $sengketa->sengketa_id) }}" class="btn btn-sm btn-outline-primary" title="Lihat Detail">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if(auth()->user()->role === 'operator')
                                <a href="{{ route('pages.sengketa-persil.edit', $sengketa->sengketa_id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('pages.sengketa-persil.destroy', $sengketa->sengketa_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus sengketa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>

                        <p class="card-info mb-2">
                            <strong>Pihak 1:</strong> {{ $sengketa->pihak_1 }}
                        </p>
                        <p class="card-info mb-2">
                            <strong>Pihak 2:</strong> {{ $sengketa->pihak_2 }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="badge badge-{{ strtolower($sengketa->status) }}">{{ $sengketa->status }}</span>
                            <small class="text-muted">{{ $sengketa->created_at->format('d M Y') }}</small>
                        </div>
                    </div>
                </div>
                @empty
                <div class="card sengketa-card">
                    <div class="card-body">
                        <div class="card-title">Belum ada data sengketa persil.</div>
                    </div>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-4 mb-0">
                <nav aria-label="Pagination Sengketa Persil">
                    {{ $sengketas->onEachSide(2)->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>{{-- End Wrapper --}}
    </div>
</div>
@endsection
