<!DOCTYPE html>
<html lang="en">

@include('layouts.guest.head')

<body>
    <!-- Intentionally omitted topbar, navbar, and sidebar for a clean DB-style page -->

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <a href="{{ route('guest.services') }}" class="btn btn-outline-secondary me-3" title="Kembali ke Services">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <h3 class="m-0">Edit Jenis Penggunaan</h3>
            </div>
            <a href="{{ route('jenis-penggunaan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('jenis-penggunaan.update', $item->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Penggunaan</label>
                <input type="text" name="nama_penggunaan" value="{{ old('nama_penggunaan', $item->nama_penggunaan) }}" class="form-control @error('nama_penggunaan') is-invalid @enderror">
                @error('nama_penggunaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control">{{ old('keterangan', $item->keterangan) }}</textarea>
            </div>
            <button class="btn btn-primary">Perbarui</button>
        </form>
    </div>

    @include('layouts.guest.scripts')
</body>

</html>
