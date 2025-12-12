<!DOCTYPE html>
<html lang="id">
@include('layouts.guest.head')
<body>
    <div class="container py-5">
        <div class="card p-4" style="max-width:640px; margin:auto;">
            <h4 class="mb-3">Edit User</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pages.auth.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="operator" {{ old('role', $user->role) === 'operator' ? 'selected' : '' }}>Operator (Full CRUD Access)</option>
                        <option value="warga" {{ old('role', $user->role) === 'warga' ? 'selected' : '' }}>Warga (View & Input Only)</option>
                    </select>
                    <small class="text-muted">Operator memiliki akses penuh untuk Edit & Hapus data</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password (kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pages.auth.users') }}" class="btn btn-outline-secondary">Kembali</a>
                    <button class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    @include('layouts.guest.scripts')
</body>
</html>
