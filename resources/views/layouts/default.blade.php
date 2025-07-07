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

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/img/logo.webp') }}" alt="Logo" width="150" />

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

    <div class="hero text-center">
        <div class="overlay"></div>
        <div class="hero-text container">
            <h1>Siri Lanta Speedboats</h1>
            <p>Home > Flight search result</p>
        </div>
    </div>

    <div class="container search-box-wrapper">
        <div class="search-box">

            <!-- Tabs -->
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="oneway-tab" data-bs-toggle="tab" type="button">One Way</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="roundtrip-tab" data-bs-toggle="tab" type="button">Roundtrip</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="multi-tab" data-bs-toggle="tab" type="button">Multi city</button>
                </li>
            </ul>

            <!-- Form -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="flight_Search_boxed">
                        <p>From</p><input type="text" value="New York"><span>JFK - John F. Kennedy International...</span>
                        <div class="plan_icon_posation"><i class="fas fa-plane-departure"></i></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="flight_Search_boxed">
                        <p>To</p><input type="text" value="London "><span>LCY, London city airport </span>
                        <div class="plan_icon_posation"><i class="fas fa-plane-arrival"></i></div>
                        <div class="range_plan"><i class="fas fa-exchange-alt"></i></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form_search_date">
                        <div class="flight_Search_boxed date_flex_area">
                            <div class="Journey_date">
                                <p>Journey date</p><input type="date" value="2022-05-05"><span>Thursday</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="flight_Search_boxed dropdown_passenger_area">
                        <p>Passenger, Class </p>
                        <div class="dropdown"><button class="dropdown-toggle final-count" data-toggle="dropdown" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">0 Passenger </button>
                            <div class="dropdown-menu dropdown_passenger_info" aria-labelledby="dropdownMenuButton1">
                                <div class="traveller-calulate-persons">
                                    <div class="passengers">
                                        <h6>Passengers</h6>
                                        <div class="passengers-types">
                                            <div class="passengers-type">
                                                <div class="text"><span class="count pcount">0</span>
                                                    <div class="type-label">
                                                        <p>Adult</p><span>12+ yrs</span>
                                                    </div>
                                                </div>
                                                <div class="button-set"><button type="button" class="btn-add"><i class="fas fa-plus"></i></button><button type="button" class="btn-subtract"><i class="fas fa-minus"></i></button></div>
                                            </div>
                                            <div class="passengers-type">
                                                <div class="text"><span class="count ccount">0</span>
                                                    <div class="type-label">
                                                        <p class="fz14 mb-xs-0"> Children </p><span>2 - Less than 12 yrs</span>
                                                    </div>
                                                </div>
                                                <div class="button-set"><button type="button" class="btn-add-c"><i class="fas fa-plus"></i></button><button type="button" class="btn-subtract-c"><i class="fas fa-minus"></i></button></div>
                                            </div>
                                            <div class="passengers-type">
                                                <div class="text"><span class="count incount">0</span>
                                                    <div class="type-label">
                                                        <p class="fz14 mb-xs-0"> Infant </p><span>Less than 2 yrs</span>
                                                    </div>
                                                </div>
                                                <div class="button-set"><button type="button" class="btn-add-in"><i class="fas fa-plus"></i></button><button type="button" class="btn-subtract-in"><i class="fas fa-minus"></i></button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cabin-selection">
                                        <h6>Cabin Class</h6>
                                        <div class="cabin-list"><button type="button" class="label-select-btn"><span class="muiButton-label">Economy </span></button><button type="button" class="label-select-btn active"><span class="muiButton-label"> Business </span></button><button type="button" class="label-select-btn"><span class="MuiButton-label">First Class </span></button></div>
                                    </div>
                                </div>
                            </div>
                        </div><span>Business</span>
                    </div>
                </div>
                <div class="top_form_search_button"><button class="btn btn_theme btn_md">Search</button></div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
