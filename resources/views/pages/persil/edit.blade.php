@extends('layouts.guest.app')

@section('title', 'Edit Persil - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase mb-0">Edit Data Persil</h2>
            <a href="{{ route('pages.persil.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fa fa-exclamation-circle me-2"></i>
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0" style="border-radius: 12px;">
            <div class="card-body p-4">
                <form action="{{ route('pages.persil.update', $persil->persil_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="kode_persil" class="form-label fw-semibold">Kode Persil <span class="text-danger">*</span></label>
                            <input type="text" name="kode_persil" id="kode_persil" class="form-control @error('kode_persil') is-invalid @enderror" required value="{{ old('kode_persil', $persil->kode_persil) }}">
                            @error('kode_persil')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="pemilik_warga_id" class="form-label fw-semibold">Pemilik Warga <span class="text-danger">*</span></label>
                            <select name="pemilik_warga_id" id="pemilik_warga_id" class="form-select @error('pemilik_warga_id') is-invalid @enderror" required>
                                <option value="">- Pilih Pemilik -</option>
                                @foreach ($warga as $w)
                                    <option value="{{ $w->warga_id }}" {{ old('pemilik_warga_id', $persil->pemilik_warga_id) == $w->warga_id ? 'selected' : '' }}>{{ $w->nama }}</option>
                                @endforeach
                            </select>
                            @error('pemilik_warga_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label for="luas_m2" class="form-label">Luas (m2) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="luas_m2" id="luas_m2" class="form-control @error('luas_m2') is-invalid @enderror" required value="{{ old('luas_m2', $persil->luas_m2) }}">
                            @error('luas_m2')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label for="penggunaan" class="form-label">Penggunaan <span class="text-danger">*</span></label>
                            <input type="text" name="penggunaan" id="penggunaan" class="form-control @error('penggunaan') is-invalid @enderror" required value="{{ old('penggunaan', $persil->penggunaan) }}">
                            @error('penggunaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label for="alamat_lahan" class="form-label">Alamat Lahan <span class="text-danger">*</span></label>
                            <input type="text" name="alamat_lahan" id="alamat_lahan" class="form-control @error('alamat_lahan') is-invalid @enderror" required value="{{ old('alamat_lahan', $persil->alamat_lahan) }}">
                            @error('alamat_lahan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-2">
                            <label for="rt" class="form-label">RT <span class="text-danger">*</span></label>
                            <input type="text" name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror" required value="{{ old('rt', $persil->rt) }}">
                            @error('rt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-2">
                            <label for="rw" class="form-label">RW <span class="text-danger">*</span></label>
                            <input type="text" name="rw" id="rw" class="form-control @error('rw') is-invalid @enderror" required value="{{ old('rw', $persil->rw) }}">
                            @error('rw')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12">
                            <label for="media_files" class="form-label">Upload File / Gambar Tambahan</label>
                            <input type="file" name="media_files[]" id="media_files" class="form-control @error('media_files.*') is-invalid @enderror" multiple accept="image/*,.pdf,.doc,.docx,.xls,.xlsx">
                            <small class="text-muted">Format: Gambar, PDF, Word, Excel. Maksimal 2 file, setiap file maksimal 1MB. File akan ditambahkan ke yang sudah ada.</small>
                            @error('media_files')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            @error('media_files.*')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        {{-- Display Existing Files --}}
                        @if($persil->media && $persil->media->count() > 0)
                        <div class="mt-3">
                            <p class="mb-2 text-muted" style="font-size: 0.9rem;">File yang sudah diupload:</p>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($persil->media as $media)
                                    @php
                                        $extension = strtolower(pathinfo($media->file_name, PATHINFO_EXTENSION));
                                        $iconColor = '#6c757d';
                                        $icon = 'fa-file';
                                        
                                        if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                                            $iconColor = '#28a745';
                                            $icon = 'fa-file-image';
                                        } elseif($extension === 'pdf') {
                                            $iconColor = '#dc3545';
                                            $icon = 'fa-file-pdf';
                                        } elseif(in_array($extension, ['doc', 'docx'])) {
                                            $iconColor = '#2b5797';
                                            $icon = 'fa-file-word';
                                        } elseif(in_array($extension, ['xls', 'xlsx'])) {
                                            $iconColor = '#217346';
                                            $icon = 'fa-file-excel';
                                        }
                                    @endphp
                                    <div class="d-flex align-items-center p-2 border rounded" style="background: #f8f9fa; max-width: 250px;">
                                        <i class="fas {{ $icon }} me-2" style="font-size: 1.2rem; color: {{ $iconColor }};"></i>
                                        <div class="flex-grow-1" style="min-width: 0;">
                                            <small class="d-block text-truncate" style="font-size: 0.8rem;">{{ Str::limit($media->file_name, 20) }}</small>
                                        </div>
                                        <a href="{{ asset('storage/media/' . $media->file_name) }}" target="_blank" class="btn btn-sm btn-outline-primary ms-2">
                                            <i class="fa fa-eye" style="font-size: 0.75rem;"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('pages.persil.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
