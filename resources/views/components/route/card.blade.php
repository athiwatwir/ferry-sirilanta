@props(['route'=>[],'tripType'=>'O'])

@if (!empty($route))
<div class="col-12 card mb-3 p-3">

    <div class="row ">
        <div class="col-12 col-lg-8 border-end">
            <div class="row align-items-center">
                <div class="col">
                    <strong>{{ $route['departure_station']['name'] }}</strong>
                    <h4>{{ $route['departure_station']['nickname'] }}</h4>
                    <h4 class="mb-0">{{ $route['departure_time'] }}</h4>
                    <p class="mb-0">{{ $route['departure_timezone'] }}</p>
                </div>
                <div class="col text-center">
                    <strong>
                        Duration
                        <x-time-diff :fromTime="$route['departure_time']" :fromTz="$route['departure_timezone']" :toTime="$route['arrival_time']" :toTz="$route['arrival_timezone']" />
                    </strong>

                </div>
                <div class="col text-end">
                    <strong>{{ $route['destination_station']['name'] }}</strong>
                    <h4>{{ $route['destination_station']['nickname'] }}</h4>
                    <h4 class="mb-0">{{ $route['arrival_time'] }}</h4>
                    <p class="mb-0">{{ $route['arrival_timezone'] }}</p>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-4 text-end">
            <h3 class="text-main">
                <x-label.price :price="$route['prices']['regular']" />
            </h3>
            <button class="btn btn-info" type="button" data-action="book-select" data-trip-type="{{ $tripType }}" data-id="{{ $route['id'] }}" data-value="{{ $route['id'] }}">SELECT</button>
        </div>
    </div>

</div>
@endif
