<!doctype html>

<html lang="en" class="layout-navbar-fixed layout-wide" dir="ltr" data-skin="default" data-assets-path="../../assets/" data-template="front-pages" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>SIRI LANTA, Official Website Tigerline Ferry & Sirilanta Speedboat go to all islands</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />


    <link href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css?v=1.0') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/css/core.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/css/pages/front-page.css?v=1.0.5') }}" rel="stylesheet" />

    <!-- Vendors CSS -->

    <!-- endbuild -->

    <link href="{{ asset('assets/vendor/libs/nouislider/nouislider.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" rel="stylesheet" />

    <!-- Page CSS -->

    <link href="{{ asset('assets/vendor/css/pages/front-page-landing.css?v=1.0.5') }}" rel="stylesheet" />

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

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .landing-footer {
            margin-top: auto;
        }

    </style>

</head>

<body>
    @include('layouts.section.loading')
    <script src="{{ asset('assets/vendor/js/dropdown-hover.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/mega-dropdown.js') }}"></script>

    <!-- Navbar: Start -->
    @include('layouts.section.nav')

    <!-- Navbar: End -->

    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">

        <!-- Useful features: Start -->
        <section id="landingFeatures" class="section-py">
            <div class="container">
                @yield('content')
            </div>
        </section>
        <!-- Useful features: End -->


    </div>

    <!-- / Sections:End -->

    <!-- Footer: Start -->
    @include('layouts.section.footer')
    <!-- Footer: End -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/nouislider/nouislider.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>

    <!-- Main JS -->

    <script src="{{ asset('js/api.js') }}"></script>
    <script src="{{ asset('js/loading.js') }}"></script>

    @yield('script')
</body>
</html>
