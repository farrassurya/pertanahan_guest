<!DOCTYPE html>
<html lang="id">
{{-- tampilan dari login --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffffff, #b8b8b8);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: #fff;
            padding: 50px 40px;
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            width: 420px;
            text-align: center;
            transform: translateY(40px);
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards;
        }

        @keyframes fadeIn {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .login-box h2 {
            color: #222;
            margin-bottom: 22px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .error-msg {
            background-color: #ffecec;
            color: #d9534f;
            border: 1px solid #f5c2c2;
            padding: 10px;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 15px;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .input-group {
            margin-bottom: 18px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 13px;
            color: #555;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            transition: all 0.2s ease-in-out;
        }

        .input-group input:focus {

            outline: none;
            box-shadow: 0 0 6px rgba(33, 150, 243, 0.3);
        }

        .toggle-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .toggle-container label {
            margin-bottom: 5px;
        }

        .toggle-container .toggle-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            color: #2196F3;
            transition: 0.2s;
        }

        .toggle-container .toggle-btn:hover {
            color: #1976D2;
            text-decoration: underline;
        }

        .btn-login {
            background-color: #e49e10; /* theme gold color */
            color: white;
            border: none;
            width: 100%;
            padding: 12px 0;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.18s ease;
            box-shadow: 0 6px 18px rgba(228,158,16,0.14);
        }

        .btn-login:hover {
            background-color: #c67e08; /* darker gold on hover */
            transform: translateY(-1px) scale(1.01);
        }

        .forgot {
            margin-top: 20px;
            font-size: 13px;
        }

        .forgot a {
            color: #777;
            text-decoration: none;
        }

        .forgot a:hover {
            color: #2196F3;
        }
    </style>
</head>
<body>
    <div class="login-box">

        {{-- tampilkan pesan sukses atau error global --}}
        @if(session('success'))
            <div class="error-msg" style="background:#e6ffed; color:#116530; border-color:#c8f0d6">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="error-msg">{{ $error }}</div>
            @endforeach
        @endif

        <form action="{{ route('pages.auth.login') }}" method="POST">
            @csrf
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Masukkan email">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" id="passwordField" placeholder="Masukkan password">
            </div>

            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px">
            </div>

            <button class="btn-login" type="submit">Masuk</button>
        </form>

        <div style="margin-top:14px; font-size:14px; color:#666">Belum punya akun? <a href="{{ route('pages.auth.register') }}" style="color:#1297e4; text-decoration:none; font-weight:600">Daftar sekarang</a></div>
    </div>

    <script>
        // Password toggle is optional - only wire if toggle exists
        const toggleBtn = document.getElementById('togglePassword');
        const passwordField = document.getElementById('passwordField');
        if (toggleBtn && passwordField) {
            toggleBtn.addEventListener('click', function () {
                const isHidden = passwordField.type === 'password';
                passwordField.type = isHidden ? 'text' : 'password';
                toggleBtn.textContent = isHidden ? 'Sembunyikan Password' : 'Lihat Password';
            });
        }
    </script>
</body>
</html>
