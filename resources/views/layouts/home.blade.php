<!doctype html>

<html lang="en" class="layout-navbar-fixed layout-wide" dir="ltr" data-skin="default" data-assets-path="../../assets/" data-template="front-pages" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title></title>

    <meta name="description" content="" />

    @include('layouts.section.style')
    @yield('style')
    @stack('styles')
    <script>
        window.API_URL = "{{ config('app.api_url') }}";
        window.API_KEY = "{{ config('app.api_key') }}";

    </script>

    <style>
        #landingHero {
            position: relative;

            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 60px 0;
        }

        /* Overlay สำหรับทำให้อ่านง่ายขึ้น */
        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(93, 93, 93, 0.3);

            pointer-events: none;
            /* ไม่บล็อกการคลิก */
        }

        .bg-slideshow {
            position: absolute;
            inset: 0;
            overflow: hidden;
        }

        .bg-slide {
            position: absolute;
            inset: 0;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
        }

        .bg-slide.active {
            opacity: 1;

        }

        .bg-slide.prev {}

        /* Wipe effect overlay */
        .wipe-overlay {
            position: absolute;
            inset: 0;

            display: flex;
            pointer-events: none;
        }

        .wipe-bar {
            flex: 1;
            background: rgba(40, 167, 213, 0.5);
            /* 0.0–1.0 ยิ่งน้อยยิ่งโปร่ง */
            transform: translateY(-100%);
            opacity: 0;
        }

        .wipe-bar.animate {
            animation: wipeDown 1s ease-in-out forwards;
        }

        @keyframes wipeDown {
            0% {
                transform: translateY(-100%);
                opacity: 1;
            }

            50% {
                transform: translateY(0);
                opacity: 1;
            }

            100% {
                transform: translateY(100%);
                opacity: 1;
            }
        }



        @media (max-width: 576px) {
            #landingHero {
                padding: 10px 0 60px 0;

            }
        }

        .card-img {
            position: absolute;
            top: 2%;
            left: 60%;
            width: 140%;
            /* ให้รูปใหญ่กว่ากล่อง */
            transform: translate(-50%, -50%) rotate(10deg);
            /* ขยาย + เอียง */
            pointer-events: none;
            z-index: 100;
            /* ไม่บังการคลิก (ถ้าต้องการ) */
        }

    </style>

</head>

<body>
    @include('layouts.section.loading')
    <script src="{{ asset('assets/vendor/js/dropdown-hover.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/mega-dropdown.js') }}"></script>

    <!-- Navbar: Start -->
    @include('layouts.section.nav-home')
    <!-- Navbar: End -->

    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">
        <!-- Hero: Start -->
        <section id="hero-animation">
            <div id="landingHero" class="section-py landing-hero position-relative">
                <div class="bg-slideshow d-none d-md-block" id="slideshow">
                    <!-- Slides will be added dynamically -->
                </div>
                <div class="bg-overlay"></div>
                <div class="container hero-content">
                    <div class="text-center position-relative">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="card card-no-radius-mobile mt-lg-4 overflow-hidden">
                                    <div class="card-img-top d-none d-md-block" style="
        background-image: url('{{ asset('img/logo-v6.png') }}');
        background-size: cover;
        background-position: center;
        height: 180px; position: absolute;
    "></div>
                                    <div class="card-body text-start mt-lg-9">
                                        <div class="mb-3 d-block d-md-none mb-3">
                                            <img src="{{ asset('img/logo-v4.png') }}" alt="Logo" class="logo-rotate-mobile" style="width: 120%;margin-left: -15%;">
                                        </div>

                                        <h1 class="mb-0">
                                            Plan Ahead & Book <br>Your island escape
                                        </h1>
                                        <x-booking.form :aff_id="$aff_id" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
    </div>

    </section>
    <!-- Hero: End -->

    <!-- Useful features: Start -->
    <section id="landingFeatures" class="">
        <div class="container">
            @yield('content')
        </div>
    </section>


    <!-- Footer: Start -->
    @include('layouts.section.footer')
    <!-- Footer: End -->
    @include('layouts.section.script')

    <script>
        const images = [
            "{{ asset('img/slide/image.webp') }}"
        ];

        const slideshow = document.getElementById('slideshow');
        const duration = 5000;
        const numBars = 8;
        let currentIndex = 0;
        let slides = [];

        // สร้าง slides
        images.forEach((img, index) => {
            const slide = document.createElement('div');
            slide.className = 'bg-slide';
            slide.style.backgroundImage = `url(${img})`;
            if (index === 0) slide.classList.add('active');
            slideshow.appendChild(slide);
            slides.push(slide);
        });

        function createWipeEffect() {
            const wipe = document.createElement('div');
            wipe.className = 'wipe-overlay';

            for (let i = 0; i < numBars; i++) {
                const bar = document.createElement('div');
                bar.className = 'wipe-bar';
                bar.style.animationDelay = `${i * 0.05}s`;
                wipe.appendChild(bar);
            }

            slideshow.appendChild(wipe);

            // เริ่ม animation
            requestAnimationFrame(() => {
                wipe.querySelectorAll('.wipe-bar').forEach(bar => {
                    bar.classList.add('animate');
                });
            });

            // ลบ wipe effect หลังจบ animation
            setTimeout(() => {
                wipe.remove();
            }, 1500);
        }

        function changeSlide() {
            const nextIndex = (currentIndex + 1) % images.length;

            // เริ่ม wipe effect
            //createWipeEffect();

            // เปลี่ยน slide หลังจาก wipe ไปครึ่งทาง
            setTimeout(() => {
                slides[currentIndex].classList.remove('active');
                slides[currentIndex].classList.add('prev');

                slides[nextIndex].classList.remove('prev');
                slides[nextIndex].classList.add('active');

                currentIndex = nextIndex;
            }, 500);
        }

        // เริ่มต้น slideshow
        setInterval(changeSlide, duration);

    </script>


    @yield('script')
</body>

</html>
