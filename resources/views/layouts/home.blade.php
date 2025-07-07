<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flight Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-menu shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="150" />

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-2"><a class="nav-link active" href="#">Booking</a></li>
                    <li class="nav-item me-2"><a class="nav-link" href="#">Time Table</a></li>
                    <li class="nav-item me-2"><a class="nav-link" href="#">Route Map</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="hero text-center">
        <div class="overlay"></div>
        <div class="hero-text container">
            <h1>Siri Lanta Speedboats</h1>
            <p>Home > Flight search result</p>
        </div>
    </div>

    <div class="container search-box-wrapper">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
