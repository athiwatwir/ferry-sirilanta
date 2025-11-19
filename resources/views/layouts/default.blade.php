<!doctype html>

<html lang="en" class="layout-navbar-fixed layout-wide" dir="ltr" data-skin="default" data-assets-path="../../assets/" data-template="front-pages" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />


    <link href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/css/core.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/css/pages/front-page.css') }}" rel="stylesheet" />

    <!-- Vendors CSS -->

    <!-- endbuild -->

    <link href="{{ asset('assets/vendor/libs/nouislider/nouislider.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" rel="stylesheet" />

    <!-- Page CSS -->

    <link href="{{ asset('assets/vendor/css/pages/front-page-landing.css') }}" rel="stylesheet" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->


    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/front-config.js') }}"></script>
    @yield('style')
    @stack('styles')
    <script>
        window.API_URL = "{{ config('app.api_url') }}";
        window.API_KEY = "{{ config('app.api_key') }}";

    </script>

</head>

<body>
    @include('layouts.section.loading')
    <script src="{{ asset('assets/vendor/js/dropdown-hover.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/mega-dropdown.js') }}"></script>

    <!-- Navbar: Start -->
    <nav class="layout-navbar shadow-none py-0">
        <div class="container">
            <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-8">
                <!-- Menu logo wrapper: Start -->
                <div class="navbar-brand app-brand demo d-flex py-0 me-4 me-xl-8 ms-0">
                    <!-- Mobile menu toggle: Start-->
                    <button class="navbar-toggler border-0 px-0 me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="icon-base ti tabler-menu-2 icon-lg align-middle text-heading fw-medium"></i>
                    </button>
                    <!-- Mobile menu toggle: End-->
                    <a href="/" class="app-brand-link">
                        <img src="{{ asset('img/logo.webp') }}" alt="" style="width: 120px;">
                    </a>
                </div>
                <!-- Menu logo wrapper: End -->
                <!-- Menu wrapper: Start -->
                <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                    <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="icon-base ti tabler-x icon-lg"></i>
                    </button>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-medium" aria-current="page" href="landing-page.html#landingHero">Home</a>
                        </li>

                    </ul>
                </div>
                <div class="landing-menu-overlay d-lg-none"></div>
                <!-- Menu wrapper: End -->
                <!-- Toolbar: Start -->
                <ul class="navbar-nav flex-row align-items-center ms-auto">

                    <!-- navbar button: Start -->
                    <li>
                        <a href="" class="btn btn-primary" target="_blank"><span class="tf-icons icon-base ti tabler-login scaleX-n1-rtl me-md-1"></span><span class="d-none d-md-block">Your Booking</span></a>
                    </li>
                    <!-- navbar button: End -->
                </ul>
                <!-- Toolbar: End -->
            </div>
        </div>
    </nav>
    <!-- Navbar: End -->

    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">

        <!-- Useful features: Start -->
        <section id="landingFeatures" class="section-py landing-features">
            <div class="container">
                @section('content')
            </div>
        </section>
        <!-- Useful features: End -->


    </div>

    <!-- / Sections:End -->

    <!-- Footer: Start -->
    <footer class="landing-footer bg-body footer-text">
        <div class="footer-top position-relative overflow-hidden z-1">
            <img src="../../assets/img/front-pages/backgrounds/footer-bg.png" alt="footer bg" class="footer-bg banner-bg-img z-n1" />
            <div class="container">
                <div class="row gx-0 gy-6 g-lg-10">
                    <div class="col-lg-5">
                        <a href="/" class="app-brand-link mb-6">
                            <img src="{{ asset('img/logo-w.png') }}" alt="" style="width: 160px;">
                        </a>

                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">

                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">

                    </div>
                    <div class="col-lg-3 col-md-4">

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3 py-md-5">
            <div class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
                <div class="mb-2 mb-md-0">
                    <span class="footer-bottom-text">©
                        <script>
                            document.write(new Date().getFullYear());

                        </script>
                    </span>
                    <a href="https://pixinvent.com" target="_blank" class="fw-medium text-white">,</a>

                </div>
                <div>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer: End -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/nouislider/nouislider.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>

    <!-- Main JS -->

    <script src="{{ asset('assets/js/front-main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/front-page-landing.js') }}"></script>

    <script src="{{ asset('js/api.js') }}"></script>
    <script src="{{ asset('js/loading.js') }}"></script>

    @yield('script')
</body>
</html>
