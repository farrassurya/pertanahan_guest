@extends('layouts.guest.app')

@section('title', 'Tambah Media - Pertanahan')

@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4">Tambah Data Media</h3>
                <form action="{{ route('pages.media.store') }}" method="POST">
                    @csrf
                    @include('pages.media._form')
                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('pages.media.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
