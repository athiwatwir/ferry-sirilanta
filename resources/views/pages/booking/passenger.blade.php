@extends('layouts.booking')


@section('content')
<form action="{{ route('booking.store') }}" method="POST">
    @method('post')
    @csrf
    <div class="row d-block d-lg-none">
        <x-booking.sumary />

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
                    <div class="col-12">
                        <label for="description">CUSTOMER NOTE | REQUEST</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Please provide your transfer detail if only selected station named a hotel or airport"></textarea>
                        <small class="text-danger">Please make sure your provided detail is within area, note that given a pick-up location outside of the selected city / area range will result in an unconfirmed transfer, Extra request which is not relevant will not be confirmed here, customer can call 081 358 8989 if necessary</small>
                    </div>
                </div>

                <hr>
                <div class="row pe-3">
                    <div class="col">
                        <a href="{{ route('booking.flight', $sessionData) }}" class="btn btn-lg btn-secondary" type="button">
                            << Change / Edit</a>
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-lg btn-main waves-effect waves-light" type="submit" id="bt-next">Book / Payment >></button>
                    </div>

                </div>

            </div>


        </div>

        <div class="col-12 col-lg-4 d-none d-lg-block">
            <div class="card p-2 p-md-4">
                <x-booking.sumary />

            </div>
        </div>
    </div>

</form>
@stop
