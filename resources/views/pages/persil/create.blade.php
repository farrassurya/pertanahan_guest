@extends('layouts.guest.app')

@section('title', 'Tambah Persil - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4">Tambah Data Persil</h3>
                <form action="{{ route('pages.persil.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="kode_persil" class="form-label">Kode Persil</label>
                            <input type="text" name="kode_persil" id="kode_persil" class="form-control" required value="{{ old('kode_persil') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="pemilik_warga_id" class="form-label">Pemilik Warga</label>
                            <select name="pemilik_warga_id" id="pemilik_warga_id" class="form-select" required>
                                <option value="">- Pilih Pemilik -</option>
                                @foreach ($warga as $w)
                                    <option value="{{ $w->warga_id }}" {{ old('pemilik_warga_id') == $w->warga_id ? 'selected' : '' }}>{{ $w->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="luas_m2" class="form-label">Luas (m2)</label>
                            <input type="number" name="luas_m2" id="luas_m2" class="form-control" required value="{{ old('luas_m2') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="penggunaan" class="form-label">Penggunaan</label>
                            <input type="text" name="penggunaan" id="penggunaan" class="form-control" value="{{ old('penggunaan') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="alamat_lahan" class="form-label">Alamat Lahan</label>
                            <input type="text" name="alamat_lahan" id="alamat_lahan" class="form-control" value="{{ old('alamat_lahan') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="rt" class="form-label">RT</label>
                            <input type="text" name="rt" id="rt" class="form-control" value="{{ old('rt') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="rw" class="form-label">RW</label>
                            <input type="text" name="rw" id="rw" class="form-control" value="{{ old('rw') }}">
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('pages.persil.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
