<!DOCTYPE html>
<html lang="id">
@include('layouts.guest.head')
<body style="background: linear-gradient(135deg, #f8f4ed 0%, #fdfbf7 100%); min-height: 100vh;">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap');

        .profile-container {
            padding: 3rem 1rem;
            max-width: 700px;
            margin: 0 auto;
        }

        .profile-card {
            background: linear-gradient(180deg, #fff, #fbfbfd);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(184, 125, 26, 0.12);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(184, 125, 26, 0.1);
        }

        /* Decorative circles */
        .profile-card::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(184,125,26,0.08) 0%, transparent 70%);
            border-radius: 50%;
            top: -80px;
            right: -80px;
            z-index: 0;
        }

        .profile-card::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(184,125,26,0.05) 0%, transparent 70%);
            border-radius: 50%;
            bottom: -60px;
            left: -60px;
            z-index: 0;
        }

        .profile-content {
            position: relative;
            z-index: 1;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f0e9dc;
        }

        .profile-header h4 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            color: #1f2d3d;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            letter-spacing: 0.5px;
        }

        .profile-header p {
            color: #6c757d;
            font-size: 0.95rem;
            margin: 0;
        }

        .form-label {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #1f2d3d;
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border: 1px solid #e0dcc8;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fafafa;
            cursor: text;
        }

        .form-control:focus, .form-select:focus {
            border-color: #b87d1a;
            box-shadow: 0 0 0 3px rgba(184, 125, 26, 0.1);
            background: #fff;
            cursor: text;
        }

        input[type="file"].form-control {
            cursor: pointer;
        }

        .profile-photo-wrapper {
            text-align: center;
            margin-bottom: 1rem;
        }

        .profile-photo-wrapper img {
            border: 4px solid #f0e9dc;
            box-shadow: 0 4px 12px rgba(184, 125, 26, 0.15);
            transition: all 0.3s ease;
        }

        .profile-photo-wrapper img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(184, 125, 26, 0.25);
        }

        .btn {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #b87d1a 0%, #d4a055 100%);
            border: none;
            box-shadow: 0 4px 12px rgba(184, 125, 26, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #a36b14 0%, #c08f45 100%);
            box-shadow: 0 6px 20px rgba(184, 125, 26, 0.4);
            transform: translateY(-2px);
        }

        .btn-outline-secondary {
            border: 2px solid #6c757d;
            color: #6c757d;
            background: transparent;
        }

        .btn-outline-secondary:hover {
            background: #6c757d;
            color: #fff;
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.25rem;
            font-family: 'Montserrat', sans-serif;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
        }

        .badge-role {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
        }

        small.text-muted {
            color: #8a8a8a !important;
            font-size: 0.82rem;
        }

        @media (max-width: 768px) {
            .profile-card {
                padding: 1.5rem;
            }
            .profile-header h4 {
                font-size: 1.4rem;
            }
        }
    </style>

    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-content">
            <div class="profile-content">
                <div class="profile-header">
                    <h4>Edit Profil Saya</h4>
                    <p>Perbarui informasi akun Anda</p>
                </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fa fa-exclamation-circle me-2"></i>
                    <strong>Terdapat kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">Foto Profil</label>
                    @if($user->profile_photo)
                        <div class="profile-photo-wrapper">
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Current Profile" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                        </div>
                    @endif
                    <input type="file" name="profile_photo" class="form-control" accept="image/*">
                    <small class="text-muted"><i class="fa fa-info-circle me-1"></i>Kosongkan jika tidak ingin mengubah foto. Format: JPG, PNG, max 1MB</small>
                </div>

                <div class="mb-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Role</label>
                    <div class="form-control d-flex align-items-center" style="background: #f8f9fa; cursor: not-allowed;">
                        <span class="badge-role me-2">
                            {{ $user->role === 'operator' ? 'Operator' : 'Warga' }}
                        </span>
                        <span style="color: #6c757d;">{{ $user->role === 'operator' ? 'Full CRUD Access' : 'View & Input Only' }}</span>
                    </div>
                    <small class="text-muted"><i class="fa fa-lock me-1"></i>Role tidak dapat diubah sendiri. Hubungi operator jika perlu perubahan role.</small>
                </div>

                <div class="mb-4">
                    <label class="form-label">Password Baru (kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password baru">
                    <small class="text-muted"><i class="fa fa-shield-alt me-1"></i>Minimal 8 karakter, diawali huruf besar (A-Z)</small>
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password baru">
                </div>

                <div class="d-flex justify-content-between gap-3 mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                        <i class="fa fa-arrow-left me-2"></i>Kembali
                    </a>
                    <button class="btn btn-primary">
                        <i class="fa fa-save me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>

    @include('layouts.guest.scripts')
</body>
</html>
