@props(['routes'=>[],'destStation'=>[],'departStation'=>[],'dateLists'=>[],'type'=>'A'])
<div class="row">
    <div class="col-12">
        <h3 class="mb-0"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-speedboat">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M2 17h14.4a3 3 0 0 0 2.5 -1.34l3.1 -4.66h-6.23a4 4 0 0 0 -1.49 .29l-3.56 1.42a4 4 0 0 1 -1.49 .29h-5.73z" />
                <path d="M6 13l1.5 -5" />
                <path d="M6 8h8l2 3" /></svg>{{ $departStation['name'] }} to {{ $destStation['name'] }}</h3>
    </div>
    <div class="col-12 card mb-3">
        <div class="date-selector py-4">
            <div class="row align-items-center">
                <div class="col-auto">
                    <button class="btn btn-outline-secondary">
                        <i class="icon-base ti tabler-chevron-left-pipe"></i>
                    </button>
                </div>
                <div class="col">
                    <div class="row g-2" id="dateSelector">
                        @foreach ($dateLists as $date)
                        <div class="col">
                            <div class="date-card @if ($date['active'] == 'Y')
active
                            @endif" data-date="{{ $date['date'] }}" data-type="depart">
                                <div class="date">
                                    <h5 class="mb-0">{{ $date['date_text'] }}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-secondary">
                        <i class="icon-base ti tabler-chevron-right-pipe"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-12 card mb-3">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center"><i class="icon-base ti tabler-clock-hour-7"></i> Departure Time</th>
                    <th class="text-center"><i class="icon-base ti tabler-clock-hour-7"></i> Arrival Time</th>
                    <th class="text-center">Gross Fare</th>
                    <th class="text-center">Discount Coupon</th>
                    <th class="text-center"><i class="icon-base ti tabler-circle-check"></i>Net Fare</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routes as $route)
                <tr>
                    <td class="text-center">{{ $route['departure_time'] }}</td>
                    <td class="text-center">{{ $route['arrival_time'] }}</td>
                    <td class="text-center">
                        <x-label.price :price="$route['prices']['regular_subtotal']" />
                    </td>
                    <td class="text-center text-danger">
                        <x-label.price :price="$route['prices']['regular_discount']" />
                    </td>
                    <td class="text-center text-success">
                        <strong>
                            <x-label.price :price="$route['prices']['regular']" /></strong>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-outline-primary" type="button" data-action="book-select" data-id="{{ $route['id'] }}" data-value="{{ $route['id'] }}" data-price="{{ $route['prices']['regular'] }}" data-type="{{ $type }}">SELECT</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
