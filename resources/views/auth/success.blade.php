<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Berhasil</title>
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
            overflow: hidden;
            color: #333;
        }

        .success-box {
            background: #fff;
            padding: 45px 40px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            text-align: center;
            width: 360px;
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

        .success-box h2 {
            color: #2E7D32;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .success-box p {
            color: #555;
            margin-bottom: 25px;
            font-size: 15px;
        }

        .checkmark {
            font-size: 60px;
            color: #2E7D32;
            margin-bottom: 15px;
            animation: pop 0.5s ease-out;
        }

        @keyframes pop {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .btn-back {
            background-color: #2196F3;
            color: white;
            border: none;
            padding: 10px 0;
            width: 100%;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background-color: #1976D2;
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <div class="success-box">
        <div class="checkmark">✅</div>
        <h2>Login Berhasil!</h2>
        <p>Selamat datang, <strong>{{ $email }}</strong> </p>
        <a href="{{ route('index') }}" class="btn-back">Ke Halaman Utama</a>
    </div>
</body>
</html>
