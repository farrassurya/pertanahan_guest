@extends('layouts.guest.app')

@section('title', 'Detail Persil - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <h2 class="text-uppercase mb-0">Detail Data Persil</h2>
            <a href="{{ route('pages.persil.index') }}\" class="btn btn-secondary w-100 w-md-auto">
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
            .persil-media-section {
                margin-top: 2rem;
                padding-top: 2rem;
                border-top: 2px solid #f5e3c2;
            }
            .persil-media-section h5 {
                color: #b87d1a;
                font-weight: 600;
                margin-bottom: 1rem;
            }

            @media (max-width: 768px) {
                .persil-detail-card {
                    padding: 2rem 1rem 1.5rem;
                    margin: 1rem;
                }
                .persil-detail-avatar {
                    width: 60px;
                    height: 60px;
                    font-size: 2rem;
                    top: -30px;
                }
                .persil-detail-title {
                    font-size: 1.3rem;
                    margin-top: 40px;
                    letter-spacing: 0.5px;
                }
                .persil-detail-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }
                .persil-detail-info {
                    font-size: 0.9rem;
                }
                .persil-detail-info strong {
                    min-width: 100px;
                    display: block;
                    margin-bottom: 0.2rem;
                }
                .persil-detail-actions {
                    flex-direction: column;
                    gap: 0.75rem;
                }
                .persil-detail-actions .btn {
                    width: 100%;
                    font-size: 0.95rem;
                    padding: 0.6rem 1rem;
                }
            }
        </style>

        <div class="persil-detail-card">
            <div class="persil-detail-avatar">
                <i class="fa fa-file-alt"></i>
            </div>
            <div class="persil-detail-title">{{ $persil->kode_persil }}</div>

            <div class="persil-detail-grid">
                <div>
                    <div class="persil-detail-info"><strong>Kode Persil</strong>: <span class="value-text">{{ $persil->kode_persil }}</span></div>
                    <div class="persil-detail-info"><strong>Pemilik Warga</strong>: <span class="value-text">{{ optional($persil->pemilik)->nama ?? '-' }}</span></div>
                    <div class="persil-detail-info"><strong>Luas (m2)</strong>: <span class="value-text">{{ $persil->luas_m2 }}</span></div>
                    <div class="persil-detail-info"><strong>Alamat Lahan</strong>: <span class="value-text">{{ $persil->alamat_lahan }}</span></div>
                </div>
                <div>
                    <div class="persil-detail-info"><strong>Penggunaan</strong>: <span class="value-text">{{ $persil->penggunaan }}</span></div>
                    <div class="persil-detail-info"><strong>RT</strong>: <span class="value-text">{{ $persil->rt }}</span></div>
                    <div class="persil-detail-info"><strong>RW</strong>: <span class="value-text">{{ $persil->rw }}</span></div>
                </div>
            </div>

            @if($persil->media && $persil->media->count())
            <div class="persil-media-section">
                <h5><i class="fa fa-image me-2"></i>Media</h5>
                <div class="row">
                    @foreach($persil->media as $m)
                        <div class="col-md-3 mb-3">
                            <div style="border:1px solid #f5e3c2; padding:8px; border-radius:8px; background:#fff; box-shadow: 0 2px 8px rgba(184, 125, 26, 0.08);">
                                <img src="{{ $m->file_url }}" alt="{{ $m->caption }}" style="width:100%; height:120px; object-fit:cover; border-radius:6px;" />
                                @if($m->caption)
                                    <div style="padding-top:6px; font-size:0.9rem; color:#666;">{{ $m->caption }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

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
