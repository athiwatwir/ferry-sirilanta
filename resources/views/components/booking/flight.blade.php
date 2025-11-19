@props(['routes'=>[],'destStation'=>[],'departStation'=>[],'dateLists'=>[],'type'=>'A'])
<div class="row">
    <div class="col-12">
        <h3 class="mb-0">{{ $departStation['name'] }} to {{ $destStation['name'] }}</h3>
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
                    <th class="text-center">Departure Time</th>
                    <th class="text-center">Arrival Time</th>
                    <th class="text-center">Gross Fare</th>
                    <th class="text-center">Discount Coupon</th>
                    <th class="text-center">Net Fare</th>
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
