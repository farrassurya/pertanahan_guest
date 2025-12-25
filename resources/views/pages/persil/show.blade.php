@extends('layouts.guest.app')

@section('title', 'Detail Persil')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase">Detail Persil</h2>
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
                background: #b87d1a;
                color: #fff;
            }
            .persil-detail-actions .btn-warning:hover {
                background: #a36b14;
                color: #fff;
                box-shadow: 0 4px 12px rgba(184, 125, 26, 0.25);
            }
            .persil-detail-actions .btn-danger {
                background: #dc3545;
                color: #fff;
            }
            .persil-detail-actions .btn-danger:hover {
                background: #c82333;
                box-shadow: 0 4px 12px rgba(220, 53, 69, 0.25);
            }

            /* File Section Styles */
            .file-section {
                margin-top: 2rem;
                padding-top: 1.5rem;
                border-top: 2px solid #f5e3c2;
            }
            .file-section-title {
                background: linear-gradient(135deg, #d97706 0%, #b87d1a 100%);
                color: white;
                padding: 0.75rem 1.2rem;
                border-radius: 10px;
                font-size: 1.1rem;
                font-weight: 700;
                text-align: center;
                margin-bottom: 1.5rem;
                box-shadow: 0 3px 12px rgba(184, 125, 26, 0.25);
            }
            .file-card {
                background: white;
                border-radius: 12px;
                padding: 1rem;
                box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
                border: 2px solid #f5e3c2;
                transition: all 0.3s ease;
                height: 100%;
                display: flex;
                flex-direction: column;
            }
            .file-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 4px 20px rgba(184, 125, 26, 0.15);
                border-color: #d97706;
            }
            .file-preview {
                width: 100%;
                height: 140px;
                border-radius: 8px;
                overflow: hidden;
                margin-bottom: 0.75rem;
                background: #f5f5f5;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
            }
            .file-preview img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .file-icon-large {
                font-size: 3.5rem;
            }
            .file-name {
                font-size: 0.85rem;
                color: #555;
                word-break: break-word;
                margin-bottom: 0.5rem;
                line-height: 1.4;
                min-height: 2.8rem;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            .file-download-btn {
                width: 100%;
                background: #b87d1a;
                color: white;
                border: none;
                padding: 0.5rem;
                border-radius: 6px;
                font-weight: 600;
                transition: all 0.3s;
                margin-top: auto;
            }
            .file-download-btn:hover {
                background: #a36b14;
                color: white;
            }

            @media (max-width: 768px) {
                .persil-detail-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }
                .persil-detail-card {
                    padding: 2rem 1.5rem 1.5rem 1.5rem;
                }
                .persil-detail-title {
                    font-size: 1.4rem;
                }
                .persil-detail-actions {
                    flex-direction: column;
                    gap: 0.7rem;
                }
                .persil-detail-actions .btn {
                    width: 100%;
                }
            }
        </style>

        <div class="persil-detail-card">
            <div class="persil-detail-avatar">
                <i class="fa fa-map-marked-alt"></i>
            </div>

            <h3 class="persil-detail-title">{{ $persil->kode_persil }}</h3>

            <div class="persil-detail-grid">
                <div>
                    <p class="persil-detail-info">
                        <strong>Kode Persil</strong>
                        <span class="value-text">{{ $persil->kode_persil }}</span>
                    </p>
                    <p class="persil-detail-info">
                        <strong>Pemilik</strong>
                        <span class="value-text">{{ $persil->pemilik->nama ?? 'Tidak ada' }}</span>
                    </p>
                    <p class="persil-detail-info">
                        <strong>Luas (m²)</strong>
                        <span class="value-text">{{ number_format($persil->luas_m2, 0, ',', '.') }} m²</span>
                    </p>
                    <p class="persil-detail-info">
                        <strong>Penggunaan</strong>
                        <span class="value-text">{{ $persil->penggunaan }}</span>
                    </p>
                </div>
                <div>
                    <p class="persil-detail-info">
                        <strong>RT</strong>
                        <span class="value-text">{{ $persil->rt }}</span>
                    </p>
                    <p class="persil-detail-info">
                        <strong>RW</strong>
                        <span class="value-text">{{ $persil->rw }}</span>
                    </p>
                    <p class="persil-detail-info">
                        <strong>Alamat Lahan</strong>
                        <span class="value-text">{{ $persil->alamat_lahan }}</span>
                    </p>
                </div>
            </div>

            {{-- File Section --}}
            @if($persil->media && $persil->media->count() > 0)
            <div class="file-section">
                <div class="file-section-title">
                    <i class="fa fa-folder-open me-2"></i> File Terlampir
                </div>
                <div class="row g-3">
                    @foreach($persil->media as $media)
                        @php
                            $iconClass = 'fa fa-file';
                            $iconColor = '#6c757d';
                            
                            if (str_contains($media->mime_type, 'pdf')) {
                                $iconClass = 'fa fa-file-pdf';
                                $iconColor = '#dc3545';
                            } elseif (str_contains($media->mime_type, 'word') || str_contains($media->file_name, '.doc')) {
                                $iconClass = 'fa fa-file-word';
                                $iconColor = '#2b5797';
                            } elseif (str_contains($media->mime_type, 'excel') || str_contains($media->mime_type, 'spreadsheet') || str_contains($media->file_name, '.xls')) {
                                $iconClass = 'fa fa-file-excel';
                                $iconColor = '#217346';
                            }
                        @endphp
                        <div class="col-md-3 col-sm-6">
                            <div class="file-card">
                                <div class="file-preview">
                                    @if(str_contains($media->mime_type, 'image'))
                                        <img src="{{ asset('storage/media/' . $media->file_name) }}" alt="{{ $media->file_name }}">
                                    @else
                                        <i class="{{ $iconClass }} file-icon-large" style="color: {{ $iconColor }};"></i>
                                    @endif
                                </div>
                                <div class="file-name">{{ $media->file_name }}</div>
                                <a href="{{ asset('storage/media/' . $media->file_name) }}" target="_blank" class="btn file-download-btn">
                                    <i class="fa fa-download me-1"></i> DOWNLOAD
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if(auth()->user()->role === 'operator')
            <div class="persil-detail-actions">
                <a href="{{ route('pages.persil.edit', $persil->persil_id) }}" class="btn btn-warning">
                    <i class="fa fa-edit me-1"></i> Edit Persil
                </a>
                <form action="{{ route('pages.persil.destroy', $persil->persil_id) }}" method="POST" style="display: inline;"
                    onsubmit="return confirm('Yakin ingin menghapus data persil ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-alt me-1"></i> Hapus Persil
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
