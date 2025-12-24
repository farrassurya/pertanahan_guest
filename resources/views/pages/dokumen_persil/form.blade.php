<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap');

    .dokumen-form-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(184, 125, 26, 0.12);
        border: 2px solid #f5e3c2;
        max-width: 950px;
        margin: 2rem auto;
        padding: 2rem 2.5rem;
        font-family: 'Montserrat', Arial, sans-serif;
    }

    .dokumen-form-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: #222;
        margin-bottom: 2rem;
        letter-spacing: 0.5px;
        text-align: left;
        font-family: 'Montserrat', Arial, sans-serif;
    }

    .dokumen-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.3rem 2rem;
    }

    .dokumen-form-group {
        display: flex;
        flex-direction: column;
    }

    .form-label {
        font-weight: 700;
        color: #222;
        margin-bottom: 0.4rem;
        font-size: 1rem;
        font-family: 'Montserrat', Arial, sans-serif;
    }

    .form-control, .form-select {
        font-size: 1rem;
        padding: 0.65rem 1rem;
        border-radius: 6px;
        border: 1px solid #ddd;
        background: #fafafa;
        font-family: 'Montserrat', Arial, sans-serif;
        transition: all 0.2s;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        padding-right: 2.5rem;
    }

    .form-control {
        background-image: none;
        padding-right: 1rem;
    }

    .form-control:focus, .form-select:focus {
        border-color: #b87d1a;
        box-shadow: 0 0 0 3px rgba(184, 125, 26, 0.1);
        outline: none;
        background: #fff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23b87d1a' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
    }

    .form-control:focus {
        background-image: none;
    }

    .btn-gold {
        background: #b87d1a;
        color: #fff;
        font-weight: 700;
        border: none;
        border-radius: 6px;
        padding: 0.65rem 1.8rem;
        font-size: 1.05rem;
        margin-left: 0.6rem;
        transition: all 0.2s;
        font-family: 'Montserrat', Arial, sans-serif;
        cursor: pointer;
    }

    .btn-gold:hover {
        background: #a36b14;
        color: #fff;
        transform: translateY(-1px);
    }

    .btn-reset {
        background: #555;
        color: #fff;
        font-weight: 700;
        border: none;
        border-radius: 6px;
        padding: 0.65rem 1.8rem;
        font-size: 1.05rem;
        transition: all 0.2s;
        font-family: 'Montserrat', Arial, sans-serif;
        cursor: pointer;
    }

    .btn-reset:hover {
        background: #333;
        color: #fff;
        transform: translateY(-1px);
    }

    /* Batasi tinggi dropdown select agar bisa di-scroll */
    .form-select {
        max-height: 200px;
        overflow-y: auto;
    }

    /* Custom scrollable dropdown menggunakan size attribute */
    select.scrollable-dropdown {
        height: auto;
        max-height: 200px;
    }

    @media (max-width: 768px) {
        .dokumen-form-card {
            padding: 1.5rem 1rem;
            max-width: 100%;
            margin: 1rem auto;
        }
        .dokumen-form-title {
            font-size: 1.2rem;
        }
        .dokumen-form-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        .btn-gold, .btn-reset {
            padding: 0.6rem 1.2rem;
            font-size: 0.95rem;
            width: 100%;
            margin-left: 0;
            margin-top: 0.5rem;
        }
        .form-control, .form-select {
            font-size: 0.9rem;
        }
    }

    .alert {
        padding: 1rem 1.25rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-family: 'Montserrat', Arial, sans-serif;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .alert-success {
        background: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
    }
    .alert-danger {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
    }
    .alert i {
        font-size: 1.2rem;
    }
    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        font-family: 'Montserrat', Arial, sans-serif;
    }
    .is-invalid {
        border-color: #dc3545 !important;
        background-color: #fff5f5 !important;
    }

    /* Style untuk existing files */
    .existing-files {
        margin-top: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }
    .existing-file-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem;
        margin-bottom: 0.5rem;
        background: white;
        border-radius: 4px;
        border: 1px solid #e0e0e0;
    }
    .existing-file-item:last-child {
        margin-bottom: 0;
    }
</style>

