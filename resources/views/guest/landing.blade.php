<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIVO | Sistem Informasi Inventaris Depo</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/landing/font/raleway.css') }}">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/aos/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/swiper/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('vendor/datatables/css/datatables.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bs5.min.css') }}">

    <!-- Landing CSS Files -->
    <link rel="stylesheet" href="{{ asset('vendor/landing/css/style.css') }}">
</head>

<body>
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="hero-container d-flex flex-column justify-content-start" data-aos="fade-in">
                <h1 class="text-left">
                    <a href="" id="admin" style="text-decoration: none;color: #fff;font-size: 2.5rem;">Sistem Informasi Inventaris Depo</a>
                </h1>
                <p class="text-left" style="font-size: 1.3rem;">Cek Persediaan <span class="typed" data-typed-items="Bahan Cair, Bahan Padat, Alat"></span></p>

                <div class="btn-toolbar justify-content-start" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <a id="user" class="btn btn-lg btn-warning d-flex justify-content-start align-items-center" style="font-size: 1.5rem; padding: 1rem 2rem;"
                            role="button" data-aos="fade-left">
                            <b><i class="bi bi-journal-richtext"></i> Logbook</b>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vendor CSS Files -->
    <script src="{{ asset('vendor/jquery/js/jquery.js') }}"></script>
    <script src="{{ asset('vendor/aos/js/aos.js') }}"></script>
    <script src="{{ asset('vendor/purecounter/js/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/typed.js/js/typed.umd.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>

    <!-- Landing JS Files -->
    <script src="{{ asset('vendor/landing/js/main.js') }}"></script>
    <script src="{{ asset('vendor/landing/js/sw-login-admin.js') }}"></script>
    <script src="{{ asset('vendor/landing/js/sw-login-user.js') }}"></script>
</body>

</html>
