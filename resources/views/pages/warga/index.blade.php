@extends('layouts.guest.app')

@section('title', 'Data Warga - Pertanahan')

@section('content')
    <div class="container-fluid py-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-uppercase">Data Warga</h2>
                <a href="{{ route('pages.warga.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-1"></i> Tambah Warga
                </a>
            </div>

            {{-- Di bagian alert --}}
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

            <style>
                .warga-card-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
                    gap: 2rem;
                }
                .warga-card {
                    background: #fff;
                    border-radius: 18px;
                    box-shadow: 0 6px 24px rgba(184, 125, 26, 0.10);
                    padding: 2rem 1.5rem 1.5rem 1.5rem;
                    transition: box-shadow 0.2s, transform 0.2s;
                    position: relative;
                    border: 2px solid #f5e3c2;
                }
                .warga-card:hover {
                    box-shadow: 0 12px 36px rgba(184, 125, 26, 0.18);
                    transform: translateY(-4px) scale(1.02);
                    border-color: #b87d1a;
                }
                .warga-card .card-title {
                    font-size: 1.3rem;
                    font-weight: bold;
                    margin-bottom: 0.7rem;
                    color: #b87d1a;
                    letter-spacing: 0.5px;
                }
                .warga-card .card-info {
                    font-size: 1.05rem;
                    margin-bottom: 0.3rem;
                    color: #222;
                }
                .warga-card .card-info strong {
                    color: #b87d1a;
                }
                .warga-card .card-actions {
                    position: absolute;
                    top: 1.1rem;
                    right: 1.1rem;
                    display: flex;
                    gap: 0.7rem;
                }
                .warga-card .card-actions .btn {
                    border-radius: 50%;
                    width: 40px;
                    height: 40px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.15rem;
                    box-shadow: 0 2px 8px rgba(184, 125, 26, 0.08);
                    border: none;
                    transition: background 0.18s, color 0.18s, box-shadow 0.18s;
                }
                .warga-card .btn-info {
                    background: #b87d1a;
                    color: #fff;
                }
                .warga-card .btn-info:hover {
                    background: #a36b14;
                    color: #fff;
                }
                .warga-card .btn-warning {
                    background: #ffe3a3;
                    color: #b87d1a;
                }
                .warga-card .btn-warning:hover {
                    background: #ffd37a;
                    color: #a36b14;
                }
                .warga-card .btn-danger {
                    background: #f7c2b7;
                    color: #b87d1a;
                }
                .warga-card .btn-danger:hover {
                    background: #f28b7b;
                    color: #fff;
                }
                .warga-card .fa {
                    vertical-align: middle;
                }
            </style>
            <div class="warga-card-grid">
                @forelse ($warga as $item)
                    <div class="warga-card">
                        <div class="card-actions">
                            <a href="{{ route('pages.warga.show', $item->warga_id) }}" class="btn btn-info" title="Lihat Detail">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('pages.warga.edit', $item->warga_id) }}" class="btn btn-warning" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('pages.warga.destroy', $item->warga_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin hapus data?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        <div class="card-title">{{ $item->nama }}</div>
                        <div class="card-info"><strong>No KTP:</strong> {{ $item->no_ktp }}</div>
                        <div class="card-info"><strong>Jenis Kelamin:</strong> {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
                        <div class="card-info"><strong>Agama:</strong> {{ $item->agama }}</div>
                        <div class="card-info"><strong>Pekerjaan:</strong> {{ $item->pekerjaan }}</div>
                        <div class="card-info"><strong>Email:</strong> {{ $item->email }}</div>
                    </div>
                @empty
                    <div class="warga-card">
                        <div class="card-title">Belum ada data warga.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
