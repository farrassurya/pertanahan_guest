@extends('layouts.guest.app')

@section('title', 'Detail Peta Persil - Pertanahan')

@section('content')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('pages.peta-persil.index') }}" class="btn btn-outline-secondary me-3">
                <i class="fa fa-arrow-left"></i>
            </a>
            <h2 class="text-uppercase mb-0">Detail Peta Persil</h2>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- Map Preview with Tautan Terkait -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                    <div class="card-body p-4">
                        <h5 class="mb-3"><i class="fa fa-map me-2 text-primary"></i>Visualisasi Peta</h5>
                        @if($petaPersil->geojson)
                        <div id="petaMap" style="height: 400px; border-radius: 12px;"></div>
                        @else
                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-triangle me-2"></i>Tidak ada data koordinat GeoJSON untuk ditampilkan.
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Tautan Terkait di bawah peta -->
                <div class="card info-peta-card mt-3">
                    <div class="card-header-custom">
                        <i class="fa fa-link me-2"></i>Tautan Terkait
                    </div>
                    <div class="card-body p-4" style="position: relative; z-index: 1;">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <a href="{{ route('pages.persil.show', $petaPersil->persil_id) }}" class="btn w-100" style="background: linear-gradient(135deg, #d97706 0%, #b87d1a 100%); color: white; border: none; font-weight: 600; border-radius: 8px; padding: 0.75rem 1rem; box-shadow: 0 3px 12px rgba(184, 125, 26, 0.25); transition: all 0.3s;">
                                    <i class="fa fa-map-marked-alt me-2"></i>Lihat Detail Persil
                                </a>
                            </div>
                            @if($petaPersil->geojson)
                            <div class="col-md-6">
                                <button class="btn w-100" style="background: linear-gradient(135deg, #b87d1a 0%, #d97706 100%); color: white; border: none; font-weight: 600; border-radius: 8px; padding: 0.75rem 1rem; box-shadow: 0 3px 12px rgba(184, 125, 26, 0.25); transition: all 0.3s;" onclick="downloadGeoJSON()">
                                    <i class="fa fa-download me-2"></i>Download GeoJSON
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Details -->
            <div class="col-lg-4">
                <style>
                    .info-peta-card {
                        background: linear-gradient(180deg, #fff, #fbfbfd);
                        border: 0;
                        border-radius: 12px;
                        box-shadow: 0 8px 28px rgba(11,18,35,0.06);
                        position: relative;
                        overflow: hidden;
                    }
                    .info-peta-card::before {
                        content: '';
                        position: absolute;
                        right: -40px;
                        top: -24px;
                        width: 120px;
                        height: 120px;
                        background: radial-gradient(circle at 30% 30%, rgba(184,125,26,0.12), rgba(184,125,26,0.06));
                        transform: rotate(18deg);
                    }
                    .info-peta-card .card-header-custom {
                        background: linear-gradient(135deg, #b87d1a 0%, #d4a055 100%);
                        color: white;
                        padding: 1rem 1.5rem;
                        border-radius: 12px 12px 0 0;
                        font-weight: 700;
                        text-transform: uppercase;
                        letter-spacing: 0.5px;
                        font-size: 0.95rem;
                    }
                    .info-label {
                        font-size: 0.8rem;
                        text-transform: uppercase;
                        letter-spacing: 0.5px;
                        color: #6c757d;
                        font-weight: 600;
                        margin-bottom: 0.4rem;
                    }
                    .info-value {
                        color: #b87d1a;
                        font-weight: 700;
                        font-size: 1.1rem;
                    }
                    .info-box {
                        background: linear-gradient(135deg, #f8f4ed 0%, #fdfbf7 100%);
                        border: 2px solid #f0e9dc;
                        border-radius: 10px;
                        padding: 1rem;
                        transition: all 0.3s ease;
                    }
                    .info-box:hover {
                        transform: translateY(-2px);
                        box-shadow: 0 4px 12px rgba(184,125,26,0.15);
                    }
                    .luas-highlight {
                        background: linear-gradient(135deg, #d97706 0%, #b87d1a 100%);
                        color: white;
                        padding: 1.2rem;
                        border-radius: 10px;
                        box-shadow: 0 4px 12px rgba(184,125,26,0.3);
                        text-align: center;
                    }
                    .badge-penggunaan {
                        background: linear-gradient(135deg, #c8bf13 0%, #d97706 100%);
                        color: white;
                        padding: 0.5rem 1rem;
                        border-radius: 20px;
                        font-size: 0.85rem;
                        font-weight: 600;
                        box-shadow: 0 2px 8px rgba(184,125,26,0.3);
                    }
                </style>

                <div class="card info-peta-card mb-4">
                    <div class="card-header-custom">
                        <i class="fa fa-info-circle me-2"></i>Informasi Peta
                    </div>
                    <div class="card-body p-4" style="position: relative; z-index: 1;">
                        <div class="mb-4">
                            <div class="info-label">Kode Persil</div>
                            <div class="info-value" style="font-size: 1.3rem;">{{ $petaPersil->persil->kode_persil ?? '-' }}</div>
                        </div>

                        <div class="mb-4">
                            <div class="info-label">Alamat Lahan</div>
                            <p class="mb-0" style="color: #495057;">{{ $petaPersil->persil->alamat_lahan ?? '-' }}</p>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="info-box text-center">
                                    <div class="info-label">Panjang</div>
                                    <div class="info-value">{{ $petaPersil->panjang_m ?? '-' }} m</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="info-box text-center">
                                    <div class="info-label">Lebar</div>
                                    <div class="info-value">{{ $petaPersil->lebar_m ?? '-' }} m</div>
                                </div>
                            </div>
                        </div>

                        @if($petaPersil->getLuas())
                        <div class="mb-4">
                            <div class="luas-highlight">
                                <div style="font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Luas Estimasi</div>
                                <div style="font-size: 1.5rem; font-weight: 800;">{{ number_format($petaPersil->getLuas(), 2) }} m²</div>
                            </div>
                        </div>
                        @endif

                        <div class="mb-4">
                            <div class="info-label">RT / RW</div>
                            <div style="color: #495057; font-weight: 600;">{{ $petaPersil->persil->rt ?? '-' }} / {{ $petaPersil->persil->rw ?? '-' }}</div>
                        </div>

                        <div class="mb-4">
                            <div class="info-label">Penggunaan</div>
                            <span class="badge-penggunaan">
                                <i class="fa fa-tag me-1"></i> {{ $petaPersil->persil->penggunaan ?? '-' }}
                            </span>
                        </div>

                        <div class="border-top pt-3 mb-3" style="border-color: #f0e9dc !important;">
                            <small class="text-muted d-block" style="font-size: 0.8rem;">
                                <i class="fa fa-calendar-plus me-1"></i> Dibuat: {{ $petaPersil->created_at->format('d M Y H:i') }}
                            </small>
                            <small class="text-muted d-block" style="font-size: 0.8rem;">
                                <i class="fa fa-calendar-check me-1"></i> Update: {{ $petaPersil->updated_at->format('d M Y H:i') }}
                            </small>
                        </div>

                        @if(auth()->user()->role === 'operator')
                        <div class="d-flex gap-2">
                            <a href="{{ route('pages.peta-persil.edit', $petaPersil->peta_id) }}" class="btn flex-fill" style="background: linear-gradient(135deg, #d97706 0%, #b87d1a 100%); color: white; border: none; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; border-radius: 8px; box-shadow: 0 3px 12px rgba(184, 125, 26, 0.25); transition: all 0.3s;">
                                <i class="fa fa-edit me-1"></i> EDIT
                            </a>
                            <form action="{{ route('pages.peta-persil.destroy', $petaPersil->peta_id) }}" method="POST" class="flex-fill" onsubmit="return confirm('Yakin hapus peta ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn w-100" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); color: white; border: none; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; border-radius: 8px; box-shadow: 0 3px 12px rgba(220, 53, 69, 0.25); transition: all 0.3s;">
                                    <i class="fa fa-trash me-1"></i> HAPUS
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
@if($petaPersil->geojson)
    // Initialize map
    const map = L.map('petaMap').setView([-2.5489, 118.0149], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Load GeoJSON
    const geoData = @json($petaPersil->getGeoJsonData());
    if (geoData) {
        const layer = L.geoJSON(geoData, {
            style: {
                color: '#b87d1a',
                weight: 3,
                fillColor: '#d4a055',
                fillOpacity: 0.5
            }
        }).addTo(map);

        map.fitBounds(layer.getBounds());

        // Add popup
        layer.bindPopup(`
            <div style="min-width: 200px;">
                <h6 style="color: #b87d1a; margin-bottom: 8px;">{{ $petaPersil->persil->kode_persil ?? '-' }}</h6>
                <p style="margin: 4px 0; font-size: 0.9rem;">{{ $petaPersil->persil->alamat_lahan ?? '-' }}</p>
                <p style="margin: 4px 0; font-size: 0.9rem;"><strong>Ukuran:</strong> {{ $petaPersil->panjang_m ?? '-' }} m × {{ $petaPersil->lebar_m ?? '-' }} m</p>
                @if($petaPersil->getLuas())
                <p style="margin: 4px 0; font-size: 0.9rem;"><strong>Luas:</strong> {{ number_format($petaPersil->getLuas(), 2) }} m²</p>
                @endif
            </div>
        `).openPopup();
    }

    function downloadGeoJSON() {
        const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(geoData, null, 2));
        const downloadAnchorNode = document.createElement('a');
        downloadAnchorNode.setAttribute("href", dataStr);
        downloadAnchorNode.setAttribute("download", "peta_{{ $petaPersil->persil->kode_persil ?? 'persil' }}.geojson");
        document.body.appendChild(downloadAnchorNode);
        downloadAnchorNode.click();
        downloadAnchorNode.remove();
    }
@endif
</script>
@endsection
