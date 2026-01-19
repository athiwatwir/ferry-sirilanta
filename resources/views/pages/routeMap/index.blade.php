@extends('layouts.booking')

@section('content')
<div class="container">
    <h1>Ferry Route Map</h1>
    <div class="row">
        @foreach($routeMaps as $routeMap)

        <div class="col-12 col-md-8 mx-auto">
            <img src="{{ $routeMap['image_path'] }}" alt="{{ $routeMap['name'] }}" class="w-100">
        </div>
        @endforeach
    </div>

</div>
@stop
