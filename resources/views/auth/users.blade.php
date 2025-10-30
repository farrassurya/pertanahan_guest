<!DOCTYPE html>
<html lang="id">
@include('layouts.guest.head')
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <a href="{{ route('auth.index') }}" class="btn btn-outline-secondary me-3" title="Kembali ke Login">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <h3 class="m-0">Users</h3>
            </div>
            <a href="{{ route('auth.register') }}" class="btn btn-success">Tambah User</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Hash (password)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td style="font-family:monospace; font-size:12px; max-width:320px; overflow:auto;">{{ $u->password }}</td>
                            <td style="white-space:nowrap;">
                                <a href="{{ route('auth.users.edit', $u->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('auth.users.destroy', $u->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus user ini?');">
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

        {{ $users->links() }}
    </div>

    @include('layouts.guest.scripts')
</body>
</html>
