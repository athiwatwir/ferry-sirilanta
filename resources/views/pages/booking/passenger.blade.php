@extends('layouts.booking')


@section('content')
<form action="{{ route('booking.store') }}" method="POST">
    @method('post')
    @csrf
    <div class="row">
        <div class="col-12 col-lg-8">
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
                        <a href="{{ route('booking.flight',['depart_station_id'=>$sessionData['depart_station_id']]) }}" class="btn btn-secondary" type="button">Back</a>
                    </div>

                </div>

            </div>


        </div>

        <div class="col-12 col-lg-4">
            <div class="card p-2">
                <x-booking.sumary />
                <div class="row">
                    <div class="col-12 mb-2">
                        <button class="btn btn-lg btn-success waves-effect waves-light w-100" type="submit" id="bt-next">Book/Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
@stop
