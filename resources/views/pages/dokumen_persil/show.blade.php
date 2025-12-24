@extends('layouts.guest.app')

@section('title', 'Detail Dokumen Persil')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap');

            .detail-card {
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 4px 20px rgba(184, 125, 26, 0.12);
                border: 2px solid #f5e3c2;
                max-width: 950px;
                margin: 2rem auto;
                padding: 2rem 2.5rem;
                font-family: 'Montserrat', Arial, sans-serif;
            }

            .detail-title {
                font-size: 1.6rem;
                font-weight: 800;
                color: #222;
                margin-bottom: 1.5rem;
                letter-spacing: 0.5px;
                font-family: 'Montserrat', Arial, sans-serif;
            }

            .detail-row {
                display: grid;
                grid-template-columns: 200px 1fr;
                gap: 0.5rem;
                margin-bottom: 1rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid #e9ecef;
            }

            .detail-row:last-child {
                border-bottom: none;
            }

            .detail-label {
                font-weight: 700;
                color: #b87d1a;
                font-size: 0.95rem;
            }

            .detail-value {
                color: #333;
                font-size: 0.95rem;
            }

            .media-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 1rem;
                margin-top: 1rem;
            }

            .media-item {
                border: 1px solid #e0e0e0;
                border-radius: 12px;
                padding: 1.5rem;
                background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
                text-align: center;
                overflow: hidden;
                box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                transition: all 0.3s ease;
                position: relative;
            }

            .media-item:hover {
                transform: translateY(-4px);
                box-shadow: 0 8px 20px rgba(184, 125, 26, 0.15);
            }

            .media-item::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, #b87d1a 0%, #d4a055 100%);
            }

            .file-icon-wrapper {
                width: 80px;
                height: 80px;
                margin: 0 auto 1rem;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 12px;
                background: linear-gradient(135deg, #fef5e7 0%, #f9e9d2 100%);
            }

            .media-item img {
                max-width: 100%;
                height: auto;
                border-radius: 8px;
                margin-bottom: 1rem;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            }

            .media-item a {
                font-size: 0.85rem;
            }

            .media-item small {
                word-wrap: break-word;
                word-break: break-word;
                overflow-wrap: break-word;
                display: block;
                max-width: 100%;
                line-height: 1.4;
                font-weight: 500;
                color: #495057;
            }

            @media (max-width: 768px) {
                .detail-card {
                    padding: 1.5rem 1rem;
                    margin: 1rem auto;
                }
                .detail-title {
                    font-size: 1.2rem;
                }
                .detail-row {
                    grid-template-columns: 1fr;
                    gap: 0.25rem;
                }
                .media-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>

        <div class="detail-card">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
                <div class="detail-title" style="margin-bottom:0;">DETAIL DOKUMEN PERSIL</div>
                <a href="{{ route('pages.dokumen-persil.index') }}" class="btn" style="background:#6c757d; color:#fff; border:none; padding:0.5rem 1.3rem; border-radius:6px; text-decoration:none; font-weight:700; font-family:'Montserrat',Arial,sans-serif; font-size:1rem;">KEMBALI</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="detail-row">
                <div class="detail-label">ID Dokumen:</div>
                <div class="detail-value">{{ $dokumen->dokumen_id }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Jenis Dokumen:</div>
                <div class="detail-value">{{ $dokumen->jenis_dokumen }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Nomor Dokumen:</div>
                <div class="detail-value">{{ $dokumen->nomor ?: '-' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Persil:</div>
                <div class="detail-value">
                    <strong>{{ $dokumen->persil->kode_persil ?? '-' }}</strong>
                    <br>
                    <small class="text-muted">Luas: {{ $dokumen->persil->luas_m2 ?? '-' }} m<sup>2</sup></small>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Pemilik:</div>
                <div class="detail-value">{{ $dokumen->persil->pemilik->nama ?? '-' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Alamat Lahan:</div>
                <div class="detail-value">{{ $dokumen->persil->alamat_lahan ?? '-' }}</div>
            </div>

            @if($dokumen->keterangan)
            <div class="detail-row">
                <div class="detail-label">Keterangan:</div>
                <div class="detail-value">{{ $dokumen->keterangan }}</div>
            </div>
            @endif

            <div class="detail-row">
                <div class="detail-label">Dibuat:</div>
                <div class="detail-value">{{ $dokumen->created_at?->format('d M Y H:i') }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Diupdate:</div>
                <div class="detail-value">{{ $dokumen->updated_at?->format('d M Y H:i') }}</div>
            </div>

            @if(isset($media) && count($media) > 0)
            <div style="margin-top: 2rem;">
                <h5 style="font-weight: 700; color: #b87d1a; margin-bottom: 1rem; font-family: 'Montserrat', Arial, sans-serif;">File Dokumen:</h5>
                <div class="media-grid">
                    @foreach($media as $m)
                        @php
                            $fileClass = 'media-item';
                            $iconClass = 'fa fa-file';
                            $iconColor = '#6c757d';

                            if (str_contains($m->mime_type, 'pdf')) {
                                $fileClass .= ' pdf';
                                $iconClass = 'fa fa-file-pdf';
                                $iconColor = '#dc3545';
                            } elseif (str_contains($m->mime_type, 'word') || str_contains($m->file_name, '.doc')) {
                                $fileClass .= ' doc';
                                $iconClass = 'fa fa-file-word';
                                $iconColor = '#2b5797';
                            } elseif (str_contains($m->mime_type, 'excel') || str_contains($m->mime_type, 'spreadsheet') || str_contains($m->file_name, '.xls')) {
                                $fileClass .= ' excel';
                                $iconClass = 'fa fa-file-excel';
                                $iconColor = '#217346';
                            } elseif (str_contains($m->mime_type, 'image')) {
                                $fileClass .= ' image';
                            }
                        @endphp
                        <div class="{{ $fileClass }}">
                            @if(str_contains($m->mime_type, 'image'))
                                <img src="{{ asset('storage/media/' . $m->file_name) }}" alt="{{ $m->file_name }}">
                            @else
                                <div class="file-icon-wrapper">
                                    <i class="{{ $iconClass }} fa-3x" style="color: {{ $iconColor }};"></i>
                                </div>
                            @endif
                            <div>
                                <a href="{{ asset('storage/media/' . $m->file_name) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-download me-1"></i> Download
                                </a>
                            </div>
                            <small class="text-muted d-block mt-2">{{ $m->file_name }}</small>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <div style="margin-top: 2rem; display: flex; gap: 0.8rem; justify-content: flex-end;">
                @if(auth()->user()->isOperator())
                    <a href="{{ route('pages.dokumen-persil.edit', $dokumen->dokumen_id) }}" class="btn" style="background: #b87d1a; color: #fff; font-weight: 700; border: none; border-radius: 8px; padding: 0.65rem 1.5rem; text-decoration: none; font-family: 'Montserrat', Arial, sans-serif; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease;">
                        <i class="fa fa-edit"></i> EDIT
                    </a>
                    <form action="{{ route('pages.dokumen-persil.destroy', $dokumen->dokumen_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus dokumen ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn" style="background: #dc3545; color: #fff; font-weight: 700; border: none; border-radius: 8px; padding: 0.65rem 1.5rem; font-family: 'Montserrat', Arial, sans-serif; display: inline-flex; align-items: center; gap: 0.5rem; cursor: pointer; transition: all 0.3s ease;">
                            <i class="fa fa-trash"></i> HAPUS
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
