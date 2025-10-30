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
                <h3 class="m-0">Daftar Jenis Penggunaan</h3>
            </div>
            <a href="{{ route('jenis-penggunaan.create') }}" class="btn btn-success">Tambah</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Penggunaan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $it)
                        <tr>
                            <td>{{ $it->id }}</td>
                            <td>{{ $it->nama_penggunaan }}</td>
                            <td>{{ Str::limit($it->keterangan, 120) }}</td>
                            <td style="white-space:nowrap;">
                                <a href="{{ route('jenis-penggunaan.edit', $it->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('jenis-penggunaan.destroy', $it->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $items->links() }}
    </div>

    @include('layouts.guest.scripts')
</body>

</html>
