@extends('layouts.guest.app')

@section('title', 'Edit Jenis Penggunaan - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container" style="max-width: 800px;">
        <div class="d-flex flex-row justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase mb-0">Edit Jenis Penggunaan</h2>
            <a href="{{ route('pages.jenis-penggunaan.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('pages.jenis-penggunaan.update', $item->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Penggunaan <span class="text-danger">*</span></label>
                        <input type="text"
                               name="nama_penggunaan"
                               value="{{ old('nama_penggunaan', $item->nama_penggunaan) }}"
                               class="form-control @error('nama_penggunaan') is-invalid @enderror"
                               placeholder="Contoh: Perumahan, Pertanian, dll"
                               required>
                        @error('nama_penggunaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan"
                                  class="form-control @error('keterangan') is-invalid @enderror"
                                  rows="4"
                                  placeholder="Deskripsi jenis penggunaan lahan...">{{ old('keterangan', $item->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i> Perbarui
                        </button>
                        <a href="{{ route('pages.jenis-penggunaan.index') }}" class="btn btn-outline-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
