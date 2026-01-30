<div class="row d-none d-md-block">
    <div class="col-12 text-center mt-3">
        <h4 class="text-main mb-3">Summary {{ $tripTypes[$sessionData['trip_type']] }}</h4>
    </div>

    @if($sessionData['trip_type'] == 'O')

    <div class="col-12 mb-2">
        <h5 class="text-orange"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-clock">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10.5 21h-4.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v3" />
                <path d="M16 3v4" />
                <path d="M8 3v4" />
                <path d="M4 11h10" />
                <path d="M14 18a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                <path d="M18 16.5v1.5l.5 .5" /></svg>
            {{ \Carbon\Carbon::parse($sessionData['depart_date'])->format('l d F Y') }}</h5>


        <strong class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alarm">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 13a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M12 10l0 3l2 0" />
                <path d="M7 4l-2.75 2" />
                <path d="M17 4l2.75 2" /></svg> {{ $subRoute['departure_time'] }}</span> </strong><br>
        <strong class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-speedboat">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M2 17h14.4a3 3 0 0 0 2.5 -1.34l3.1 -4.66h-6.23a4 4 0 0 0 -1.49 .29l-3.56 1.42a4 4 0 0 1 -1.49 .29h-5.73l-1.5 4" />
                <path d="M6 13l1.5 -5" />
                <path d="M6 8h8l2 3" /></svg> {{ $departStation['name'] }} [{{ $departStation['nickname'] }}]</strong>
    </div>
    <hr>
    <div class="col-12 mb-2">
        <strong class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alarm">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 13a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M12 10l0 3l2 0" />
                <path d="M7 4l-2.75 2" />
                <path d="M17 4l2.75 2" /></svg> {{ $subRoute['arrival_time'] }}</span> </strong><br>
        <strong class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-speedboat">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M2 17h14.4a3 3 0 0 0 2.5 -1.34l3.1 -4.66h-6.23a4 4 0 0 0 -1.49 .29l-3.56 1.42a4 4 0 0 1 -1.49 .29h-5.73l-1.5 4" />
                <path d="M6 13l1.5 -5" />
                <path d="M6 8h8l2 3" /></svg> {{ $destStation['name'] }} [{{ $destStation['nickname'] }}]</strong>

    </div>
    @else
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

    @endif
    <div class="col-12">
        <div class="mt-5">
            <div class="d-flex justify-content-between align-items-center text-primary">
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
