@props([
'routes' => [],
'destStation' => [],
'departStation' => [],
'tripType' => 'O',
'departDateText'=> '',
'depart_date' => '',
'type' => 'A',
'sessionTripType' => 'O',
])

<link href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" rel="stylesheet" />

{{-- ใช้ unique id ต่อ component instance เพื่อกัน id ซ้ำกรณี render หลายครั้ง --}}
@php
$componentId = 'flight-' . $type . '-' . uniqid();
@endphp

<div class="row" id="{{ $componentId }}">

    {{-- Header: SVG นำหน้า, ข้อความสองบรรทัด (เส้นทาง / วันออกเดินทาง) --}}
    <div class="col-12 mt-3">
        <div class="d-flex align-items-start gap-3">
            <svg class="flex-shrink-0 text-primary align-self-start mt-1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M2 17h14.4a3 3 0 0 0 2.5 -1.34l3.1 -4.66h-6.23a4 4 0 0 0 -1.49 .29l-3.56 1.42a4 4 0 0 1 -1.49 .29h-5.73z" />
                <path d="M6 13l1.5 -5" />
                <path d="M6 8h8l2 3" />
            </svg>
            <div class="flex-grow-1 min-w-0">
                <h3 class="text-primary mb-1 lh-sm fs-4">{{ $departStation['name'] }} to {{ $destStation['name'] }}</h3>
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 column-gap-3 mb-2">
                    <p class="mb-0 fw-medium text-body-secondary">Departure Date: {{ $departDateText }}</p>
                    <a href="#" role="button" class="d-inline-flex align-items-center text-secondary js-depart-date-trigger flex-shrink-0" data-component="{{ $componentId }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                            <path d="M16 3l0 4" />
                            <path d="M8 3l0 4" />
                            <path d="M4 11l16 0" />
                            <path d="M8 15h2v2h-2z" />
                        </svg>
                        <small>Change</small>
                    </a>
                </div>
            </div>
        </div>
        {{-- hidden input สำหรับ flatpickr แยกต่อ instance --}}
        <input type="text" class="flatpickr-hidden js-depart-date-input" data-component="{{ $componentId }}" data-type="{{ $type }}" aria-hidden="true" />
    </div>

    {{-- No routes alert --}}
    @if (count($routes) === 0)
    <div class="col-12">
        <div class="alert alert-danger">
            No routes found for the selected date. Please try another date.
        </div>
    </div>
    @endif

    {{-- Route cards --}}
    @foreach ($routes as $route)
    <div class="col-12 card mb-3 p-3 card-{{ $type }}">
        <div class="row">

            {{-- ข้อมูลเวลาและเส้นทาง --}}
            <div class="col-12 col-lg-6 border-end">
                <div class="row align-items-center">
                    <div class="col col-lg-4">
                        <span class="text-muted">{{ $depart_date }}</span>
                        <h5 class="mb-0">{{ $route['departure_station']['name'] }}</h5>
                        <h4 class="mb-0">{{ $route['departure_time'] }}</h4>
                    </div>
                    <div class="col d-flex flex-column align-items-center text-center">
                        <strong>
                            Duration
                            <x-time-diff :fromTime="$route['departure_time']" :fromTz="$route['departure_timezone']" :toTime="$route['arrival_time']" :toTz="$route['arrival_timezone']" />
                        </strong>
                        <div class="d-flex align-items-center">
                            @foreach ($route['icons'] as $icon)
                            <div class="avatar avatar-sm">
                                <img src="{{ $icon }}" alt="Transport Icon" class="rounded mx-auto d-block">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col col-lg-4 text-end">
                        <span class="text-muted">{{ $depart_date }}</span>
                        <h5 class="mb-0">{{ $route['destination_station']['name'] }}</h5>
                        <h4 class="mb-0">{{ $route['arrival_time'] }}</h4>
                    </div>
                </div>
            </div>

            {{-- Regular Price --}}
            <div class="col-4 col-lg-2 text-end border-end">
                Regular Price
                <h5>THB {{ number_format($route['prices']['regular_subtotal']) }}</h5>
            </div>

            {{-- Discount --}}
            <div class="col-4 col-lg-2 text-end border-end text-danger">
                <span class="d-inline-flex align-items-center">Now Discounted</span>
                <div class="row">
                    <div class="col-7 col-lg-7">
                        <img src="{{ asset('img/3d-hand-holding-coupon.png') }}" alt="Coupon" class="w-100">
                    </div>
                    <div class="col-12 col-lg-5">
                        <h5 class="text-danger mb-0">
                            THB {{ number_format($route['prices']['regular_discount']) }}
                        </h5>
                    </div>
                </div>
            </div>

            {{-- Buy Now Price + Select --}}
            <div class="col-4 col-lg-2 text-end text-primary">
                [Buy Now Save Now] Fare
                <h5 class="text-primary">
                    THB {{ number_format($route['prices']['regular']) }}
                </h5>
                <button class="btn btn-outline-primary" type="button" data-action="book-select" data-id="{{ $route['id'] }}" data-value="{{ $route['id'] }}" data-price="{{ $route['prices']['regular'] }}" data-type="{{ $type }}" data-group="{{ $componentId }}">
                    SELECT
                </button>
            </div>

        </div>
    </div>
    @endforeach

