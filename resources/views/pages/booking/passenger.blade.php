@extends('layouts.booking')


@section('content')
<div class="row">
    <div class="col">
        <h3 class="text-main">Passengers</h3>
    </div>
</div>
<form action="{{ route('booking.store') }}" method="POST">
    @method('post')
    @csrf



    <div class="row p-3">
        <div class="col-12">
            @for($i = 0; $i < (int)$sessionData['adult']; $i++) <div>
                <x-form.adult-passenger :count="$i" />
        </div>

        @endfor
    </div>
    </div>

    <hr>
    <div class="row pe-3">
        <div class="col">
            <a href="{{ route('booking.flight',['depart_station'=>$sessionData['depart_station']]) }}" class="btn btn-secondary" type="button">Back</a>
        </div>
        <div class="col text-end">
            <button class="btn btn-main" type="submit" id="bt-next">Book/Payment</button>
        </div>
    </div>
</form>

@stop
