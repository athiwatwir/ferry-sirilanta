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
        nav.layout-navbar {
            position: relative !important;
        }

        .navbar-brand.app-brand {
            flex: 1;
            margin-right: 0 !important;
            justify-content: center !important;
        }

        .navbar-brand.app-brand .app-brand-link {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .navbar-brand.app-brand img {}

        .logo-default {
            width: 200px !important;
            margin: 0 auto;
        }
    }

</style>
<nav class="layout-navbar shadow-none py-0">

    <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-8 py-2">
        <!-- Menu logo wrapper: Start -->
        <div class="navbar-brand app-brand demo d-flex py-0 me-4 me-xl-8 ms-0">
            <a href="/" class="app-brand-link">
                <img src="{{ asset('img/logo-t.jpg') }}" alt="" class="logo-default" width="170">

            </a>
        </div>
        <!-- Menu logo wrapper: End -->

        <!-- Mobile menu toggle: Start (ย้ายมาไว้หลัง logo) -->
        <button class="navbar-toggler border-0 ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="display: none;">
            <i class="icon-base ti tabler-menu-2 icon-lg align-middle fw-medium"></i>
        </button>
        <!-- Mobile menu toggle: End-->

        <!-- Menu wrapper: Start -->
        <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
            <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon-base ti tabler-x icon-lg"></i>
            </button>
            <ul class="navbar-nav me-auto" style="display: none;">
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
    </div>

</nav>
