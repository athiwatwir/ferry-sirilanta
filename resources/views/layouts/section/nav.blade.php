<style>
    .navbar-toggler {

        border-radius: 12px;
        padding: 0.5rem 0.75rem !important;
        transition: all 0.3s ease;
    }

    .navbar-toggler:hover {
        background: rgba(241, 100, 36, 0.2);
        transform: scale(1.05);
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 0.2rem rgba(241, 100, 36, 0.25);
        outline: none;
    }

    .navbar-toggler i {
        color: #00619c;
        transition: transform 0.3s ease;
    }

    .navbar-toggler:hover i {
        transform: rotate(90deg);
    }


</style>

<style>
    @media (max-width: 768px) {
        .navbar-brand.app-brand {
            flex: 1;
            margin-right: 0 !important;
        }

        .navbar-brand.app-brand .app-brand-link {
            width: 100%;
        }

        .navbar-brand.app-brand img {
            width: 100% !important;
            max-width: 100%;
        }
    }

</style>
<nav class="layout-navbar shadow-none py-0">

    <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-8">
        <!-- Menu logo wrapper: Start -->
        <div class="navbar-brand app-brand demo d-flex py-0 me-4 me-xl-8 ms-0">
            <a href="/" class="app-brand-link">
                <img src="{{ asset('img/logo-v3.png') }}" alt="" class="logo-default" style="width: 250px;">

            </a>
        </div>
        <!-- Menu logo wrapper: End -->

        <!-- Mobile menu toggle: Start (ย้ายมาไว้หลัง logo) -->
        <button class="navbar-toggler border-0 ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="icon-base ti tabler-menu-2 icon-lg align-middle fw-medium"></i>
        </button>
        <!-- Mobile menu toggle: End-->

        <!-- Menu wrapper: Start -->
        <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
            <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon-base ti tabler-x icon-lg"></i>
            </button>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link fw-medium" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" aria-current="page" href="/">Station</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" aria-current="page" href="/">Route Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" aria-current="page" href="/">Time Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" aria-current="page" href="https://www.tigerlineferry.com/" target="_blank">Tigerline Ferry</a>
                </li>

            </ul>
        </div>
        <div class="landing-menu-overlay d-lg-none"></div>
        <!-- Menu wrapper: End -->
        <!-- Toolbar: Start -->
        <ul class="navbar-nav flex-row align-items-center ms-auto d-none d-md-block">

            <!-- navbar button: Start -->
            <li>
                <a href="" class="btn btn-primary" target="_blank"><span class="tf-icons icon-base ti tabler-search scaleX-n1-rtl me-md-1"></span><span class="d-none d-md-block">Your Booking</span></a>
            </li>
            <!-- navbar button: End -->
        </ul>
        <!-- Toolbar: End -->
    </div>

</nav>
