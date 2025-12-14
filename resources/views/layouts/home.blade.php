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
    <link href="{{ asset('assets/vendor/css/pages/front-page.css?v=1.0.0') }}" rel="stylesheet" />

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

    <style>
        #landingHero {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 60px 0;
        }

        /* Background Slideshow */
        .bg-slideshow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .bg-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        .bg-slide.active {
            opacity: 1;
        }

        /* Overlay สำหรับทำให้อ่านง่ายขึ้น */
        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: -1;
            pointer-events: none;
            /* ไม่บล็อกการคลิก */
        }

        /* Content Layer */
        /*
        .hero-content {
            position: relative;
            z-index: 1;
        }
            */

        .slide-indicators {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            display: flex;
            gap: 10px;
        }

        .slide-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .slide-indicator.active {
            background: white;
            width: 30px;
            border-radius: 6px;
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
        <!-- Hero: Start -->
        <section id="hero-animation">
            <div id="landingHero" class="section-py landing-hero position-relative">
                <div class="bg-slideshow d-none d-sm-block">
                    <div class="bg-slide active" style="background-image: url('{{ asset('img/slide/DJI_0112.webp') }}');">
                    </div>
                    <div class="bg-slide" style="background-image: url('{{ asset('img/slide/DJI_0113.webp') }}');">
                    </div>
                    <div class="bg-slide" style="background-image: url('{{ asset('img/slide/DJI_0114.webp') }}');">
                    </div>
                    <div class="bg-slide" style="background-image: url('{{ asset('img/slide/DJI_0115.webp') }}');">
                    </div>
                </div>
                <div class="bg-overlay"></div>
                <div class="container hero-content">
                    <div class="text-center position-relative">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="card">
                                    <div class="card-body text-start">
                                        <h1 class="mb-0">
                                            Plan Ahead & Book <br>Your island escape
                                        </h1>
                                        <x-booking.form />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="slide-indicators">
                    <div class="slide-indicator active" data-slide="0"></div>
                    <div class="slide-indicator" data-slide="1"></div>
                    <div class="slide-indicator" data-slide="2"></div>
                </div>
            </div>
    </div>

    </section>
    <!-- Hero: End -->

    <!-- Useful features: Start -->
    <section id="landingFeatures" class="py-3">
        <div class="container">
            @yield('content')
        </div>
    </section>
    <!-- Useful features: End -->


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

    <script>
        // Background Slideshow
        let currentSlide = 0;
        const slides = document.querySelectorAll('.bg-slide');
        const indicators = document.querySelectorAll('.slide-indicator');
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(indicator => indicator.classList.remove('active'));

            slides[index].classList.add('active');
            indicators[index].classList.add('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        // Auto slide every 5 seconds
        setInterval(nextSlide, 5000);

        // Manual slide control
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });

    </script>


    @yield('script')
</body>

</html>
