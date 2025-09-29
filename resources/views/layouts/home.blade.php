<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Flight Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/loading.css') }}">

    @yield('style')
    @stack('styles')
    <script>
        window.API_URL = "{{ config('app.api_url') }}";
        window.API_KEY = "{{ config('app.api_key') }}";

    </script>
</head>
<body>
    {{-- Loading Component --}}
    @include('layouts.section.loading')

    <!-- HTML -->
    <div class="hero-bg" aria-hidden="true"></div>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="150" />

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Flights</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tours</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <header class="hero">
        <div class="hero__content">
            <div class="card" style="width: 36rem;">

                <div class="card-body">
                    <h2 class="card-title text-main">Plan Ahead & Book With Confidence</h2>


                    <x-booking.form />
                </div>
            </div>
        </div>
    </header>

    <main class="">
        <div class="container py-4">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-main">Trending Destinations</h2>
                </div>
                <div class="col-12">

                    <x-home.trending />
                </div>
            </div>





        </div>



        <footer class="bg-dark py-5" style="--bs-bg-opacity: .8;">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('assets/img/logo-w.png') }}" alt="Logo" width="120" />

                </a>

                <div class="row">
                    <div class="col-12 text-center">
                        <p class="mt-2">© Copyright 2025</p>
                    </div>
                </div>
            </div>

        </footer>
    </main>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/js/api.js') }}"></script>
    <script src="{{ asset('assets/js/loading.js') }}"></script>

    <script>
        $(window).on("scroll", function() {
            if ($(this).scrollTop() > 50) {
                $("nav.navbar").addClass("navbar-scrolled");
            } else {
                $("nav.navbar").removeClass("navbar-scrolled");
            }
        });


        const multipleItemCarousel = document.querySelector("#testimonialCarousel");

        if (window.matchMedia("(min-width:576px)").matches) {
            const carouselWidth = $(".carousel-inner")[0].scrollWidth;
            const cardWidth = $(".carousel-item").outerWidth(true);
            let scrollPosition = 0;

            // ปุ่ม Next
            $(".carousel-control-next").on("click", function() {
                if (scrollPosition < carouselWidth - cardWidth * 3) {
                    scrollPosition += cardWidth;
                } else {
                    scrollPosition = 0; // กลับไปเริ่มใหม่
                }
                $(".carousel-inner").animate({
                    scrollLeft: scrollPosition
                }, 800);
            });

            // ปุ่ม Prev
            $(".carousel-control-prev").on("click", function() {
                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                } else {
                    scrollPosition = carouselWidth - cardWidth * 3; // ไปท้ายสุด
                }
                $(".carousel-inner").animate({
                    scrollLeft: scrollPosition
                }, 800);
            });

            // Auto slide ทุก 3 วินาที
            setInterval(function() {
                if (scrollPosition < carouselWidth - cardWidth * 3) {
                    scrollPosition += cardWidth;
                } else {
                    scrollPosition = 0; // กลับไปเริ่มใหม่
                }
                $(".carousel-inner").animate({
                    scrollLeft: scrollPosition
                }, 800);
            }, 3000);

        } else {
            // mobile ใช้ bootstrap carousel ปกติ
            $(multipleItemCarousel).addClass("slide");
        }

    </script>
    @yield('script')
</body>
</html>
