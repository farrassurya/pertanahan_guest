<!DOCTYPE html>
<html lang="id">
@include('layouts.guest.head')
<body>
    <div class="container py-5">
        <div class="card p-4" style="max-width:640px; margin:auto;">
            <h4 class="mb-3">Edit Profil Saya</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    @if($user->profile_photo)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Current Profile" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                        </div>
                    @endif
                    <input type="file" name="profile_photo" class="form-control" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah foto. Format: JPG, PNG, max 1MB</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" class="form-control" value="{{ $user->role === 'operator' ? 'Operator (Full CRUD Access)' : 'Warga (View & Input Only)' }}" disabled>
                    <small class="text-muted">Role tidak dapat diubah sendiri. Hubungi operator jika perlu perubahan role.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru (kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" name="password" class="form-control">
                    <small class="text-muted">Minimal 8 karakter, diawali huruf besar (A-Z)</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Kembali</a>
                    <button class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    @include('layouts.guest.scripts')
</body>
</html>
