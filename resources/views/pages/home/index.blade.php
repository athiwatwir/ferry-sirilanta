@extends('layouts.home')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush

@section('content')

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
                <p>From</p>

            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="flight_Search_boxed">
                <p>To</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
            <div class="form_search_date">
                <div class="flight_Search_boxed date_flex_area">
                    <div class="Journey_date">
                        <p>Travel date</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12 col-12">
            <div class="flight_Search_boxed dropdown_passenger_area">
                <p>Passenger</p>

            </div>
        </div>

        <div class="col-12 text-center mt-3">
            <button class="btn btn-main ">Search</button>
        </div>

    </div>

</div>


@stop