</div>
<hr>

{{--
    NOTE: ไม่ใช้ @section('script') @parent ใน component
    เพราะหากถูก render ใน @foreach จะทำให้ script ถูกเพิ่มซ้ำหลายรอบ
    แก้โดยฝัง <script> ตรงนี้พร้อม guard ตรวจว่า flatpickr init แล้วหรือยัง
    และใช้ data-component="{{ $componentId }}" เพื่อ scope ให้ตรง instance
--}}
<script>
    (function() {
        // รอให้ jQuery และ flatpickr โหลดเสร็จก่อน
        function initFlatpickr() {
            if (typeof flatpickr === 'undefined') {
                setTimeout(initFlatpickr, 50);
                return;
            }

            var componentId = '{{ $componentId }}';
            var wrapper = document.getElementById(componentId);
            if (!wrapper) return;

            var inputEl = wrapper.querySelector('.js-depart-date-input[data-component="' + componentId + '"]');
            var triggerEl = wrapper.querySelector('.js-depart-date-trigger[data-component="' + componentId + '"]');

            if (!inputEl || !triggerEl) return;

            if (inputEl._flatpickr) return;

            var tripCtx = @json($sessionTripType);

            var picker = flatpickr(inputEl, {
                monthSelectorType: 'static'
                , minDate: 'today'
                , clickOpens: false
                , disableMobile: true
                , positionElement: triggerEl
                , appendTo: document.body
                , onOpen: function(selectedDates, dateStr, instance) {
                    if (instance && instance.calendarContainer) {
                        instance.calendarContainer.classList.add('flatpickr-align-right');
                    }
                }
                , onChange: function(selectedDates, dateStr) {
                    if (selectedDates.length > 0) {
                        var type = inputEl.dataset.type;
                        if (tripCtx === 'O') {
                            var d = document.getElementById('frm_depart_date');
                            if (d) d.value = dateStr;
                        } else if (tripCtx === 'R') {
                            if (type === '1' || type === 1) {
                                var d1 = document.getElementById('frm_depart_date');
                                if (d1) d1.value = dateStr;
                            } else {
                                var d2 = document.getElementById('frm_return_date');
                                if (d2) d2.value = dateStr;
                            }
                        } else if (tripCtx === 'M') {
                            var idx = parseInt(type, 10) - 1;
                            if (!isNaN(idx) && idx >= 0) {
                                var leg = document.getElementById('frm_multi_segment_date_' + idx);
                                if (leg) leg.value = dateStr;
                            }
                        }
                        var frm = document.getElementById('frm');
                        if (frm) frm.submit();
                    }
                }
            });

            function openPicker(e) {
                e.preventDefault();
                picker.open();
            }

            triggerEl.addEventListener('click', openPicker);
            triggerEl.addEventListener('touchend', function(e) {
                e.preventDefault();
                openPicker(e);
            }, { passive: false });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFlatpickr);
        } else {
            initFlatpickr();
        }
    })();

</script>
