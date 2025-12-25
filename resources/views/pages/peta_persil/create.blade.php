@extends('layouts.guest.app')

@section('title', 'Tambah Peta Persil - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('pages.peta-persil.index') }}" class="btn btn-outline-secondary me-3">
                <i class="fa fa-arrow-left"></i>
            </a>
            <h2 class="text-uppercase mb-0">Tambah Peta Persil</h2>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong><i class="fa fa-exclamation-circle me-2"></i>Terdapat kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm" style="border-radius: 12px;">
            <div class="card-body p-4">
                @include('pages.peta_persil.form', ['action' => route('pages.peta-persil.store'), 'method' => 'POST'])
            </div>
        </div>
    </div>
</div>
@endsection
