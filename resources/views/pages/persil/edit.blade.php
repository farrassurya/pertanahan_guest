@extends('layouts.guest.app')

@section('title', 'Edit Persil - Pertanahan')

@section('content')
<style>
    /* Batasi tinggi dropdown select agar bisa di-scroll */
    select.form-select {
        height: 38px !important;
        overflow-y: auto;
    }
</style>
<div class="container-fluid py-4">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4">Edit Data Persil</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pages.persil.update', $persil->persil_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="kode_persil" class="form-label">Kode Persil <span class="text-danger">*</span></label>
                            <input type="text" name="kode_persil" id="kode_persil" class="form-control @error('kode_persil') is-invalid @enderror" required value="{{ old('kode_persil', $persil->kode_persil) }}">
                            @error('kode_persil')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="pemilik_warga_id" class="form-label">Pemilik Warga <span class="text-danger">*</span></label>
                            <select name="pemilik_warga_id" id="pemilik_warga_id" class="form-select @error('pemilik_warga_id') is-invalid @enderror" required size="1" style="height: 38px; overflow-y: auto;">
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

                        {{-- Existing Media Files --}}
                        @php
                            $existingMedia = \App\Models\Media::where('ref_table', 'persil')
                                ->where('ref_id', $persil->persil_id)
                                ->orderBy('sort_order')
                                ->get();
                        @endphp
                        @if($existingMedia->count() > 0)
                            <div class="col-12">
                                <label class="form-label">File yang Sudah Diupload</label>
                                <div class="row g-2">
                                    @foreach($existingMedia as $media)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body p-2 text-center">
                                                    @if(str_starts_with($media->mime_type, 'image/'))
                                                        <div style="display: flex; justify-content: center; align-items: center; height: 100px; margin-bottom: 0.5rem;">
                                                            <img src="{{ asset('storage/media/' . $media->file_name) }}" alt="{{ $media->caption }}" style="max-height: 100px; max-width: 100%; object-fit: contain;">
                                                        </div>
                                                    @else
                                                        <div class="mb-2" style="height: 100px; display: flex; align-items: center; justify-content: center; background: #f5f5f5;">
                                                            <i class="fa fa-file" style="font-size: 2rem; color: #999;"></i>
                                                        </div>
                                                    @endif
                                                    <small class="d-block text-truncate">{{ $media->file_name }}</small>
                                                    <a href="{{ route('pages.persil.media.delete', $media->media_id) }}" class="btn btn-sm btn-danger mt-1" onclick="return confirm('Hapus file ini?')">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Upload Additional Files --}}
                        <div class="col-12">
                            <label for="media_files" class="form-label">Upload File / Gambar </label>
                            <input type="file" name="media_files[]" id="media_files" class="form-control @error('media_files.*') is-invalid @enderror" multiple accept="image/*,.pdf,.doc,.docx,.xls,.xlsx">
                            <small class="text-muted">Format: Gambar, PDF, Word, Excel. Maksimal 2 file, setiap file maksimal 1MB. Kompres file jika terlalu besar.</small>
                            @error('media_files')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            @error('media_files.*')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
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
