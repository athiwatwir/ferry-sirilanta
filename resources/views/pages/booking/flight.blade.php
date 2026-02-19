@extends('layouts.booking')

@section('content')
<link href="{{ asset('css/pages/page-flight.css') }}" rel="stylesheet" />

<div class="row">

    @foreach($bookingRoutes as $bookingRoute)
    <div class="col-12">
        <x-booking.flight :routes="$bookingRoute['routes']" :departStation="$bookingRoute['departStation']" :destStation="$bookingRoute['destStation']" :type="$loop->iteration" :departDateText="$bookingRoute['traveldateText']" :depart_date="$bookingRoute['traveldate']" />
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

                    @foreach($sessionData as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach

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
    @foreach($sessionData as $key => $value)
    <input type="hidden" name="{{ $key }}" value="{{ $value }}" id="frm_{{ $key }}">
    @endforeach
</form>

@stop


@section('script')
<script>
    $(document).ready(function() {

        // -------------------------------------------------------
        // State: สร้าง dynamic จาก type จริงในหน้า
        // ไม่ hardcode A/B เพื่อรองรับทุกกรณี
        // -------------------------------------------------------
        const requiredTypes = [...new Set(
            $("[data-action='book-select']").map(function() {
                return $(this).data('type');
            }).get()
        )];

        // map: type -> { id, price }  สร้างอัตโนมัติตาม type ที่มีจริง
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
            const allSelected = requiredTypes.every(function(type) {
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
