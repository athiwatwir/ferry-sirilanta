<div class="row">
    <div class="col-12">
        <h4 class="text-main mb-1">Sumary</h4>
    </div>
    <div class="col-12 mb-2">
        <span class="badge text-bg-primary mb-2">Departure {{ $sessionData['depart_date'] }}</span><br>
        <strong>{{ $departStation['name'] }} [{{ $departStation['nickname'] }}] @if (!empty($departStation['piername']))
            <small>({{ $departStation['piername'] }})</small>
            @endif </strong>
    </div>
    <div class="col-12 mb-2">
        <span class="badge text-bg-warning mb-2">Arrival {{ $sessionData['depart_date'] }}</span><br>
        <strong>{{ $destStation['name'] }} [{{ $destStation['nickname'] }}] @if (!empty($destStation['piername']))
            <small>({{ $destStation['piername'] }})</small>
            @endif </strong>
    </div>

</div>
