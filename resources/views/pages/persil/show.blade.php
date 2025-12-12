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

            /* Media Gallery Styles */
            .media-gallery-section {
                margin-top: 2rem;
                padding-top: 1.5rem;
                border-top: 2px solid #f5e3c2;
            }
            .media-gallery-title {
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
            .media-card {
                background: white;
                border-radius: 12px;
                padding: 1rem;
                box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
                border: 2px solid #f5e3c2;
                transition: all 0.3s ease;
                height: 100%;
            }
            .media-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 4px 20px rgba(184, 125, 26, 0.15);
                border-color: #d97706;
            }
            .media-preview {
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
            .media-preview img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .media-preview-doc {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 0.4rem;
            }
            .media-preview-doc i {
                font-size: 2.5rem;
                color: #d97706;
            }
            .media-preview-doc .doc-type {
                background: #d97706;
                color: white;
                padding: 0.25rem 0.6rem;
                border-radius: 5px;
                font-size: 0.75rem;
                font-weight: 600;
                text-transform: uppercase;
            }
            .media-filename {
                font-size: 0.8rem;
                font-weight: 600;
                color: #2c3e50;
                margin-bottom: 0.4rem;
                word-break: break-word;
                line-height: 1.3;
                min-height: 32px;
            }
            .media-filesize {
                font-size: 0.75rem;
                color: #7f8c8d;
                margin-bottom: 0.75rem;
            }
            .media-actions {
                display: flex;
                gap: 0.3rem;
                justify-content: center;
            }
            .btn-download {
                background: #34495e;
                color: white;
                border: none;
                padding: 0.4rem 0.6rem;
                border-radius: 5px;
                font-weight: 600;
                font-size: 0.75rem;
                transition: all 0.2s;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.3rem;
            }
            .btn-download:hover {
                background: #2c3e50;
                color: white;
            }
            .btn-delete-media {
                background: #e74c3c;
                color: white;
                border: none;
                padding: 0.4rem 0.6rem;
                border-radius: 5px;
                font-weight: 600;
                font-size: 0.75rem;
                transition: all 0.2s;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.3rem;
            }
            .btn-delete-media:hover {
                background: #c0392b;
            }
            .btn-upload-new {
                background: linear-gradient(135deg, #d97706 0%, #b87d1a 100%);
                color: white;
                border: none;
                padding: 0.65rem 1.5rem;
                border-radius: 8px;
                font-weight: 700;
                font-size: 0.95rem;
                transition: all 0.3s;
                box-shadow: 0 3px 12px rgba(184, 125, 26, 0.25);
                text-decoration: none;
                display: inline-block;
            }
            .btn-upload-new:hover {
                background: linear-gradient(135deg, #b87d1a 0%, #d97706 100%);
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 5px 18px rgba(184, 125, 26, 0.35);
            }
            @media (max-width: 768px) {
                .media-gallery-title {
                    font-size: 1rem;
                    padding: 0.6rem 1rem;
                }
                .media-preview {
                    height: 120px;
                }
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

            {{-- Media Gallery --}}
            @php
                $media = \App\Models\Media::where('ref_table', 'persil')
                    ->where('ref_id', $persil->persil_id)
                    ->orderBy('sort_order')
                    ->get();
            @endphp
            @if($media->count() > 0)
                <div class="media-gallery-section">
                    <div class="media-gallery-title">
                        <i class="fa fa-folder-open"></i> File Pendukung
                    </div>

                    <div class="row g-3">
                        @foreach($media as $m)
                            <div class="col-md-4 col-lg-3">
                                <div class="media-card">
                                    <div class="media-preview">
                                        @php
                                            $filePath = storage_path('app/public/media/' . $m->file_name);
                                            $fileExists = file_exists($filePath);
                                        @endphp
                                        @if($fileExists && str_starts_with($m->mime_type, 'image/'))
                                            <img src="{{ asset('storage/media/' . $m->file_name) }}" alt="{{ $m->file_name }}" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'media-preview-doc\'><i class=\'fa fa-image\' style=\'font-size:2.5rem;color:#e74c3c;\'></i><small style=\'color:#e74c3c;margin-top:0.5rem;\'>Gambar Error</small></div>';">
                                        @elseif($fileExists)
                                            <div class="media-preview-doc">
                                                <i class="fa fa-file-alt"></i>
                                                <span class="doc-type">{{ strtoupper(pathinfo($m->file_name, PATHINFO_EXTENSION)) }}</span>
                                            </div>
                                        @else
                                            <div class="media-preview-doc">
                                                <i class="fa fa-exclamation-triangle" style="color: #e74c3c;"></i>
                                                <small style="color: #e74c3c; font-size: 0.7rem;">File Tidak Ditemukan</small>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="media-filename" title="{{ $m->file_name }}">
                                        {{ Str::limit($m->file_name, 35) }}
                                    </div>

                                    @php
                                        $fileSize = $fileExists ? filesize($filePath) : 0;
                                        $fileSizeKB = round($fileSize / 1024, 2);
                                    @endphp
                                    <div class="media-filesize">
                                        {{ $fileSizeKB }} KB
                                    </div>

                                    <div class="media-actions">
                                        @if($fileExists)
                                            <a href="{{ asset('storage/media/' . $m->file_name) }}" download class="btn-download">
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                        @else
                                            <span class="btn-download" style="opacity: 0.5; cursor: not-allowed;">
                                                <i class="fa fa-download"></i> Download
                                            </span>
                                        @endif
                                        <form action="{{ route('pages.persil.media.delete', $m->media_id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus file ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete-media">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if(auth()->user()->isOperator())
                        <div class="text-center mt-4">
                            <a href="{{ route('pages.persil.edit', $persil->persil_id) }}" class="btn-upload-new">
                                <i class="fa fa-plus-circle"></i> Upload File Baru
                            </a>
                        </div>
                    @endif
                </div>
            @else
                <div class="media-gallery-section">
                    <div class="text-center">
                        <i class="fa fa-folder-open" style="font-size: 4rem; color: #bdc3c7; margin-bottom: 1rem;"></i>
                        <p style="color: #7f8c8d; font-size: 1.1rem; margin-bottom: 1.5rem;">Belum ada file pendukung</p>
                        @if(auth()->user()->isOperator())
                            <a href="{{ route('pages.persil.edit', $persil->persil_id) }}" class="btn-upload-new">
                                <i class="fa fa-plus-circle"></i> Upload File Baru
                            </a>
                        @endif
                    </div>
                </div>
            @endif

            @if(auth()->user()->isOperator())
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
            @endif
        </div>
    </div>
</div>
@endsection
