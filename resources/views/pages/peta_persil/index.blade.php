@extends('layouts.guest.app')

@section('title', 'Peta Persil - Pertanahan')

@section('content')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex flex-row justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase mb-0">Peta Persil</h2>
            <a href="{{ route('pages.peta-persil.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-1"></i> Tambah Peta
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Wrapper with border --}}
        <div class="position-relative rounded-3 p-4 bg-white mb-4" style="border: 1px solid #e0e0e0; box-shadow: 0 4px 12px rgba(0,0,0,0.08), 0 2px 4px rgba(0,0,0,0.05); background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);">
            {{-- Top accent border --}}
            <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #b87d1a 0%, #d4a055 50%, #b87d1a 100%); border-radius: 8px 8px 0 0;"></div>

            {{-- Filter --}}
            <div class="mb-4">
                <style>
                    .btn-clear-custom-peta:hover { background-color: #b87d1a !important; color: white !important; }
                    .btn-clear-custom-peta:active { background-color: #a36b14 !important; color: white !important; }
                </style>
                <form method="GET" action="{{ route('pages.peta-persil.index') }}" class="d-flex align-items-end" style="gap: 0.5rem;">
                    <div>
                        <select name="persil_id" class="form-select form-select-lg" onchange="this.form.submit()" style="border-radius: 12px; min-width: 250px; padding: 12px 20px; font-size: 1rem; cursor: pointer;">
                            <option value="">Semua Persil</option>
                            @foreach($persils as $p)
                                <option value="{{ $p->persil_id }}" {{ request('persil_id') == $p->persil_id ? 'selected' : '' }}>
                                    {{ $p->kode_persil }} - {{ $p->alamat_lahan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="min-width: 250px;">
                        <div class="input-group input-group-lg">
                            <input type="text" name="search" class="form-control" placeholder="Cari kode/alamat..." value="{{ request('search') }}" style="border-radius: 12px 0 0 12px; padding: 12px 20px; font-size: 1rem;">
                            <button type="submit" class="btn" style="background-color: white; border: 1px solid #ced4da; border-radius: 0 {{ request('search') ? '' : '12px 12px' }} 0; border-left: 1px solid #ced4da; color: #6c757d;">
                                <i class="fa fa-search"></i>
                            </button>
                            @if(request('search'))
                            <a href="{{ route('pages.peta-persil.index', ['persil_id' => request('persil_id')]) }}" class="btn btn-clear-custom-peta" style="background-color: white; color: #b87d1a; border: 1px solid #ced4da; border-radius: 0 12px 12px 0; border-left: 1px solid #ced4da; font-weight: normal; transition: all 0.3s ease;">
                                Clear
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

        <style>
            /* Card Grid Styling - Responsive untuk semua ukuran layar */
            .peta-card-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 1.25rem;
            }

            /* Desktop sedang */
            @media (max-width: 1400px) {
                .peta-card-grid {
                    grid-template-columns: repeat(3, 1fr);
                    gap: 1rem;
                }
            }

            /* Desktop kecil */
            @media (max-width: 1024px) {
                .peta-card-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 1rem;
                }
            }

            /* Tablet */
            @media (max-width: 768px) {
                .peta-card-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }
            }

            /* Mobile */
            @media (max-width: 576px) {
                .peta-card-grid {
                    grid-template-columns: 1fr;
                    gap: 0.875rem;
                }
            }

            .peta-card {
                border: 0;
                border-radius: 12px;
                padding: 1.5rem;
                background: linear-gradient(180deg, #fff, #fbfbfd);
                box-shadow: 0 8px 28px rgba(11,18,35,0.06);
                transition: transform .28s cubic-bezier(.2,.9,.3,1), box-shadow .28s ease;
                position: relative;
                overflow: hidden;
            }
            .peta-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 18px 48px rgba(11,18,35,0.12);
            }

            /* Accent corner */
            .peta-card::before {
                content: '';
                position: absolute;
                right: -40px;
                top: -24px;
                width: 120px;
                height: 120px;
                background: radial-gradient(circle at 30% 30%, rgba(184,125,26,0.12), rgba(184,125,26,0.06));
                transform: rotate(18deg);
            }

            .peta-card .card-title { font-weight:700; letter-spacing:.2px; font-family: 'Poppins', sans-serif; font-size:1.05rem; color:#1f2d3d; }
            .peta-card .card-meta { font-size: 13px; color:#6c757d; }

            .peta-card .card-body { padding: 0; position: relative; z-index: 2; }
            .peta-card .card-row { display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.6rem; }
            .peta-card .card-info { color:#222; margin-bottom:0.35rem; }
            .peta-card .card-info strong { color:#b87d1a; }

            .peta-card .card-actions { display:flex; gap:0.5rem; position: relative; z-index: 3; }
            .peta-card .card-actions .btn {
                font-size: 12px;
                padding: 0.35rem 0.65rem;
                border-radius: 6px;
                transition: all 0.2s ease;
            }
            .peta-card .card-actions .btn i { font-size: 12px; }

            .peta-card .btn-outline-primary {
                color: #b87d1a;
                border-color: #b87d1a;
            }
            .peta-card .btn-outline-primary:hover {
                background-color: #b87d1a;
                border-color: #b87d1a;
                color: #fff;
            }

            .peta-card .btn-outline-secondary {
                color: #6c757d;
                border-color: #6c757d;
            }
            .peta-card .btn-outline-secondary:hover {
                background-color: #6c757d;
                border-color: #6c757d;
                color: #fff;
            }

            .peta-card .btn-outline-danger {
                color: #dc3545;
                border-color: #dc3545;
            }
            .peta-card .btn-outline-danger:hover {
                background-color: #dc3545;
                border-color: #dc3545;
                color: #fff;
            }

            .peta-card strong {
                color: #b87d1a;
                font-weight: 700;
            }

            /* Responsive card adjustments */
            @media (max-width: 1024px) {
                .peta-card {
                    padding: 1.25rem;
                }
            }

            @media (max-width: 768px) {
                .peta-card {
                    padding: 1.25rem;
                }
                .peta-card .card-title {
                    font-size: 1rem;
                }
            }

            @media (max-width: 576px) {
                .peta-card {
                    padding: 1rem;
                }
                .peta-card .card-title {
                    font-size: 0.95rem;
                }
                .peta-card .card-meta,
                .peta-card p {
                    font-size: 12px;
                }
                .peta-card .card-actions {
                    flex-wrap: wrap;
                    gap: 0.4rem;
                }
                .peta-card .card-actions .btn {
                    font-size: 11px;
                    padding: 0.3rem 0.5rem;
                }
            }
        </style>

        {{-- Card Grid --}}
        <div class="peta-card-grid">
            @forelse($petaPersils as $peta)
            <div class="card peta-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="card-title">{{ $peta->persil->kode_persil ?? '-' }}</div>
                            <div class="card-meta">Peta ID: {{ $peta->peta_id }}</div>
                        </div>
                        <div class="text-end card-actions">
                            <a href="{{ route('pages.peta-persil.show', $peta->peta_id) }}" class="btn btn-sm btn-outline-primary" title="Lihat Detail">
                                <i class="fa fa-eye"></i>
                            </a>
                            @if(auth()->user()->role === 'operator')
                            <a href="{{ route('pages.peta-persil.edit', $peta->peta_id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('pages.peta-persil.destroy', $peta->peta_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus peta ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>

                    <p class="mb-2 text-muted">
                        <strong>Alamat:</strong> {{ Str::limit($peta->persil->alamat_lahan ?? 'Tidak ada alamat', 50) }}
                    </p>
                    <p class="mb-2 text-muted">
                        <strong>Panjang:</strong> {{ $peta->panjang_m ?? '-' }} m
                    </p>
                    <p class="mb-2 text-muted">
                        <strong>Lebar:</strong> {{ $peta->lebar_m ?? '-' }} m
                    </p>
                    @if($peta->getLuas())
                    <p class="mb-2 text-muted">
                        <strong>Luas Estimasi:</strong> {{ number_format($peta->getLuas(), 2) }} m²
                    </p>
                    @endif
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="small text-muted">
                            <span class="badge bg-success">
                                <i class="fa fa-map me-1"></i> Peta
                            </span>
                        </div>
                        <div class="small text-muted">Dibuat: {{ $peta->created_at->format('d M Y') }}</div>
                    </div>
                </div>
            </div>
            @empty
            <div class="card peta-card">
                <div class="card-body">
                    <div class="card-title">Belum ada data peta persil.</div>
                </div>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-4 mb-0">
            <nav aria-label="Pagination Peta Persil">
                {{ $petaPersils->onEachSide(2)->links('pagination::bootstrap-5') }}
            </nav>
        </div>

        </div>{{-- End Wrapper --}}

        {{-- Peta GeoJSON Container --}}
        <div class="position-relative rounded-3 p-4 bg-white mt-5 mb-4" style="border: 1px solid #e0e0e0; box-shadow: 0 4px 12px rgba(0,0,0,0.08); background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);">
            {{-- Top accent border --}}
            <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #b87d1a 0%, #d4a055 50%, #b87d1a 100%); border-radius: 8px 8px 0 0;"></div>

            <h4 class="mb-3 text-center"><i class="fa fa-globe me-2 text-primary"></i>Peta Persil Interaktif</h4>
            {{-- Map Container --}}
            <div id="map" style="height: 450px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);"></div>
        </div>
    </div>
</div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // Initialize map centered on Indonesia
    const map = L.map('map').setView([-2.5489, 118.0149], 5);

    // Add OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Load GeoJSON data
    fetch('{{ route('api.peta-persil') }}')
        .then(response => response.json())
        .then(data => {
            if (data.features && data.features.length > 0) {
                const geoJsonLayer = L.geoJSON(data, {
                    style: function(feature) {
                        return {
                            color: '#b87d1a',
                            weight: 2,
                            fillColor: '#d4a055',
                            fillOpacity: 0.5
                        };
                    },
                    onEachFeature: function(feature, layer) {
                        const props = feature.properties;
                        let popupContent = `
                            <div style="min-width: 200px;">
                                <h6 style="color: #b87d1a; margin-bottom: 8px;">
                                    <i class="fa fa-map-marker-alt"></i> ${props.kode_persil}
                                </h6>
                                <p style="margin: 4px 0; font-size: 0.9rem;">
                                    <strong>Alamat:</strong><br>${props.alamat}
                                </p>
                                <p style="margin: 4px 0; font-size: 0.9rem;">
                                    <strong>Ukuran:</strong> ${props.panjang_m || '-'} m × ${props.lebar_m || '-'} m
                                </p>
                                ${props.luas ? `<p style="margin: 4px 0; font-size: 0.9rem;"><strong>Luas:</strong> ${parseFloat(props.luas).toFixed(2)} m²</p>` : ''}
                                <a href="/peta-persil/${props.peta_id}" class="btn btn-sm btn-primary mt-2" style="width: 100%;">
                                    <i class="fa fa-eye"></i> Lihat Detail
                                </a>
                            </div>
                        `;
                        layer.bindPopup(popupContent);
                    }
                }).addTo(map);

                // Fit map to bounds of all features
                map.fitBounds(geoJsonLayer.getBounds());
            } else {
                // No data, show info
                L.popup()
                    .setLatLng([-2.5489, 118.0149])
                    .setContent('<div style="text-align: center;"><i class="fa fa-info-circle"></i><br>Belum ada data peta persil</div>')
                    .openOn(map);
            }
        })
        .catch(error => {
            console.error('Error loading map data:', error);
        });
</script>
@endsection
