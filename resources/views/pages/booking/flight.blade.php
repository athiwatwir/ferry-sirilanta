@extends('layouts.booking')

@section('content')
@php
    $flightLegCount = count($bookingRoutes);
    $flightLegIndices = $flightLegCount > 0 ? range(1, $flightLegCount) : [];
@endphp
<link href="{{ asset('css/pages/page-flight.css') }}" rel="stylesheet" />
{{-- layout booking ไม่มี flatpickr.js — ต้องโหลดก่อนสคริปต์ใน x-booking.flight ถึงจะผูกปุ่ม Change ได้ --}}
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

@if (session('booking_error'))
    <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
        {{ session('booking_error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">

    @foreach($bookingRoutes as $bookingRoute)
    <div class="col-12">
        <x-booking.flight :routes="$bookingRoute['routes']" :departStation="$bookingRoute['departStation']" :destStation="$bookingRoute['destStation']" :type="$loop->iteration" :departDateText="$bookingRoute['traveldateText']" :depart_date="$bookingRoute['traveldate']" :sessionTripType="$tripType" />
    </div>
    @endforeach

</div>

<div class="row mt-3">
    <div class="col-12 col-lg-6 offset-lg-6 card">
        <div class="mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">Buy Now Save Now Fares</p>
                <h6 class="mb-0">THB <strong id="label-fare-price">0.00</strong></h6>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <p class="mb-0">Number of Passenger(s)</p>
                <h6 class="mb-0">{{ $adult }}</h6>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center mt-4 pb-1" id="total-row" style="display: none !important;">
                <h5 class="mb-0">Total</h5>
                <h5 class="mb-0">THB <strong id="label-total-price">0.00</strong></h5>
            </div>
            <div class="d-grid mt-5 mb-3">
                <form method="POST" action="{{ route('booking.passenger') }}" id="frm-next">
                    @csrf
                    @method('post')

                    @include('components.booking.session-query-hidden', ['data' => $sessionData])

                    @foreach($bookingRoutes as $bookingRoute)
                    <input type="hidden" name="booking_routes[{{ $loop->index }}][selected_route_id]" id="selected_route_{{ $loop->iteration }}">
                    <input type="hidden" name="booking_routes[{{ $loop->index }}][traveldate]" value="{{ $bookingRoute['traveldate'] }}">
                    @endforeach

                    <div class="row">
                        <div class="col">
                            <a href="/" class="btn btn-secondary btn-lg">
                                <span class="d-none d-md-block">&lt;&lt; Change Selection</span>
                                <span class="d-block d-md-none">&lt;&lt; Back</span>
                            </a>
                        </div>
                        <div class="col">
                            <button id="bt-next" type="button" disabled class="btn btn-lg btn-secondary waves-effect waves-light w-100">
                                <span class="me-2 d-none d-md-block">Add Passenger Details &gt;&gt;</span>
                                <span class="me-2 d-block d-md-none">Next &gt;&gt;</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Form สำหรับเปลี่ยนวันที่ --}}
<form method="GET" action="{{ route('booking.flight') }}" id="frm">
    @csrf
    @include('components.booking.session-query-hidden', ['data' => $sessionData])
</form>

@stop


@section('script')
<script>
    $(document).ready(function() {

        // -------------------------------------------------------
        // ทุกขาต้องมีการเลือก route — ใช้จำนวนขาจากเซิร์ฟเวอร์ ไม่ใช่แค่ปุ่ม SELECT ในหน้า
        // (ถ้าขาใดไม่มีเที่ยว จะไม่มีปุ่ม แต่ยังต้องบล็อก Next จนกว่าจะเปลี่ยนวัน/เส้นทาง)
        // -------------------------------------------------------
        const requiredTypes = @json($flightLegIndices);

        const selected = {};
        requiredTypes.forEach(function(type) {
            selected[type] = {
                id: null
                , price: 0
            };
        });


        // -------------------------------------------------------
        // คำนวณและแสดงผลราคารวมทุก type
        // -------------------------------------------------------
        function updatePriceDisplay() {
            const totalFare = Object.values(selected)
                .reduce(function(sum, s) {
                    return sum + s.price;
                }, 0);
            const formatted = totalFare.toLocaleString('en-US', {
                minimumFractionDigits: 2
                , maximumFractionDigits: 2
            });
            $('#label-fare-price').text(formatted);
            $('#label-total-price').text(formatted);
        }

        // -------------------------------------------------------
        // ตรวจสอบว่าเลือกครบทุก type แล้วหรือยัง
        // -------------------------------------------------------
        function checkAllSelected() {
            const allSelected = requiredTypes.length > 0 && requiredTypes.every(function(type) {
                return selected[type] && selected[type].id !== null;
            });
            const btNext = document.getElementById('bt-next');

            if (allSelected) {
                btNext.type = 'submit';
                btNext.disabled = false;
                btNext.classList.remove('btn-secondary');
                btNext.classList.add('btn-main');
                $('#total-row').css('display', 'flex');
            } else {
                btNext.type = 'button';
                btNext.disabled = true;
                btNext.classList.remove('btn-main');
                btNext.classList.add('btn-secondary');
                $('#total-row').css('display', 'none');
            }
        }

        // -------------------------------------------------------
        // Handler: กดปุ่ม SELECT
        //
        // Bug เดิม:
        //   reset ด้วย [data-type='X'] จะ reset ปุ่มทุกตัวที่มี type เดียวกัน
        //   ข้าม bookingRoute → ทำให้ปุ่มใน card อื่นถูก reset ไปด้วย
        //
        // Fix:
        //   ใช้ data-group (unique ต่อ component instance) เป็น scope
        //   reset เฉพาะปุ่มใน card เดียวกันเท่านั้น
        // -------------------------------------------------------
        $("[data-action='book-select']").on("click", function() {
            const $btn = $(this);
            const type = $btn.data("type");
            const group = $btn.data("group");
            const id = $btn.data("value");
            const price = parseFloat($btn.data("price")) || 0;

            console.log(type, group, id, price);

            // 1. อัปเดต state
            if (!selected[type]) {
                selected[type] = {
                    id: null
                    , price: 0
                };
            }
            selected[type].id = id;
            selected[type].price = price;

            // 2. อัปเดต hidden input
            $('#selected_route_' + type).val(id);

            // 3. Reset เฉพาะปุ่มใน group เดียวกัน (scoped ต่อ bookingRoute)
            $("[data-action='book-select'][data-group='" + group + "']")
                .text("SELECT")
                .removeClass("btn-main")
                .addClass("btn-outline-primary");

            // 4. Mark ปุ่มที่เลือก
            $btn
                .text("SELECTED")
                .removeClass("btn-outline-primary")
                .addClass("btn-main");

            // 5. อัปเดต UI ราคาและสถานะปุ่ม Next
            updatePriceDisplay();
            checkAllSelected();
        });

        // -------------------------------------------------------
        // Handler: เปลี่ยนวันที่
        // -------------------------------------------------------
        $('[data-type="depart"]').on('click', function() {
            $('#frm_depart_date').val($(this).data('date'));
            $('#frm').submit();
        });

    });

</script>
@stop
