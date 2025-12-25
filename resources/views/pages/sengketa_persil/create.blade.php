@extends('layouts.guest.app')

@section('title', 'Tambah Sengketa Persil - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase mb-0">Tambah Sengketa Persil</h2>
            <a href="{{ route('pages.sengketa-persil.index') }}" class="btn btn-secondary">
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
                @include('pages.sengketa_persil.form', ['action' => route('pages.sengketa-persil.store'), 'method' => 'POST'])
            </div>
        </div>
    </div>
</div>
@endsection
