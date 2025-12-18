<!DOCTYPE html>
<html lang="id">

@include('layouts.guest.head')

<body>
    <style>
        /* Center auth card relative to viewport (ignores page body margin) */
        .auth-center {
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
            box-sizing: border-box;
            z-index: 2000;
        }

        @media (max-width: 576px) {
            .auth-center { padding: 10px; }
            .auth-card { width: 100%; }
        }
    </style>

    <div class="auth-center">
        <div class="card p-4 shadow-sm auth-card" style="max-width:480px; width:100%;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Register (Sign Up)</h4>
                <a href="{{ route('pages.guest.home') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fa fa-arrow-left me-1"></i> Home
                </a>
            </div>

            {{-- success message --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pages.auth.register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama (opsional)</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                        placeholder="Nama lengkap">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Profil (opsional)</label>
                    <input type="file" name="profile_photo" class="form-control" accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, max 1MB</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                        placeholder="email@contoh.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="position-relative">
                        <input type="password" name="password" id="passwordField" class="form-control" placeholder="Minimal 8 karakter" style="padding-right: 45px;" required>
                        <button type="button" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #666; font-size: 18px;">
                            <i class="fa fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <div class="position-relative">
                        <input type="password" name="password_confirmation" id="passwordConfirmField" class="form-control" placeholder="Ulangi password" style="padding-right: 45px;" required>
                        <button type="button" id="togglePasswordConfirm" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #666; font-size: 18px;">
                            <i class="fa fa-eye" id="eyeIconConfirm"></i>
                        </button>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('pages.auth.index') }}" class="btn btn-outline-secondary">Kembali ke Login</a>
                    <button class="btn btn-primary" type="submit">Daftar</button>
                </div>
            </form>

        </div>
    </div>

    @include('layouts.guest.scripts')

    <script>
        // Toggle password visibility
        const toggleBtn = document.getElementById('togglePassword');
        const passwordField = document.getElementById('passwordField');
        const eyeIcon = document.getElementById('eyeIcon');

        if (toggleBtn && passwordField && eyeIcon) {
            toggleBtn.addEventListener('click', function () {
                const isHidden = passwordField.type === 'password';
                passwordField.type = isHidden ? 'text' : 'password';
                eyeIcon.classList.toggle('fa-eye');
                eyeIcon.classList.toggle('fa-eye-slash');
            });
        }

        // Toggle password confirmation visibility
        const toggleBtnConfirm = document.getElementById('togglePasswordConfirm');
        const passwordConfirmField = document.getElementById('passwordConfirmField');
        const eyeIconConfirm = document.getElementById('eyeIconConfirm');

        if (toggleBtnConfirm && passwordConfirmField && eyeIconConfirm) {
            toggleBtnConfirm.addEventListener('click', function () {
                const isHidden = passwordConfirmField.type === 'password';
                passwordConfirmField.type = isHidden ? 'text' : 'password';
                eyeIconConfirm.classList.toggle('fa-eye');
                eyeIconConfirm.classList.toggle('fa-eye-slash');
            });
        }
    </script>
</body>

</html>
