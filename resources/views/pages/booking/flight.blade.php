@extends('layouts.booking')

@section('content')
<link href="{{ asset('css/pages/page-flight.css') }}" rel="stylesheet" />

<div class="row">
    <div class="col-12">
        <x-booking.flight :routes="$aRoutes" :departStation="$departStation" :destStation="$destStation" type="A" :departDateText="$departDateText" :depart_date="$depart_date" />
    </div>

    @if ($tripType =='R')
    <div class="col-12">
        <x-booking.flight :routes="$bRoutes" :departStation="$departStation" :destStation="$destStation" type="B" />
    </div>
    @endif

</div>

<div class="row mt-3">
    <div class="col-12 col-lg-6 offset-lg-6 card">
        <div class="mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">Fare</p>
                <h6 class="mb-0">THB <strong id="label-fare-pice">0.00</strong> </h6>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <p class="mb-0">Passenger</p>
                <h6 class="mb-0">{{ $adult }}</h6>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center mt-4 pb-1" style="display: none;">
                <h5 class="mb-0">Total</h5>
                <h5 class="mb-0">THB <strong id="label-total-pice">0.00</strong> </h5>
            </div>
            <div class="d-grid mt-5 mb-3">
                <form method="POST" action="{{ route('booking.passenger') }}" id="frm-next">
                    @csrf
                    @method('post')

                    @foreach($sessionData as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach

                    <input type="hidden" name="outbound_sub_route_id" id="outbound_sub_route_id">
                    <input type="hidden" name="return_sub_route_id" id="return_sub_route_id">

                    <button id="bt-next" type="submit" class="btn btn-lg btn-primary waves-effect waves-light w-100" disabled>
                        <span class="me-2">Next</span>
                        <i class="icon-base ti tabler-arrow-right scaleX-n1-rtl"></i>
                    </button>
                </form>


            </div>

        </div>
    </div>
</div>



<form method="GET" action="{{ route('booking.flight') }}" id="frm">
    @csrf
    @foreach($sessionData as $key => $value)
    <input type="hidden" name="{{ $key }}" value="{{ $value }}" id="frm_{{ $key }}">
    @endforeach
</form>


@stop


@section('script')
<script>
    // Date selection handler
    $(document).on('click', '.date-card', function() {
        $('.date-card').removeClass('active');
        $(this).addClass('active');
    });

    // Initialize
    $(document).ready(function() {
        //renderDates();

        $('[data-type="depart"]').on('click', function() {
            let date = $(this).data('date');
            console.log(date);
            $('#frm_depart_date').val(date);
            //$('#depart_date').val(date);
            $('#frm').submit();
        });
    });

</script>

<script>
    $(document).ready(function() {
        $("[data-action='book-select']").on("click", function() {

            document.getElementById("bt-next").disabled = false;

            // รีเซ็ตปุ่มทั้งหมด
            $("[data-action='book-select']")
                .text("SELECT")
                .removeClass("btn-main")
                .addClass("btn-outline-primary");

            // ปุ่มที่เลือก → SELECTED + เปลี่ยนสี
            $(this)
                .text("SELECTED")
                .removeClass("btn-outline-primary")
                .addClass("btn-main");

            // เก็บค่าใน hidden input

            let regular_price = $(this).data("price");
            let type = $(this).data("type");

            if (type == 'A') {
                $("#outbound_sub_route_id").val($(this).data("value"));
            }

            if (type == 'B') {
                $("#return_sub_route_id").val($(this).data("value"));
            }

            $('#label-fare-pice').text(regular_price);
            $('#label-total-pice').text(regular_price);
            $("#bt-next").prop("disabled", false);
        });
    });

</script>

@stop
