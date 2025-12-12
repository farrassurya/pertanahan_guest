@extends('layouts.guest.app')

@section('title', 'Detail Warga - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase">Detail Data Warga</h2>
            <a href="{{ route('pages.warga.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <style>
            .warga-detail-card {
                background: #fff;
                border-radius: 20px;
                box-shadow: 0 8px 32px rgba(184, 125, 26, 0.12);
                border: 2px solid #f5e3c2;
                padding: 2.5rem 2rem 2rem 2rem;
                max-width: 900px;
                margin: 0 auto;
                position: relative;
            }
            .warga-detail-avatar {
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
            .warga-detail-title {
                text-align: center;
                font-size: 1.5rem;
                font-weight: bold;
                color: #b87d1a;
                margin-top: 55px;
                margin-bottom: 1.2rem;
                letter-spacing: 1px;
            }
            .warga-detail-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1.5rem;
                margin-bottom: 1.5rem;
            }
            .warga-detail-info {
                font-size: 1.08rem;
                margin-bottom: 0.7rem;
                color: #222;
            }
            .warga-detail-info strong {
                color: #b87d1a;
                min-width: 120px;
                display: inline-block;
            }
            .warga-detail-badge {
                display: inline-block;
                background: #b87d1a;
                color: #fff;
                font-size: 0.95rem;
                font-weight: 600;
                border-radius: 12px;
                padding: 0.2rem 0.8rem;
                margin-left: 0.5rem;
            }
            .warga-detail-actions {
                display: flex;
                justify-content: center;
                gap: 1rem;
                margin-top: 2rem;
            }
            .warga-detail-actions .btn {
                border-radius: 8px;
                font-weight: 600;
                font-size: 1.08rem;
                padding: 0.7rem 1.5rem;
                box-shadow: 0 2px 8px rgba(184, 125, 26, 0.08);
                border: none;
                transition: background 0.18s, color 0.18s, box-shadow 0.18s;
            }
            .warga-detail-actions .btn-warning {
                background: #ffe3a3;
                color: #b87d1a;
            }
            .warga-detail-actions .btn-warning:hover {
                background: #ffd37a;
                color: #a36b14;
            }
            .warga-detail-actions .btn-danger {
                background: #f7c2b7;
                color: #b87d1a;
            }
            .warga-detail-actions .btn-danger:hover {
                background: #f28b7b;
                color: #fff;
            }
        </style>
        <div class="warga-detail-card">
            <div class="warga-detail-avatar">
                <i class="fa fa-user"></i>
            </div>
            <div class="warga-detail-title">{{ $warga->nama }}</div>
            <div class="warga-detail-grid">
                <div>
                    <div class="warga-detail-info"><strong>No KTP</strong>: {{ $warga->no_ktp }}</div>
                    <div class="warga-detail-info"><strong>Jenis Kelamin</strong>: {{ $warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        <span class="warga-detail-badge">{{ $warga->jenis_kelamin == 'L' ? 'L' : 'P' }}</span>
                    </div>
                    <div class="warga-detail-info"><strong>Agama</strong>: {{ $warga->agama }}</div>
                </div>
                <div>
                    <div class="warga-detail-info"><strong>Pekerjaan</strong>: {{ $warga->pekerjaan ?? '-' }}</div>
                    <div class="warga-detail-info"><strong>Telepon</strong>: {{ $warga->telp ?? '-' }}</div>
                    <div class="warga-detail-info"><strong>Email</strong>: {{ $warga->email ?? '-' }}</div>
                </div>
            </div>
            <div class="warga-detail-actions">
                @if(auth()->user()->isOperator())
                    <a href="{{ route('pages.warga.edit', $warga->warga_id) }}" class="btn btn-warning">
                        <i class="fa fa-edit me-1"></i> Edit
                    </a>
                    <form action="{{ route('pages.warga.destroy', $warga->warga_id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus data?')">
                            <i class="fa fa-trash me-1"></i> Hapus
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
