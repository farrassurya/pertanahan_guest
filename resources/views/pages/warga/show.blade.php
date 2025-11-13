@extends('layouts.guest.app')

@section('title', 'Detail Warga - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase">Detail Data Warga</h2>
            <a href="{{ route('pages.warga.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">No KTP</th>
                                <td>: {{ $warga->no_ktp }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>: {{ $warga->nama }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: {{ $warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>: {{ $warga->agama }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">Pekerjaan</th>
                                <td>: {{ $warga->pekerjaan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>: {{ $warga->telp ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ $warga->alamat ?? '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('pages.warga.edit', $warga->warga_id) }}" class="btn btn-warning">
                        <i class="fa fa-edit me-1"></i> Edit
                    </a>
                    <form action="{{ route('pages.warga.destroy', $warga->warga_id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus data?')">
                            <i class="fa fa-trash me-1"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
