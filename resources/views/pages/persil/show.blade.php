@extends('layouts.guest.app')

@section('title', 'Detail Persil - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase">Detail Data Persil</h2>
            <a href="{{ route('pages.persil.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <style>
            .persil-detail-card {
                background: #fff;
                border-radius: 20px;
                box-shadow: 0 8px 32px rgba(184, 125, 26, 0.12);
                border: 2px solid #f5e3c2;
                padding: 2.5rem 2rem 2rem 2rem;
                max-width: 900px;
                margin: 0 auto;
                position: relative;
            }
            .persil-detail-avatar {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                background: #f5e3c2;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2.5rem;
                color: #b87d1a;
                box-shadow: 0 2px 12px rgba(184, 125, 26, 0.10);
                position: absolute;
                top: -40px;
                left: 50%;
                transform: translateX(-50%);
                border: 3px solid #fff;
            }
            .persil-detail-title {
                text-align: center;
                font-size: 1.8rem;
                font-weight: 700;
                color: #b87d1a;
                margin-top: 55px;
                margin-bottom: 1.2rem;
                letter-spacing: 1.2px;
                text-shadow: 0 2px 4px rgba(184, 125, 26, 0.1);
            }
            .persil-detail-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1.5rem;
                margin-bottom: 1.5rem;
            }
            .persil-detail-info {
                font-size: 1.05rem;
                margin-bottom: 0.7rem;
                color: #555;
            }
            .persil-detail-info strong {
                color: #b87d1a;
                min-width: 140px;
                display: inline-block;
                font-weight: 600;
            }
            .persil-detail-info .value-text {
                color: #222;
                font-weight: 400;
            }
            .persil-detail-actions {
                display: flex;
                justify-content: center;
                gap: 1rem;
                margin-top: 2rem;
            }
            .persil-detail-actions .btn {
                border-radius: 8px;
                font-weight: 600;
                font-size: 1.08rem;
                padding: 0.7rem 1.5rem;
                box-shadow: 0 2px 8px rgba(184, 125, 26, 0.08);
                border: none;
                transition: background 0.18s, color 0.18s, box-shadow 0.18s;
            }
            .persil-detail-actions .btn-warning {
                background: #ffe3a3;
                color: #b87d1a;
            }
            .persil-detail-actions .btn-warning:hover {
                background: #ffd37a;
                color: #a36b14;
            }
            .persil-detail-actions .btn-danger {
                background: #f7c2b7;
                color: #b87d1a;
            }
            .persil-detail-actions .btn-danger:hover {
                background: #f28b7b;
                color: #fff;
            }
        </style>

        <div class="persil-detail-card">
            <div class="persil-detail-avatar">
                <i class="fa fa-map-marked-alt"></i>
            </div>
            <div class="persil-detail-title">{{ $persil->kode_persil }}</div>
            <div class="persil-detail-grid">
                <div>
                    <div class="persil-detail-info"><strong>Kode Persil</strong>: <span class="value-text">{{ $persil->kode_persil }}</span></div>
                    <div class="persil-detail-info"><strong>Pemilik Warga</strong>: <span class="value-text">{{ $persil->pemilik->nama ?? '-' }}</span></div>
                    <div class="persil-detail-info"><strong>Luas (m2)</strong>: <span class="value-text">{{ $persil->luas_m2 }}</span></div>
                    <div class="persil-detail-info"><strong>Alamat Lahan</strong>: <span class="value-text">{{ $persil->alamat_lahan }}</span></div>
                </div>
                <div>
                    <div class="persil-detail-info"><strong>Penggunaan</strong>: <span class="value-text">{{ $persil->penggunaan }}</span></div>
                    <div class="persil-detail-info"><strong>RT</strong>: <span class="value-text">{{ $persil->rt }}</span></div>
                    <div class="persil-detail-info"><strong>RW</strong>: <span class="value-text">{{ $persil->rw }}</span></div>
                </div>
            </div>
            <div class="persil-detail-actions">
                <a href="{{ route('pages.persil.edit', $persil->persil_id) }}" class="btn btn-warning">
                    <i class="fa fa-edit me-1"></i> Edit
                </a>
                <form action="{{ route('pages.persil.destroy', $persil->persil_id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus data?')">
                        <i class="fa fa-trash me-1"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
