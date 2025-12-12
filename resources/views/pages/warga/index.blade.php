@extends('layouts.guest.app')

@section('title', 'Data Warga - Pertanahan')

@section('content')
    <div class="container-fluid py-4">
        <div class="container">
            <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                <h2 class="text-uppercase mb-0">Data Warga</h2>
                <a href="{{ route('pages.warga.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-1"></i> Tambah Warga
                </a>
            </div>

            {{-- Wrapper with border --}}
            <div class="position-relative rounded-3 p-4 bg-white" style="border: 1px solid #e0e0e0; box-shadow: 0 4px 12px rgba(0,0,0,0.08), 0 2px 4px rgba(0,0,0,0.05); background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);">
                {{-- Top accent border --}}
                <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #b87d1a 0%, #d4a055 50%, #b87d1a 100%); border-radius: 8px 8px 0 0;"></div>

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

                {{-- Filter --}}
                <div class="mb-4">
                    <style>
                        .btn-clear-custom:hover {
                            background-color: #b87d1a !important;
                            color: white !important;
                        }
                        .btn-clear-custom:active {
                            background-color: #a36b14 !important;
                            color: white !important;
                        }
                    </style>
                    <form method="GET" action="{{ route('pages.warga.index') }}" class="d-flex gap-2 align-items-end">
                        <div>
                            <select name="jenis_kelamin" class="form-select form-select-lg" onchange="this.form.submit()" style="border-radius: 12px; min-width: 220px; padding: 12px 20px; font-size: 1rem;">
                                <option value="">Semua</option>
                                <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki ♂️</option>
                                <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan ♀️</option>
                            </select>
                        </div>
                        <div style="min-width: 250px;">
                            <div class="input-group input-group-lg">
                                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}" style="border-radius: 12px 0 0 12px; padding: 12px 20px; font-size: 1rem;">
                                <button type="submit" class="btn" style="background-color: white; border: 1px solid #ced4da; border-radius: 0 {{ request('search') ? '' : '12px 12px' }} 0; border-left: 1px solid #ced4da; color: #6c757d;">
                                    <i class="fa fa-search"></i>
                                </button>
                                @if(request('search'))
                                <a href="{{ route('pages.warga.index', ['jenis_kelamin' => request('jenis_kelamin')]) }}" class="btn btn-clear-custom" style="background-color: white; color: #b87d1a; border: 1px solid #ced4da; border-radius: 0 12px 12px 0; border-left: 1px solid #ced4da; font-weight: normal; transition: all 0.3s ease;">
                                    Clear
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

            {{-- card --}}
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

                .warga-card-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                    gap: 1.25rem;
                }

                @media (max-width: 576px) {
                    .warga-card-grid {
                        grid-template-columns: 1fr;
                        gap: 1rem;
                    }
                }

                .warga-card {
                    border: 0;
                    border-radius: 12px;
                    overflow: hidden;
                    background: linear-gradient(180deg, #ffffff 0%, #fbfbfd 100%);
                    box-shadow: 0 8px 30px rgba(11, 18, 35, 0.06);
                    transition: transform .28s cubic-bezier(.2, .9, .3, 1), box-shadow .28s ease;
                    position: relative;
                    border-left: 6px solid rgba(184, 125, 26, 0.14);
                    min-height: 140px;
                    padding: 1.1rem 1.25rem;
                }

                .warga-card:hover {
                    transform: translateY(-8px);
                    box-shadow: 0 18px 48px rgba(11, 18, 35, 0.12);
                }

                .warga-card::after {
                    content: '';
                    position: absolute;
                    left: 0;
                    top: 0;
                    bottom: 0;
                    width: 6px;
                    background: linear-gradient(180deg, #b87d1a, #e6b66a);
                    opacity: .08;
                }

                .warga-card .card-title {
                    font-weight: 700;
                    letter-spacing: .2px;
                    font-family: 'Poppins', sans-serif;
                    font-size: 1.05rem;
                    color: #1f2d3d;
                    margin-bottom: 0.4rem;
                }

                .warga-card .card-meta {
                    font-size: 13px;
                    color: #6c757d;
                    margin-bottom: 0.6rem;
                }

                .warga-card .card-body {
                    padding: 0;
                }

                .warga-card .card-info {
                    color: #555;
                    margin-bottom: 0.35rem;
                    font-size: 14px;
                    line-height: 1.5;
                }

                .warga-card .card-info strong {
                    color: #b87d1a;
                    font-weight: 600;
                }

                .warga-card .card-actions {
                    display: flex;
                    gap: 0.5rem;
                }

                .warga-card .card-actions .btn {
                    font-size: 12px;
                    padding: 0.35rem 0.65rem;
                    border-radius: 6px;
                    transition: all 0.2s ease;
                }

                .warga-card .card-actions .btn i {
                    font-size: 12px;
                }

                .warga-card .btn-outline-primary {
                    color: #b87d1a;
                    border-color: #b87d1a;
                }

                .warga-card .btn-outline-primary:hover {
                    background-color: #b87d1a;
                    border-color: #b87d1a;
                    color: #fff;
                }

                .warga-card .btn-outline-secondary {
                    color: #6c757d;
                    border-color: #6c757d;
                }

                .warga-card .btn-outline-secondary:hover {
                    background-color: #6c757d;
                    border-color: #6c757d;
                    color: #fff;
                }

                .warga-card .btn-outline-danger {
                    color: #dc3545;
                    border-color: #dc3545;
                }

                .warga-card .btn-outline-danger:hover {
                    background-color: #dc3545;
                    border-color: #dc3545;
                    color: #fff;
                }

                @media (max-width: 576px) {
                    .warga-card {
                        padding: 1rem;
                    }
                    .warga-card .card-title {
                        font-size: 0.95rem;
                    }
                    .warga-card .card-meta,
                    .warga-card .card-info {
                        font-size: 12px;
                    }
                    .warga-card .card-actions .btn {
                        font-size: 11px;
                        padding: 0.3rem 0.5rem;
                    }
                }
            </style>

            <div class="warga-card-grid">
                @forelse ($warga as $item)
                    <div class="card warga-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <div class="card-title d-flex align-items-center gap-2">
                                        {{ $item->nama }}
                                        @if($item->jenis_kelamin == 'L')
                                            <i class="fa fa-mars" style="color: #3498db; font-size: 1.2rem;" title="Laki-laki"></i>
                                        @else
                                            <i class="fa fa-venus" style="color: #e91e63; font-size: 1.2rem;" title="Perempuan"></i>
                                        @endif
                                    </div>
                                    <div class="card-meta">No KTP: {{ $item->no_ktp }}</div>
                                </div>
                                <div class="card-actions">
                                    <a href="{{ route('pages.warga.show', $item->warga_id) }}"
                                       class="btn btn-sm btn-outline-primary"
                                       title="Lihat Detail">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @if(auth()->user()->isOperator())
                                        <a href="{{ route('pages.warga.edit', $item->warga_id) }}"
                                           class="btn btn-sm btn-outline-secondary"
                                           title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('pages.warga.destroy', $item->warga_id) }}"
                                              method="POST"
                                              style="display:inline-block;"
                                              onsubmit="return confirm('Hapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>

                            <p class="card-info mb-2">
                                <strong>Agama:</strong> {{ $item->agama }}
                            </p>
                            <p class="card-info mb-2">
                                <strong>Pekerjaan:</strong> {{ $item->pekerjaan }}
                            </p>
                            <p class="card-info mb-0">
                                <strong>Email:</strong> {{ $item->email }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="card warga-card">
                        <div class="card-body">
                            <div class="card-title">Belum ada data warga.</div>
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-4 mb-0">
                <nav aria-label="Pagination Warga">
                    {{ $warga->onEachSide(2)->links('pagination::bootstrap-5') }}
                </nav>
            </div>
            </div>
            {{-- End wrapper --}}
        </div>
    </div>
@endsection
