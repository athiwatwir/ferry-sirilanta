<div class="row d-none d-md-block">
    <div class="col-12 text-center">
        <h4 class="text-main mb-3">Summary {{ $tripTypes[$sessionData['trip_type']] }}</h4>


    </div>
    <div class="col-12 mb-2">
        <span class="badge text-bg-primary mb-0">Departure {{ \Carbon\Carbon::parse($sessionData['depart_date'])->format('l d F Y') }}</span><br>
        <strong><span class="fs-4">{{ $subRoute['departure_time'] }}</span> {{ $departStation['name'] }} [{{ $departStation['nickname'] }}] @if (!empty($departStation['piername']))
            <small>({{ $departStation['piername'] }})</small>
            @endif </strong>
    </div>
    <hr>
    <div class="col-12 mb-2">
        <span class="badge text-bg-warning mb-0">Arrival {{ \Carbon\Carbon::parse($sessionData['depart_date'])->format('l d F Y') }}</span><br>
        <strong><span class="fs-4">{{ $subRoute['arrival_time'] }}</span> {{ $destStation['name'] }} [{{ $destStation['nickname'] }}] @if (!empty($destStation['piername']))
            <small>({{ $destStation['piername'] }})</small>
            @endif </strong>
    </div>

    <div class="col-12">
        <div class="mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">Fare</p>
                <h6 class="mb-0"><strong id="label-fare-pice">{{ number_format($subRoute['prices']['regular'],2) }}</strong> THB</h6>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <p class="mb-0">Passenger</p>
                <h6 class="mb-0">{{ $sessionData['adult'] }}</h6>
            </div>
            <hr>
            <div class="justify-content-between align-items-center mt-4 pb-1" style="display: none;">
                <h5 class="mb-0">Total</h5>
                <h5 class="mb-0"><strong id="label-total-pice">{{ number_format($subRoute['prices']['regular']*$sessionData['adult'],2) }}</strong> THB</h5>
            </div>


        </div>
    </div>

</div>

<div class="row d-block d-lg-none">
    <div class="col text-end mb-3">
        <button type="button" class="btn btn-primary"> Sumary: {{ number_format($subRoute['prices']['regular']*$sessionData['adult'],2) }}THB</button>
    </div>
</div>





<script>
    console.log(@json($sessionData));
    console.log(@json($subRoute));

</script>
