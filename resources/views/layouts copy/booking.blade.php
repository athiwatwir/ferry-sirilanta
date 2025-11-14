<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Flight Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/loading.css') }}">

    <script>
        window.API_URL = "{{ config('app.api_url') }}";
        window.API_KEY = "{{ config('app.api_key') }}";

    </script>

    @php
    $sesBooking = session('booking');
    @endphp
</head>
<body>
    @include('layouts.section.loading')
    <nav class="navbar navbar-expand-lg navbar-scrolled">
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


    <main class="" style="margin-top: 80px;">
        <div class="container py-4">
            <div class="row">
                <div class="col-12 col-lg-9">
                    @yield('content')
                </div>
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-12 card mb-3 p-3">
                            <h4 class="text-main">Book Sumary</h4>
                            <dl class="row">
                                <dt class="col-12">{{ $sesBooking['adult']+$sesBooking['child']+$sesBooking['infant'] }} Passenger(s)</dt>

                            </dl>
                            @if ($sesBooking['trip_type'] == 'O')
                            <dl class="row">
                                <dt class="col-12">
                                    <x-label.full-date :date="$sesBooking['depart_date']" />
                                </dt>
                                <dd class="col-12" id="box-depart"></dd>
                                <dd class="col-12" id="box-dest"></dd>

                            </dl>
                            @elseif($sesBooking['trip_type']=='R')

                            @endif
                            <hr>
                            <dl class="row" id="box-sumary">
                            </dl>
                        </div>

                    </div>
                </div>
            </div>



        </div>




    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/api.js') }}"></script>
    <script src="{{ asset('assets/js/loading.js') }}"></script>

    <script>
        const book_data = @json(session('booking'));
        console.log(book_data);
        let data = [];

        function loadRoute(id) {

            if (!id) {

            }

            return new Promise((resolve, reject) => {
                apiGet("route/" + id, {}, function(res) {
                    resolve(res);
                }, function(err) {
                    reject(err);
                });
            });
        }

        async function generateSumary() {

            let route = await loadRoute(subRouteId);
            if (route.data) {
                data = route.data;
                console.log(data);
                $('#box-depart').text(`${data.departure_time} : ` + data.departure_station.name + `(${data.departure_station.piername})`);
                $('#box-dest').text(`${data.arrival_time} : ` + data.destination_station.name + `(${data.destination_station.piername})`);


            }

            $('#box-sumary').empty();
            $('#box-sumary').append(`<dt class="col-6">Passenger</dt>`);
            $('#box-sumary').append(`<dd class="col-6 text-end">${book_data.adult}X${data.prices.regular}<small>THB</small></dd>`);

            const totle = Number(book_data.adult * data.prices.regular).toLocaleString('en-US');
            $('#box-sumary').append(`<dt class="col-6">Total</dt>`);
            $('#box-sumary').append(`<dd class="col-6 text-end">${totle}<small>THB</small></dd>`);
        }

        $(document).ready(function() {
            $("[data-action='book-select']").on("click", async function() {

                // เก็บค่าใน hidden input
                let subRouteId = ($(this).data("value"));
                let tripType = ($(this).data("trip-type"));
                try {
                    generateSumary();
                } catch (err) {
                    console.error("Error departure:", err);
                }
            });

            if (book_data.selected_route) {
                generateSumary();
            }
        });

    </script>
    @yield('script')
    @stack('scripts')
</body>
</html>
