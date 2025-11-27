@extends('layouts.guest.app')

@section('title', 'Data Persil - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex flex-row justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase mb-0">Data Persil</h2>
            <a href="{{ route('pages.persil.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-1"></i> Tambah Persil
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
        <style>
            /* make grid similar to jenis penggunaan cards */
            .persil-card-grid { display: grid; grid-template-columns: repeat(auto-fill,minmax(300px,1fr)); gap: 1.25rem; }

            @media (max-width: 576px) {
                .persil-card-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }
            }

            .persil-card {
                border: 0; border-radius: 12px; overflow: hidden;
                background: linear-gradient(180deg, #ffffff 0%, #fbfbfd 100%);
                box-shadow: 0 8px 30px rgba(11,18,35,0.06);
                transition: transform .28s cubic-bezier(.2,.9,.3,1), box-shadow .28s ease;
                position: relative; border-left: 6px solid rgba(184,125,26,0.14);
                min-height: 140px; padding: 1.1rem 1.25rem;
            }
            .persil-card:hover { transform: translateY(-8px); box-shadow: 0 18px 48px rgba(11,18,35,0.12); }

            .persil-card .card-title { font-weight:700; letter-spacing:.2px; font-family: 'Poppins', sans-serif; font-size:1.05rem; color:#1f2d3d; }
            .persil-card .card-meta { font-size: 13px; color:#6c757d; }

            .persil-card .card-body { padding: 0; }
            .persil-card .card-row { display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.6rem; }
            .persil-card .card-info { color:#222; margin-bottom:0.35rem; }
            .persil-card .card-info strong { color:#b87d1a; }

            .persil-card .card-actions { display:flex; gap:0.6rem; }
            .persil-card .card-actions .btn { font-size:13px; }

            .persil-card::after{ content:''; position:absolute; left:0; top:0; bottom:0; width:6px; background: linear-gradient(180deg,#b87d1a,#e6b66a); opacity:.08; }

            @media (max-width: 576px) {
                .persil-card {
                    padding: 1rem;
                }
                .persil-card .card-title {
                    font-size: 0.95rem;
                }
                .persil-card .card-meta,
                .persil-card p {
                    font-size: 12px;
                }
                .persil-card .card-actions {
                    flex-wrap: wrap;
                    gap: 0.4rem;
                }
                .persil-card .card-actions .btn {
                    font-size: 11px;
                    padding: 0.3rem 0.5rem;
                }
            }
        </style>
        <div class="persil-card-grid">
            @forelse ($persil as $item)
                <div class="card persil-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <div class="card-title">{{ $item->kode_persil }}</div>
                                <div class="card-meta">Persil ID: {{ $item->persil_id }}</div>
                            </div>
                            <div class="text-end card-actions">
                                <a href="{{ route('pages.persil.show', $item->persil_id) }}" class="btn btn-sm btn-outline-primary" title="Lihat Detail"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('pages.persil.edit', $item->persil_id) }}" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('pages.persil.destroy', $item->persil_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>

                        <p class="mb-2 text-muted"> <strong>Pemilik:</strong> {{ $item->pemilik->nama ?? '-' }}</p>
                        <p class="mb-2 text-muted"> <strong>Luas:</strong> {{ $item->luas_m2 }} m<sup>2</sup></p>
                        <p class="mb-2 text-muted"> <strong>Penggunaan:</strong> {{ $item->penggunaan }}</p>
                        <p class="mb-2 text-muted"> <strong>Alamat:</strong> {{ $item->alamat_lahan }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="small text-muted">RT/RW: {{ $item->rt }}/{{ $item->rw }}</div>
                            <div class="small text-muted">Dibuat: {{ $item->created_at?->format('d M Y') }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card persil-card">
                    <div class="card-body">
                        <div class="card-title">Belum ada data persil.</div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
