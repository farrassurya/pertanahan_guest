@extends('layouts.guest.app')

@section('title', 'Data Dokumen Persil - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex flex-row justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase mb-0">Data Dokumen Persil</h2>
            <a href="{{ route('pages.dokumen-persil.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-1"></i> Tambah Dokumen
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('error'))
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
                    .btn-clear-custom-dokumen:hover {
                        background-color: #b87d1a !important;
                        color: white !important;
                    }
                    .btn-clear-custom-dokumen:active {
                        background-color: #a36b14 !important;
                        color: white !important;
                    }
                </style>
                <form method="GET" action="{{ route('pages.dokumen-persil.index') }}" class="d-flex align-items-end" style="gap: 0.5rem;">
                    <div>
                        <select name="jenis_dokumen" class="form-select form-select-lg" onchange="this.form.submit()" style="border-radius: 12px; min-width: 180px; padding: 12px 20px; font-size: 1rem;">
                            <option value="">Semua Jenis</option>
                            @foreach($jenisList as $jenis)
                                <option value="{{ $jenis }}" {{ request('jenis_dokumen') == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="min-width: 250px;">
                        <div class="input-group input-group-lg">
                            <input type="text" name="search" class="form-control" placeholder="Cari dokumen..." value="{{ request('search') }}" style="border-radius: 12px 0 0 12px; padding: 12px 20px; font-size: 1rem;">
                            <button type="submit" class="btn" style="background-color: white; border: 1px solid #ced4da; border-radius: 0 {{ request('search') ? '' : '12px 12px' }} 0; border-left: 1px solid #ced4da; color: #6c757d;">
                                <i class="fa fa-search"></i>
                            </button>
                            @if(request('search'))
                            <a href="{{ route('pages.dokumen-persil.index', ['jenis_dokumen' => request('jenis_dokumen')]) }}" class="btn btn-clear-custom-dokumen" style="background-color: white; color: #b87d1a; border: 1px solid #ced4da; border-radius: 0 12px 12px 0; border-left: 1px solid #ced4da; font-weight: normal; transition: all 0.3s ease;">
                                Clear
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

        <style>
            /* Card Grid Styling */
            .dokumen-card-grid { display: grid; grid-template-columns: repeat(auto-fill,minmax(300px,1fr)); gap: 1.25rem; }

            @media (max-width: 576px) {
                .dokumen-card-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }
            }

            .dokumen-card {
                border: 0;
                border-radius: 12px;
                padding: 1.5rem;
                background: linear-gradient(180deg, #fff, #fbfbfd);
                box-shadow: 0 8px 28px rgba(11,18,35,0.06);
                transition: transform .28s cubic-bezier(.2,.9,.3,1), box-shadow .28s ease;
                position: relative;
                overflow: hidden;
            }
            .dokumen-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 18px 48px rgba(11,18,35,0.12);
            }

            /* Accent corner */
            .dokumen-card::before {
                content: '';
                position: absolute;
                right: -40px;
                top: -24px;
                width: 120px;
                height: 120px;
                background: radial-gradient(circle at 30% 30%, rgba(184,125,26,0.12), rgba(184,125,26,0.06));
                transform: rotate(18deg);
            }

            .dokumen-card .card-title { font-weight:700; letter-spacing:.2px; font-family: 'Poppins', sans-serif; font-size:1.05rem; color:#1f2d3d; }
            .dokumen-card .card-meta { font-size: 13px; color:#6c757d; }

            .dokumen-card .card-body { padding: 0; }
            .dokumen-card .card-row { display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.6rem; }
            .dokumen-card .card-info { color:#222; margin-bottom:0.35rem; }
            .dokumen-card .card-info strong { color:#b87d1a; }

            .dokumen-card .card-actions { display:flex; gap:0.6rem; }
            .dokumen-card .card-actions .btn { font-size:13px; }

            .dokumen-card strong {
                color: #b87d1a;
                font-weight: 700;
            }



            @media (max-width: 576px) {
                .dokumen-card {
                    padding: 1rem;
                }
                .dokumen-card .card-title {
                    font-size: 0.95rem;
                }
                .dokumen-card .card-meta,
                .dokumen-card p {
                    font-size: 12px;
                }
                .dokumen-card .card-actions {
                    flex-wrap: wrap;
                    gap: 0.4rem;
                }
                .dokumen-card .card-actions .btn {
                    font-size: 11px;
                    padding: 0.3rem 0.5rem;
                }
            }
        </style>
        <div class="dokumen-card-grid">
            @forelse ($dokumen as $item)
                <div class="card dokumen-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <div class="card-title">{{ $item->jenis_dokumen }}</div>
                                <div class="card-meta">
                                    <i class="fa fa-file-alt me-1"></i>
                                    {{ $item->nomor ?: 'Tanpa Nomor' }}
                                </div>
                            </div>
                            <div class="text-end card-actions">
                                <a href="{{ route('pages.dokumen-persil.show', $item->dokumen_id) }}" class="btn btn-sm btn-outline-primary" title="Lihat Detail"><i class="fa fa-eye"></i></a>
                                @if(auth()->user()->isOperator())
                                    <a href="{{ route('pages.dokumen-persil.edit', $item->dokumen_id) }}" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('pages.dokumen-persil.destroy', $item->dokumen_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                @endif
                            </div>
                        </div>

                        <p class="mb-2 text-muted">
                            <strong><i class="fa fa-map-marker-alt text-warning"></i> Persil:</strong>
                            {{ $item->persil->kode_persil ?? '-' }}
                        </p>
                        <p class="mb-3 text-muted">
                            <strong><i class="fa fa-user text-info"></i> Pemilik:</strong>
                            {{ $item->persil->pemilik->nama ?? '-' }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="small text-muted">
                                <i class="fa fa-calendar"></i> {{ $item->created_at?->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card dokumen-card">
                    <div class="card-body">
                        <div class="card-title">Belum ada data dokumen persil.</div>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-4 mb-0">
            <nav aria-label="Pagination Dokumen Persil">
                {{ $dokumen->onEachSide(2)->links('pagination::bootstrap-5') }}
            </nav>
        </div>
        </div>
        {{-- End wrapper --}}
    </div>
</div>
@endsection
