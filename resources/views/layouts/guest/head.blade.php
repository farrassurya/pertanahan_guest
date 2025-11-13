<head>
    <meta charset="utf-8">
    <title>Pertanahan - Guest</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-guest/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">

    {{-- style css utk topbar --}}
    <style>
        .btn-signup-custom {
            background-color: #e49e10;
            color: white;
            border-radius: 8px;
            border: 2px solid #ffffff;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-signup-custom:hover {
            background-color: #e49e10;
            border: 2px solid #ffffff;
            color: rgb(0, 0, 0);
        }

        .btn-login-custom {
            background-color: #e49e10;
            color: white;
            border-radius: 8px;
            border: 2px solid #fffdfd;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-login-custom:hover {
            background-color: #e49e10;
            border: 2px solid #ffffff;
            color: rgb(0, 0, 0);
        }

        .btn-signup-custom,
        .btn-login-custom {
            min-width: 90px;
            text-align: center;
        }

        /* HANYA INI YANG DITAMBAHIN - Reset margin body buat hilangkan sidebar space */
        body {
            margin-left: 0 !important;
        }

        /* Sembunyikan sidebar yang tidak dipakai */
        .user-sidebar {
            display: none !important;
        }

        /* PASTIKAN UKURAN NORMAL - Reset semua yang bikin gede */
        html, body {
            font-size: 14px !important;
        }

        h1 { font-size: 2.5rem !important; }
        h2 { font-size: 2rem !important; }
        h3 { font-size: 1.75rem !important; }
        h4 { font-size: 1.5rem !important; }
        h5 { font-size: 1.25rem !important; }
        h6 { font-size: 1rem !important; }

        .display-1 { font-size: 5rem !important; }
        .display-2 { font-size: 4.5rem !important; }
        .display-3 { font-size: 4rem !important; }
        .display-4 { font-size: 3.5rem !important; }
        .display-5 { font-size: 3rem !important; }
        .display-6 { font-size: 2.5rem !important; }

        /* Ukuran icon normal */
        .fa-4x { font-size: 2.5em !important; }
        .fa-3x { font-size: 2em !important; }
        .fa-2x { font-size: 1.5em !important; }

        /* Container tetap 100% tapi konten normal */
        .container-fluid {
            width: 100% !important;
            padding-left: 15px;
            padding-right: 15px;
        }
    </style>
</head>
