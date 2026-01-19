@extends('layouts.booking')

@section('content')
<div class="container">
    <h1>Ferry Route Map</h1>
    <div class="row">
        @foreach($timeTables as $timeTable)

        <div class="col-12 col-md-8 mx-auto">
            <img src="{{ $timeTable['image_path'] }}" alt="{{ $timeTable['name'] }}" class="w-100">
        </div>
        @endforeach
    </div>

</div>
@stop
