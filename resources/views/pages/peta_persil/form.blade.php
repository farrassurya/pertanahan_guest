<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($method) && $method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-4">
        <label class="form-label fw-bold">
            <i class="fa fa-map-marker-alt text-primary me-1"></i> Persil <span class="text-danger">*</span>
        </label>
        <select name="persil_id" class="form-select form-select-lg" required style="border-radius: 10px; cursor: pointer;">
            <option value="">-- Pilih Persil --</option>
            @foreach($persils as $p)
                <option value="{{ $p->persil_id }}" {{ (old('persil_id', $petaPersil->persil_id ?? '') == $p->persil_id) ? 'selected' : '' }}>
                    {{ $p->kode_persil }} - {{ $p->alamat_lahan }}
                </option>
            @endforeach
        </select>
        <small class="text-muted"><i class="fa fa-info-circle me-1"></i>Pilih persil yang akan dipetakan</small>
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold">
            <i class="fa fa-map text-primary me-1"></i> Data GeoJSON
        </label>
        <textarea name="geojson" class="form-control" rows="6" placeholder='{"type":"Polygon","coordinates":[[[lng,lat],[lng,lat],...]]}'
            style="border-radius: 10px; font-family: monospace; font-size: 0.9rem; cursor: text;">{{ old('geojson', $petaPersil->geojson ?? '') }}</textarea>
        <small class="text-muted">
            <i class="fa fa-info-circle me-1"></i>Format GeoJSON standar. Biarkan kosong jika tidak ada data koordinat.
            <a href="#" id="showMapDrawer" class="text-primary">Gambar di peta</a>
        </small>
    </div>

    <!-- Map Drawer Modal -->
    <div id="mapDrawerModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 9999; overflow-y: auto;">
        <div style="max-width: 1200px; margin: 2rem auto; background: white; border-radius: 12px; padding: 2rem;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5><i class="fa fa-map me-2"></i>Gambar Area Persil di Peta</h5>
                <button type="button" id="closeMapDrawer" class="btn btn-outline-secondary">
                    <i class="fa fa-times"></i> Tutup
                </button>
            </div>
            <div class="alert alert-info">
                <i class="fa fa-info-circle me-2"></i>
                Klik pada peta untuk menambah titik polygon. Klik titik pertama kembali untuk menutup area.
            </div>
            <div id="drawMap" style="height: 500px; border-radius: 12px;"></div>
            <div class="mt-3 text-end">
                <button type="button" id="clearDrawing" class="btn btn-warning me-2">
                    <i class="fa fa-eraser"></i> Hapus Gambar
                </button>
                <button type="button" id="saveDrawing" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan ke Form
                </button>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <label class="form-label fw-bold">
                <i class="fa fa-arrows-alt-h text-primary me-1"></i> Panjang (meter)
            </label>
            <input type="number" name="panjang_m" class="form-control form-control-lg" step="0.01" min="0"
                value="{{ old('panjang_m', $petaPersil->panjang_m ?? '') }}" placeholder="Contoh: 50.5"
                style="border-radius: 10px; cursor: text;">
            <small class="text-muted"><i class="fa fa-info-circle me-1"></i>Panjang lahan dalam meter</small>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-bold">
                <i class="fa fa-arrows-alt-v text-primary me-1"></i> Lebar (meter)
            </label>
            <input type="number" name="lebar_m" class="form-control form-control-lg" step="0.01" min="0"
                value="{{ old('lebar_m', $petaPersil->lebar_m ?? '') }}" placeholder="Contoh: 30.25"
                style="border-radius: 10px; cursor: text;">
            <small class="text-muted"><i class="fa fa-info-circle me-1"></i>Lebar lahan dalam meter</small>
        </div>
    </div>

    {{-- File Upload Section --}}
    <div class="mb-4">
        <label class="form-label fw-bold">
            <i class="fa fa-paperclip text-primary me-1"></i> Upload File Peta (Opsional)
        </label>
        <input type="file" name="files[]" class="form-control form-control-lg" multiple accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.xls,.xlsx"
            style="border-radius: 10px; cursor: pointer;">
        <small class="text-muted">
            <i class="fa fa-info-circle me-1"></i>Upload gambar peta, PDF, dokumen terkait (Max: 2MB per file)
        </small>
    </div>

    {{-- Show Existing Files in Edit Mode --}}
    @if(isset($petaPersil) && $petaPersil->media && $petaPersil->media->count() > 0)
    <div class="mb-4">
        <label class="form-label fw-bold">
            <i class="fa fa-file text-primary me-1"></i> File Terlampir ({{ $petaPersil->media->count() }} file)
        </label>

        <style>
            .media-file-card {
                background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
                border: 2px solid #e9ecef;
                border-radius: 12px;
                padding: 1rem;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }
            .media-file-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                border-color: #b87d1a;
            }
            .media-file-preview {
                width: 100%;
                height: 120px;
                object-fit: cover;
                border-radius: 8px;
                background: #f8f9fa;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .media-file-preview img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 8px;
            }
            .file-icon-large {
                font-size: 3.5rem;
                opacity: 0.8;
            }
            .media-file-card .btn-delete {
                width: 100%;
                margin-top: 0.5rem;
            }
        </style>

        <div class="row g-3">
            @foreach($petaPersil->media as $media)
            @php
                $iconClass = 'fa fa-file';
                $iconColor = '#6c757d';
                $extension = strtolower(pathinfo($media->file_name, PATHINFO_EXTENSION));

                if ($extension == 'pdf' || str_contains($media->mime_type ?? '', 'pdf')) {
                    $iconClass = 'fa fa-file-pdf';
                    $iconColor = '#dc3545';
                } elseif (in_array($extension, ['doc', 'docx']) || str_contains($media->mime_type ?? '', 'word') || str_contains($media->mime_type ?? '', 'document')) {
                    $iconClass = 'fa fa-file-word';
                    $iconColor = '#2b5797';
                } elseif (in_array($extension, ['xls', 'xlsx']) || str_contains($media->mime_type ?? '', 'excel') || str_contains($media->mime_type ?? '', 'spreadsheet')) {
                    $iconClass = 'fa fa-file-excel';
                    $iconColor = '#217346';
                } elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']) || str_contains($media->mime_type ?? '', 'image')) {
                    $iconClass = 'image';
                }
            @endphp
            <div class="col-md-3">
                <div class="media-file-card">
                    <div class="media-file-preview">
                        @if($iconClass == 'image')
                            <img src="{{ asset('storage/media/' . $media->file_name) }}" alt="{{ $media->file_name }}">
                        @else
                            <i class="{{ $iconClass }} file-icon-large" style="color: {{ $iconColor }};"></i>
                        @endif
                    </div>
                    <div class="mt-2">
                        <div class="text-truncate fw-semibold" style="font-size: 0.85rem;" title="{{ $media->file_name }}">
                            {{ $media->file_name }}
                        </div>
                        <small class="text-muted">{{ $extension }}</small>
                    </div>
                    <form action="{{ route('pages.peta-persil.media.delete', $media->media_id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin hapus file ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger btn-delete">
                            <i class="fa fa-trash me-1"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="d-flex justify-content-end gap-3 mt-4 pt-4 border-top">
        <button type="submit" class="btn btn-primary btn-lg px-5" style="background: linear-gradient(135deg, #b87d1a, #d4a055); border: none;">
            <i class="fa fa-save me-2"></i>{{ isset($petaPersil) ? 'Update' : 'Simpan' }} Peta
        </button>
    </div>
