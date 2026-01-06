@props(['route'=>[],'tripType'=>'O','type'=>'A','departDate'=>now()])

@php
$departDateText = \Carbon\Carbon::parse($departDate)->format('D d M Y');
$departDateTextShort = \Carbon\Carbon::parse($departDate)->format('D d M');
@endphp

<style>
    .selected-card {

        /* yellow highlight หรือสีที่ต้องการ */
        border: 2px solid #f06225;
        transition: 0.2s ease;
    }

</style>
@if (!empty($route))
<div class="col-12 card mb-3 p-3">

    <div class="row ">
        <div class="col-12 col-lg-6 border-end">
            <div class="row align-items-center">
                <div class="col col-lg-4">
                    <span class="text-muted">{{ $departDateTextShort }}</span>
                    <h5 class="mb-0">{{ $route['departure_station']['name'] }}</h5>
                    <h4 class="mb-0">{{ $route['departure_time'] }}</h4>

                </div>
                <div class="col d-flex flex-column align-items-center text-center ">
                    <strong>
                        Duration
                        <x-time-diff :fromTime="$route['departure_time']" :fromTz="$route['departure_timezone']" :toTime="$route['arrival_time']" :toTz="$route['arrival_timezone']" />
                    </strong>
                    <div class="d-flex align-items-center">
                        @foreach ($route['icons'] as $icon)
                        <div class="avatar avatar-sm">
                            <img src="{{ $icon }}" alt="Avatar" class="rounded mx-auto d-block">
                        </div>
                        @endforeach
                    </div>


                </div>
                <div class="col col-lg-4 text-end">
                    <span class="text-muted">{{ $departDateTextShort }}</span>
                    <h5 class="mb-0">{{ $route['destination_station']['name'] }}</h5>
                    <h4 class="mb-0">{{ $route['arrival_time'] }}</h4>

                </div>
            </div>

        </div>
        <div class="col-4 col-lg-2 text-end border-end">
            Regular Price
            <h5 class="">
                THB {{ number_format($route['prices']['regular_subtotal']) }}
            </h5>
        </div>
        <div class="col-4 col-lg-2 text-end border-end text-danger">
            <span class="d-inline-flex align-items-center">
                Now Discounted

            </span>
            <div class="row">
                <div class="col-7 col-lg-7">
                    <img src="{{ asset('img/3d-hand-holding-coupon.png') }}" alt="" class="w-100">
                </div>
                <div class="col-12 col-lg-5">
                    <h5 class="text-danger mb-0">
                        THB {{ number_format($route['prices']['regular_discount']) }}
                    </h5>
                </div>
            </div>


        </div>

        <div class="col-4 col-lg-2 text-end text-primary">
            [Buy Now Save Now] Fare
            <h5 class="text-primary">
                THB {{ number_format($route['prices']['regular']) }}
            </h5>
            <button class="btn btn-outline-primary" type="button" data-action="book-select" data-id="{{ $route['id'] }}" data-value="{{ $route['id'] }}" data-price="{{ $route['prices']['regular'] }}" data-type="{{ $type }}">SELECT</button>
        </div>
    </div>

</div>
@endif


@section('script')
@parent
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll("button[data-action='book-select']").forEach(function(btn) {

            btn.addEventListener("click", function() {

                // เอา highlight ออกจากทุก card
                document.querySelectorAll(".card").forEach(function(card) {
                    card.classList.remove("selected-card");
                });

                // หา card ที่ปุ่มนี้อยู่ในนั้น แล้วเพิ่ม highlight
                const card = btn.closest(".card");
                card.classList.add("selected-card");
            });

        });
    });

</script>

@stop
