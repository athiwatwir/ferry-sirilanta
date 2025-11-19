@extends('layouts.booking')


@section('content')
<style>
    body {
        background-color: #f5f5f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .header-section {
        background: white;
        padding: 30px 0;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .date-selector {}

    .date-card {
        text-align: center;
        padding: 15px 10px;
        cursor: pointer;
        border-radius: 8px;
        transition: all 0.3s;
        border: 2px solid transparent;
    }

    .date-card:hover {
        background-color: #f8f9fa;
    }

    .date-card.active {
        background-color: #fff9e6;
        border-color: #ffd700;
    }

    .date-card .date {
        font-size: 14px;
        color: #666;
        margin-bottom: 5px;
    }

    .date-card .price {
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .krisflyer-banner {
        background: linear-gradient(135deg, #e8f4f8 0%, #f0f8ff 100%);
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        border-left: 5px solid #0066cc;
    }

    .flight-card {
        background: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
    }

    .flight-card:hover {
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    }

    .flight-route {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .airport-code {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .flight-time {
        font-size: 28px;
        font-weight: bold;
        color: #000;
    }

    .flight-line {
        flex: 1;
        height: 2px;
        background: #ddd;
        margin: 0 20px;
        position: relative;
    }

    .flight-line::after {
        content: '✈';
        position: absolute;
        right: -10px;
        top: -10px;
        color: #666;
    }

    .price-box {
        background: #fffde7;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
    }

    .price-box .class {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .price-box .amount {
        font-size: 32px;
        font-weight: bold;
        color: #000;
    }

    .badge-cheapest {
        background: #ffd700;
        color: #000;
        padding: 4px 12px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
    }

    .seats-left {
        color: #d32f2f;
        font-size: 13px;
    }

    .btn-select {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        background: white;
        border: 2px solid #ddd;
        color: #333;
    }

    .btn-select:hover {
        background: #f8f9fa;
        border-color: #999;
    }

    .scootplus-box {
        background: #f5f5f5;
        border-radius: 8px;
        padding: 20px;
    }

    .arrow-btn {
        background: white;
        border: 1px solid #ddd;
        padding: 10px 15px;
        border-radius: 50%;
        cursor: pointer;
    }

    .arrow-btn:hover {
        background: #f8f9fa;
    }

</style>
<div class="row">
    <div class="col-12">
        <x-booking.flight :routes="$aRoutes" :departStation="$departStation" :destStation="$destStation" :dateLists="$aDate" type="A" />
    </div>

    @if ($tripType =='R')
    <div class="col-12">
        <x-booking.flight :routes="$bRoutes" :departStation="$departStation" :destStation="$destStation" :dateLists="$aDate" type="B" />
    </div>
    @endif

</div>

<div class="row mt-3">
    <div class="col-12 col-lg-6 offset-lg-6 card">
        <div class="mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">Fare</p>
                <h6 class="mb-0"><strong id="label-fare-pice">0.00</strong> THB</h6>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <p class="mb-0">Passenger</p>
                <h6 class="mb-0">{{ $adult }}</h6>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center mt-4 pb-1">
                <h5 class="mb-0">Total</h5>
                <h5 class="mb-0"><strong id="label-total-pice">0.00</strong> THB</h5>
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

                    <button type="submit" class="btn btn-lg btn-success waves-effect waves-light w-100">
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
    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach
</form>


@stop


@section('script')
<script>
    // Sample date data
    const dates = [{
            date: '22 Nov'
            , day: 'THB'
            , price: '5,231.00'
        }
        , {
            date: '23 Nov'
            , day: 'THB'
            , price: '5,282.00'
            , active: true
        }
        , {
            date: '24 Nov'
            , day: 'THB'
            , price: '4,531.00'
        }
        , {
            date: '25 Nov'
            , day: 'THB'
            , price: '5,231.00'
        }
        , {
            date: '26 Nov'
            , day: 'THB'
            , price: '4,531.00'
        }
        , {
            date: '27 Nov'
            , day: 'THB'
            , price: '4,531.00'
        }
        , {
            date: '28 Nov'
            , day: 'THB'
            , price: '4,531.00'
        }
    ];

    // Render dates
    function renderDates() {
        const dateSelector = $('#dateSelector');
        dateSelector.empty();

        dates.forEach((item, index) => {
            const activeClass = item.active ? 'active' : '';
            const dateCard = `
                    <div class="col">
                        <div class="date-card ${activeClass}" data-index="${index}">
                            <div class="date">${item.date}</div>
                            <div class="price">${item.day} ${item.price}</div>
                        </div>
                    </div>
                `;
            dateSelector.append(dateCard);
        });
    }

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
            $('#depart_date').val(date);
            $('#frm').submit();
        });
    });

</script>

<script>
    $(document).ready(function() {
        $("[data-action='book-select']").on("click", function() {
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