</form>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
let drawMap;
let drawnLayer;
let drawingPoints = [];

document.getElementById('showMapDrawer').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('mapDrawerModal').style.display = 'block';

    if (!drawMap) {
        // Initialize map
        drawMap = L.map('drawMap').setView([-2.5489, 118.0149], 5);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(drawMap);

        // Load existing GeoJSON if any
        const existingGeoJSON = document.querySelector('textarea[name="geojson"]').value.trim();
        if (existingGeoJSON) {
            try {
                const geoData = JSON.parse(existingGeoJSON);
                drawnLayer = L.geoJSON(geoData, {
                    style: { color: '#b87d1a', weight: 2, fillColor: '#d4a055', fillOpacity: 0.5 }
                }).addTo(drawMap);
                drawMap.fitBounds(drawnLayer.getBounds());
            } catch(e) {
                console.error('Invalid GeoJSON');
            }
        }

        // Enable drawing
        drawMap.on('click', function(e) {
            const latlng = e.latlng;
            drawingPoints.push([latlng.lng, latlng.lat]);

            // Add marker
            L.circleMarker(latlng, { color: '#b87d1a', radius: 5 }).addTo(drawMap);

            // Draw line if more than 1 point
            if (drawingPoints.length > 1) {
                L.polyline(drawingPoints.map(p => [p[1], p[0]]), { color: '#b87d1a' }).addTo(drawMap);
            }
        });
    }

    setTimeout(() => drawMap.invalidateSize(), 100);
});

document.getElementById('closeMapDrawer').addEventListener('click', function() {
    document.getElementById('mapDrawerModal').style.display = 'none';
});

document.getElementById('clearDrawing').addEventListener('click', function() {
    if (drawnLayer) {
        drawMap.removeLayer(drawnLayer);
        drawnLayer = null;
    }
    drawingPoints = [];
    drawMap.eachLayer(function(layer) {
        if (layer instanceof L.CircleMarker || layer instanceof L.Polyline) {
            drawMap.removeLayer(layer);
        }
    });
});

document.getElementById('saveDrawing').addEventListener('click', function() {
    if (drawingPoints.length >= 3) {
        // Close polygon
        drawingPoints.push(drawingPoints[0]);

        const geoJSON = {
            type: "Polygon",
            coordinates: [drawingPoints]
        };

        document.querySelector('textarea[name="geojson"]').value = JSON.stringify(geoJSON);
        document.getElementById('mapDrawerModal').style.display = 'none';

        alert('Data peta berhasil disimpan ke form!');
    } else {
        alert('Minimal 3 titik untuk membuat polygon!');
    }
});
</script>
