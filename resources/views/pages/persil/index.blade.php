@extends('layouts.guest.app')

@section('title', 'Data Persil - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase">Data Persil</h2>
            <a href="{{ route('pages.persil.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-1"></i> Tambah Persil
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Kode Persil</th>
                                <th>Pemilik</th>
                                <th>Luas (m2)</th>
                                <th>Penggunaan</th>
                                <th>Alamat Lahan</th>
                                <th>RT/RW</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($persil as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_persil }}</td>
                                    <td>{{ $item->pemilik->nama ?? '-' }}</td>
                                    <td>{{ $item->luas_m2 }}</td>
                                    <td>{{ $item->penggunaan }}</td>
                                    <td>{{ $item->alamat_lahan }}</td>
                                    <td>{{ $item->rt }}/{{ $item->rw }}</td>
                                    <td>
                                        <a href="{{ route('pages.persil.show', $item->persil_id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('pages.persil.edit', $item->persil_id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('pages.persil.destroy', $item->persil_id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
