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

            <form action="{{ route('pages.auth.register.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama (opsional)</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                        placeholder="Nama lengkap">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                        placeholder="email@contoh.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Ulangi password" required>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('pages.auth.index') }}" class="btn btn-outline-secondary">Kembali ke Login</a>
                    <button class="btn btn-primary" type="submit">Daftar</button>
                </div>
            </form>

        </div>
    </div>

    @include('layouts.guest.scripts')
</body>

</html>
