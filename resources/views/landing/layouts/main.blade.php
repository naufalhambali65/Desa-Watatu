<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Desa Watatu | Website Desa</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="/landing_assets/assets/img/logo/logo.png" rel="icon" />
    <link href="/landing_assets/assets/img/logo/logo.png" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/landing_assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/landing_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/landing_assets/assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="/landing_assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="/landing_assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="/landing_assets/assets/css/main.css" rel="stylesheet" />

    @yield('head')
    <!-- =======================================================
  * Template Name: Ninestars
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @include('landing.layouts.header')

    <main class="main">
        @yield('container')
    </main>

    @include('landing.layouts.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/landing_assets/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/landing_assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/landing_assets/assets/vendor/php-email-form/validate.js"></script>
    <script src="/landing_assets/assets/vendor/aos/aos.js"></script>
    <script src="/landing_assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/landing_assets/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/landing_assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/landing_assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- Main JS File -->
    <script src="/landing_assets/assets/js/main2.js"></script>
    <script src="/landing_assets/assets/js/main.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>

    @yield('js')
</body>

</html>
