<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($method) && $method === 'PUT')
        @method('PUT')
    @endif

    <div class="row g-3">
        <div class="col-md-6">
            <label for="persil_id" class="form-label fw-semibold">Persil <span class="text-danger">*</span></label>
            <select name="persil_id" id="persil_id" class="form-select @error('persil_id') is-invalid @enderror" required>
                <option value="">- Pilih Persil -</option>
                @foreach($persils as $p)
                    <option value="{{ $p->persil_id }}" {{ old('persil_id', $sengketa->persil_id ?? '') == $p->persil_id ? 'selected' : '' }}>
                        {{ $p->kode_persil }} - {{ $p->alamat_lahan }}
                    </option>
                @endforeach
            </select>
            @error('persil_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-6">
            <label for="status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                <option value="">- Pilih Status -</option>
                <option value="Proses" {{ old('status', $sengketa->status ?? '') == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Mediasi" {{ old('status', $sengketa->status ?? '') == 'Mediasi' ? 'selected' : '' }}>Mediasi</option>
                <option value="Pengadilan" {{ old('status', $sengketa->status ?? '') == 'Pengadilan' ? 'selected' : '' }}>Pengadilan</option>
                <option value="Selesai" {{ old('status', $sengketa->status ?? '') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-6">
            <label for="pihak_1" class="form-label fw-semibold">Pihak 1 <span class="text-danger">*</span></label>
            <input type="text" name="pihak_1" id="pihak_1" class="form-control @error('pihak_1') is-invalid @enderror" required value="{{ old('pihak_1', $sengketa->pihak_1 ?? '') }}" placeholder="Nama pihak pertama">
            @error('pihak_1')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-6">
            <label for="pihak_2" class="form-label fw-semibold">Pihak 2 <span class="text-danger">*</span></label>
            <input type="text" name="pihak_2" id="pihak_2" class="form-control @error('pihak_2') is-invalid @enderror" required value="{{ old('pihak_2', $sengketa->pihak_2 ?? '') }}" placeholder="Nama pihak kedua">
            @error('pihak_2')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-12">
            <label for="kronologi" class="form-label fw-semibold">Kronologi Sengketa <span class="text-danger">*</span></label>
            <textarea name="kronologi" id="kronologi" rows="4" class="form-control @error('kronologi') is-invalid @enderror" required placeholder="Jelaskan kronologi sengketa secara detail...">{{ old('kronologi', $sengketa->kronologi ?? '') }}</textarea>
            @error('kronologi')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-12">
            <label for="penyelesaian" class="form-label fw-semibold">Penyelesaian</label>
            <textarea name="penyelesaian" id="penyelesaian" rows="3" class="form-control @error('penyelesaian') is-invalid @enderror" placeholder="Solusi atau hasil penyelesaian (opsional)">{{ old('penyelesaian', $sengketa->penyelesaian ?? '') }}</textarea>
            @error('penyelesaian')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        @if(isset($sengketa))
            {{-- Existing Media Files --}}
            @php
                $existingMedia = \App\Models\Media::where('ref_table', 'sengketa_persil')
                    ->where('ref_id', $sengketa->sengketa_id)
                    ->orderBy('sort_order')
                    ->get();
            @endphp
            @if($existingMedia->count() > 0)
                <div class="col-12">
                    <label class="form-label fw-semibold">File yang Sudah Ada:</label>
                    <style>
                        .media-file-card {
                            border: 2px solid #f5e3c2;
                            border-radius: 12px;
                            padding: 1rem;
                            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
                            transition: all 0.3s ease;
                            height: 100%;
                        }
                        .media-file-card:hover {
                            transform: translateY(-3px);
                            box-shadow: 0 4px 20px rgba(184, 125, 26, 0.15);
                            border-color: #d97706;
                        }
                        .media-file-preview {
                            width: 100%;
                            height: 120px;
                            border-radius: 8px;
                            overflow: hidden;
                            margin-bottom: 0.75rem;
                            background: #f5f5f5;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            position: relative;
                            border: 1px solid #e0e0e0;
                        }
                        .media-file-preview img {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                        }
                        .media-file-icon {
                            font-size: 3rem;
                        }
                        .media-file-name {
                            font-size: 0.8rem;
                            color: #555;
                            word-break: break-word;
                            margin-bottom: 0.5rem;
                            line-height: 1.3;
                            min-height: 40px;
                            display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            overflow: hidden;
                        }
                        .media-delete-btn {
                            width: 100%;
                            background: #dc3545;
                            color: white;
                            border: none;
                            padding: 0.4rem;
                            border-radius: 6px;
                            font-weight: 600;
                            transition: all 0.3s;
                            font-size: 0.85rem;
                        }
                        .media-delete-btn:hover {
                            background: #c82333;
                            color: white;
                            transform: scale(1.02);
                        }
                    </style>
                    <div class="row g-3">
                        @foreach($existingMedia as $media)
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
                                <div class="media-file-card">
                                    <div class="media-file-preview">
                                        @if(str_starts_with($media->mime_type, 'image/'))
                                            <img src="{{ asset('storage/media/' . $media->file_name) }}" alt="{{ $media->file_name }}">
                                        @else
                                            <i class="{{ $iconClass }} media-file-icon" style="color: {{ $iconColor }};"></i>
                                        @endif
                                    </div>
                                    <div class="media-file-name" title="{{ $media->file_name }}">{{ $media->file_name }}</div>
                                    <a href="{{ route('pages.sengketa-persil.media.delete', $media->media_id) }}" class="btn media-delete-btn" onclick="return confirm('Hapus file ini?')">
                                        <i class="fa fa-trash me-1"></i> Hapus
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif

        {{-- Upload New Files --}}
        <div class="col-12">
            <label for="media_files" class="form-label fw-semibold">Upload File Pendukung</label>
            <input type="file" name="media_files[]" id="media_files" class="form-control @error('media_files.*') is-invalid @enderror" multiple accept="image/*,.pdf,.doc,.docx,.xls,.xlsx">
            <small class="text-muted">Format: Gambar, PDF, Word, Excel. Maksimal 5 file, setiap file maksimal 2MB.</small>
            @error('media_files')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
            @error('media_files.*')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="{{ route('pages.sengketa-persil.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save me-1"></i> {{ isset($sengketa) ? 'Perbarui' : 'Simpan' }}
        </button>
    </div>
</form>
