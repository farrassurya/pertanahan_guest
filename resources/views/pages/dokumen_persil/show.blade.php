@extends('layouts.guest.app')

@section('title', 'Detail Dokumen Persil')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase">Detail Dokumen Persil</h2>
            <a href="{{ route('pages.dokumen-persil.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <style>
            .dokumen-detail-card {
                background: #fff;
                border-radius: 20px;
                box-shadow: 0 8px 32px rgba(184, 125, 26, 0.12);
                border: 2px solid #f5e3c2;
                padding: 2.5rem 2rem 2rem 2rem;
                max-width: 900px;
                margin: 0 auto;
                position: relative;
            }
            .dokumen-detail-avatar {
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
            .dokumen-detail-title {
                text-align: center;
                font-size: 1.8rem;
                font-weight: 700;
                color: #b87d1a;
                margin-top: 55px;
                margin-bottom: 1.2rem;
                letter-spacing: 1.2px;
                text-shadow: 0 2px 4px rgba(184, 125, 26, 0.1);
            }
            .dokumen-detail-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1.5rem;
                margin-bottom: 1.5rem;
            }
            .dokumen-detail-info {
                font-size: 1.05rem;
                margin-bottom: 0.7rem;
                color: #555;
            }
            .dokumen-detail-info strong {
                color: #b87d1a;
                min-width: 140px;
                display: inline-block;
                font-weight: 600;
            }
            .dokumen-detail-info .value-text {
                color: #222;
                font-weight: 400;
            }

            .dokumen-detail-info .value-text {
                color: #222;
                font-weight: 400;
            }
            .dokumen-detail-actions {
                display: flex;
                justify-content: center;
                gap: 1rem;
                margin-top: 2rem;
            }
            .dokumen-detail-actions .btn {
                border-radius: 8px;
                font-weight: 600;
                font-size: 1.08rem;
                padding: 0.7rem 1.5rem;
                box-shadow: 0 2px 8px rgba(184, 125, 26, 0.08);
                border: none;
                transition: background 0.18s, color 0.18s, box-shadow 0.18s;
            }
            .dokumen-detail-actions .btn-warning {
                background: #b87d1a;
                color: #fff;
            }
            .dokumen-detail-actions .btn-warning:hover {
                background: #a36b14;
                color: #fff;
            }
            .dokumen-detail-actions .btn-danger {
                background: #dc3545;
                color: #fff;
            }
            .dokumen-detail-actions .btn-danger:hover {
                background: #c82333;
                color: #fff;
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
            }
            .file-download-btn:hover {
                background: #a36b14;
                color: white;
            }

            @media (max-width: 768px) {
                .dokumen-detail-card {
                    padding: 2rem 1.5rem 1.5rem 1.5rem;
                }
                .dokumen-detail-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }
                .dokumen-detail-title {
                    font-size: 1.4rem;
                }
            }
        </style>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="dokumen-detail-card">
            <div class="dokumen-detail-avatar">
                <i class="fa fa-file-alt"></i>
            </div>

            <div class="dokumen-detail-title">
                {{ $dokumen->nomor ?: 'DOK-' . $dokumen->dokumen_id }}
            </div>

            <div class="dokumen-detail-grid">
                <div>
                    <div class="dokumen-detail-info">
                        <strong>Jenis Dokumen</strong><br>
                        <span class="value-text">: {{ $dokumen->jenis_dokumen }}</span>
                    </div>
                    <div class="dokumen-detail-info">
                        <strong>Nomor Dokumen</strong><br>
                        <span class="value-text">: {{ $dokumen->nomor ?: '-' }}</span>
                    </div>
                    <div class="dokumen-detail-info">
                        <strong>Persil</strong><br>
                        <span class="value-text">: {{ $dokumen->persil->kode_persil ?? '-' }}</span>
                    </div>
                    <div class="dokumen-detail-info">
                        <strong>Pemilik</strong><br>
                        <span class="value-text">: {{ $dokumen->persil->pemilik->nama ?? '-' }}</span>
                    </div>
                </div>
                <div>
                    <div class="dokumen-detail-info">
                        <strong>Alamat Lahan</strong><br>
                        <span class="value-text">: {{ $dokumen->persil->alamat_lahan ?? '-' }}</span>
                    </div>
                    @if($dokumen->keterangan)
                    <div class="dokumen-detail-info">
                        <strong>Keterangan</strong><br>
                        <span class="value-text">: {{ $dokumen->keterangan }}</span>
                    </div>
                    @endif
                    <div class="dokumen-detail-info">
                        <strong>Dibuat</strong><br>
                        <span class="value-text">: {{ $dokumen->created_at?->format('d M Y H:i') }}</span>
                    </div>
                </div>
            </div>

            @if(isset($media) && count($media) > 0)
            <div class="file-section">
                <div class="file-section-title">
                    <i class="fa fa-folder-open me-2"></i> File Pendukung
                </div>
                <div class="row g-3">
                    @foreach($media as $m)
                        @php
                            $iconClass = 'fa fa-file';
                            $iconColor = '#6c757d';

                            if (str_contains($m->mime_type, 'pdf')) {
                                $iconClass = 'fa fa-file-pdf';
                                $iconColor = '#dc3545';
                            } elseif (str_contains($m->mime_type, 'word') || str_contains($m->file_name, '.doc')) {
                                $iconClass = 'fa fa-file-word';
                                $iconColor = '#2b5797';
                            } elseif (str_contains($m->mime_type, 'excel') || str_contains($m->mime_type, 'spreadsheet') || str_contains($m->file_name, '.xls')) {
                                $iconClass = 'fa fa-file-excel';
                                $iconColor = '#217346';
                            }
                        @endphp
                        <div class="col-md-3 col-sm-6">
                            <div class="file-card">
                                <div class="file-preview">
                                    @if(str_contains($m->mime_type, 'image'))
                                        <img src="{{ asset('storage/media/' . $m->file_name) }}" alt="{{ $m->file_name }}">
                                    @else
                                        <i class="{{ $iconClass }} file-icon-large" style="color: {{ $iconColor }};"></i>
                                    @endif
                                </div>
                                <div class="file-name">{{ $m->file_name }}</div>
                                <a href="{{ asset('storage/media/' . $m->file_name) }}" target="_blank" class="btn file-download-btn">
                                    <i class="fa fa-download me-1"></i> Download
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if(auth()->user()->isOperator())
            <div class="dokumen-detail-actions">
                <a href="{{ route('pages.dokumen-persil.edit', $dokumen->dokumen_id) }}" class="btn btn-warning">
                    <i class="fa fa-edit me-1"></i> EDIT
                </a>
                <form action="{{ route('pages.dokumen-persil.destroy', $dokumen->dokumen_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus dokumen ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash me-1"></i> HAPUS
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
