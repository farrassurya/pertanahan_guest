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
    </style>

    {{-- css sidebar--}}
    <style>
        .user-sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 200px;
            background: #fff;
            border-right: 1px solid rgba(0,0,0,0.04);
            padding: 12px;
            z-index: 1050;
            overflow-y: auto;
            box-shadow: 0 1px 6px rgba(0,0,0,0.04);
            transform: translateX(0);
            transition: transform .22s ease-in-out, width .2s ease-in-out;
        }

        .user-sidebar .user-avatar{
            width:40px; /* smaller avatar */
            height:40px;
            font-size:18px;
        }

        .user-sidebar .user-sidebar-inner {
            font-size: 14px; /* slightly smaller text */
        }

        .user-sidebar .list-group-item{
            border: none;
            padding-left: 0;
            padding-right: 0;
            font-size: 14px;
        }

        /* When viewport is small, hide sidebar by default and show a toggle button in header */
        @media (max-width: 991.98px) {
            .user-sidebar{
                transform: translateX(-110%);
                width: 240px; /* keep a bit larger on mobile when opened */
            }
            body.sidebar-open {
                overflow: hidden;
            }
        }

        /* Push page content right on large screens so the sidebar doesn't overlap */
        @media (min-width: 992px) {
            body{
                margin-left: 200px; /* match the new sidebar width */
            }
            .d-lg-none.sidebar-toggle-btn{
                display:none !important;
            }
        }

        /* Small helper to collapse sidebar visually */
        .user-sidebar.collapsed{
            transform: translateX(-110%);
        }
    </style>
</head>
