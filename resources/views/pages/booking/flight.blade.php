@extends('layouts.booking')


@section('content')

<form action="{{ route('booking.passenger') }}" method="POST">
    @method('post')
    @csrf
    @if ($tripType =='O')
    <div class="row">
        <div class="col-12">
            <h4 class="text-main">Depart: {{ $departStation['name'] }} To:{{ $destStation['name'] }}</h4>
        </div>
    </div>
    <div class="row pe-3">
        <input type="hidden" name="selected_route" id="selected_route">
        @foreach ($aRoutes as $route)
        <x-route.card :route="$route" tripType="O" />
        @endforeach

    </div>
    @elseif($tripType =='R')
    <div class="row">
        <div class="col-12">
            <h4>1. Depart: </h4>
        </div>
    </div>
    <div class="row pe-3">
        <input type="hidden" name="selected_route" id="selected_route">
        @foreach ($aRoutes as $route)
        <x-route.card :route="$route" tripType="R1" />
        @endforeach

    </div>

    <div class="row">
        <div class="col-12">
            <h4>2. Return: </h4>
        </div>
    </div>
    <div class="row pe-3">
        <input type="hidden" name="selected_route" id="selected_route">
        @foreach ($bRoutes as $route)
        <x-route.card :route="$route" tripType="R2" />
        @endforeach

    </div>

    @endif



    <div class="row pe-3">
        <div class="col">
            <a href="/" class="btn btn-secondary" type="button">Back</a>
        </div>
        <div class="col text-end">
            <button class="btn btn-main" type="submit" id="bt-next" disabled>Next</button>
        </div>
    </div>
</form>
@stop


@section('script')
<script>
    $(document).ready(function() {
        $("[data-action='book-select']").on("click", function() {
            // รีเซ็ตปุ่มทั้งหมด
            $("[data-action='book-select']")
                .text("SELECT")
                .removeClass("btn-main")
                .addClass("btn-info");

            // ปุ่มที่เลือก → SELECTED + เปลี่ยนสี
            $(this)
                .text("SELECTED")
                .removeClass("btn-info")
                .addClass("btn-main");

            // เก็บค่าใน hidden input
            $("#selected_route").val($(this).data("value"));
            $("#bt-next").prop("disabled", false);
        });
    });

</script>

@stop
