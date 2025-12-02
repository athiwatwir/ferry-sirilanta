@extends('layouts.booking')


@section('content')
<form action="{{ route('booking.store') }}" method="POST">
    @method('post')
    @csrf
    <div class="row d-block d-lg-none">
        <div class="col text-end mb-3">
            <button type="button" class="btn btn-primary"> Sumary: {{ number_format(0,2) }}THB</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8 mb-3">
            <div class="card p-2">
                <div class="row">
                    <div class="col">
                        <h4 class="text-main mb-1">Passengers</h4>
                    </div>
                </div>


                @foreach($sessionData as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach


                <div class="row p-3">
                    <div class="col-12">
                        <x-form.adult-passenger count="0" />
                    </div>
                </div>

                <hr>
                <div class="row pe-3">
                    <div class="col">
                        <a href="{{ route('booking.flight',['depart_station_id'=>$sessionData['depart_station_id']]) }}" class="btn btn-lg btn-secondary" type="button">Back</a>
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-lg btn-success waves-effect waves-light w-100" type="submit" id="bt-next">Book/Payment</button>
                    </div>

                </div>

            </div>


        </div>

        <div class="col-12 col-lg-4 d-none d-lg-block">
            <div class="card p-2">
                <x-booking.sumary />

            </div>
        </div>
    </div>

</form>
@stop