<div class="dokumen-form-card">
    {{-- Alert Success --}}
    @if (session('success'))
        <div class="alert alert-success">
            <i class="fa fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Alert Error --}}
    @if (session('error'))
        <div class="alert alert-danger">
            <i class="fa fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <i class="fa fa-exclamation-triangle"></i>
            <div>
                <strong>Terdapat kesalahan:</strong>
                <ul style="margin: 0.5rem 0 0 1.5rem; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
        <div class="dokumen-form-title" style="margin-bottom:0;">{{ isset($dokumen) ? 'EDIT DOKUMEN PERSIL' : 'TAMBAH DOKUMEN PERSIL' }}</div>
        <a href="{{ route('pages.dokumen-persil.index') }}" class="btn" style="background:#6c757d; color:#fff; border:none; padding:0.5rem 1.3rem; border-radius:6px; text-decoration:none; font-weight:700; font-family:'Montserrat',Arial,sans-serif; font-size:1rem;">KEMBALI</a>
    </div>
    <form action="{{ isset($dokumen) ? route('pages.dokumen-persil.update', $dokumen->dokumen_id) : route('pages.dokumen-persil.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($dokumen))
            @method('PUT')
        @endif

        <div class="dokumen-form-grid">
            <div class="dokumen-form-group">
                <label for="persil_id" class="form-label">Persil <span style="color:#b87d1a">*</span></label>
                <select name="persil_id" id="persil_id" class="form-select @error('persil_id') is-invalid @enderror" required>
                    <option value="">Pilih Persil</option>
                    @foreach ($persil as $p)
                        <option value="{{ $p->persil_id }}" {{ (old('persil_id', $dokumen->persil_id ?? '') == $p->persil_id) ? 'selected' : '' }}>
                            {{ $p->kode_persil }} - {{ $p->pemilik->nama ?? '-' }}
                        </option>
                    @endforeach
                </select>
                @error('persil_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="dokumen-form-group">
                <label for="jenis_dokumen" class="form-label">Jenis Dokumen <span style="color:#b87d1a">*</span></label>
                <input type="text" name="jenis_dokumen" id="jenis_dokumen" class="form-control @error('jenis_dokumen') is-invalid @enderror" required placeholder="Contoh: Sertifikat, SPPT, AJB, dll" value="{{ old('jenis_dokumen', $dokumen->jenis_dokumen ?? '') }}">
                @error('jenis_dokumen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="dokumen-form-group" style="margin-top:1.3rem;">
            <label for="nomor" class="form-label">Nomor Dokumen</label>
            <input type="text" name="nomor" id="nomor" class="form-control @error('nomor') is-invalid @enderror" placeholder="Nomor dokumen (opsional)" value="{{ old('nomor', $dokumen->nomor ?? '') }}">
            @error('nomor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="dokumen-form-group" style="margin-top:1.3rem;">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="4" style="resize:vertical;" placeholder="Keterangan tambahan (opsional)">{{ old('keterangan', $dokumen->keterangan ?? '') }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="dokumen-form-group" style="margin-top:1.3rem;">
            <label for="media_files" class="form-label">Upload File Dokumen</label>
            <input type="file" name="media_files[]" id="media_files" class="form-control @error('media_files') is-invalid @error('media_files.*') is-invalid @enderror @enderror" multiple accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.xls,.xlsx">
            <small class="text-muted d-block mt-1">
                <i class="fa fa-info-circle"></i>
                Maksimal 5 file. Format: JPG, PNG, PDF, DOC, DOCX, XLS, XLSX. Ukuran maksimal 2MB per file.
            </small>
            @error('media_files')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @error('media_files.*')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Display existing files if editing --}}
        @if(isset($dokumen) && isset($existingMedia) && count($existingMedia) > 0)
            <div class="existing-files">
                <h6 style="margin-bottom: 0.75rem; font-weight: 700; color: #222;">File yang Sudah Ada:</h6>
                @foreach($existingMedia as $media)
                    <div class="existing-file-item">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fa fa-file text-primary"></i>
                            <span style="font-size: 0.9rem;">{{ $media->file_name }}</span>
                            @if(str_contains($media->mime_type, 'image'))
                                <a href="{{ asset('storage/media/' . $media->file_name) }}" target="_blank" class="btn btn-sm btn-outline-info" title="Lihat">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @else
                                <a href="{{ asset('storage/media/' . $media->file_name) }}" download class="btn btn-sm btn-outline-secondary" title="Download">
                                    <i class="fa fa-download"></i>
                                </a>
                            @endif
                        </div>
                        @if(auth()->user()->isOperator())
                            <form action="{{ route('pages.dokumen-persil.media.delete', $media->media_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus file ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        <div style="margin-top:2.5rem; display:flex; justify-content:flex-end; gap:0.8rem;">
            <button type="submit" class="btn btn-gold">SIMPAN DATA</button>
            <button type="reset" class="btn btn-reset">RESET</button>
        </div>
    </form>
</div>
