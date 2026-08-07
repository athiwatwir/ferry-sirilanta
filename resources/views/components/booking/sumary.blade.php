@php
    $adultCount = (int) ($sessionData['adult'] ?? 0);
    $totalPrice = 0;
    foreach ($bookingRoutes as $br) {
        $totalPrice += ((float) ($br['route']['prices']['regular'] ?? 0)) * $adultCount;
    }
    $tripType = $sessionData['trip_type'] ?? '';
    $referral = session('referral', []);
    $referralName = $referral['name'] ?? null;
@endphp

<style>
    .summary-route-card {
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 0.75rem;
        overflow: hidden;
        background: #fff;
    }

    .summary-route-date {
        background: linear-gradient(90deg, rgba(255, 140, 0, 0.12), rgba(255, 140, 0, 0.04));
        color: #e67e00;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 0.65rem 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    }

    .summary-route-row {
        display: flex;
        align-items: stretch;
        gap: 0.75rem;
        padding: 0.9rem 1rem;
    }

    .summary-route-row + .summary-route-row {
        border-top: 1px dashed rgba(0, 0, 0, 0.08);
    }

    .summary-route-left {
        flex: 1 1 auto;
        min-width: 0;
    }

    .summary-route-label {
        font-size: 0.72rem;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #6c757d;
        margin-bottom: 0.2rem;
    }

    .summary-route-station {
        font-size: 0.98rem;
        font-weight: 700;
        color: #212529;
        line-height: 1.35;
        margin-bottom: 0.15rem;
    }

    .summary-route-pier {
        font-size: 0.82rem;
        color: #6c757d;
        line-height: 1.4;
        word-break: break-word;
    }

    .summary-route-right {
        flex: 0 0 auto;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
        min-width: 4.5rem;
        text-align: right;
    }

    .summary-route-time {
        font-size: 1.35rem;
        font-weight: 700;
        color: var(--bs-primary, #0d6efd);
        line-height: 1.1;
        font-variant-numeric: tabular-nums;
    }

    .summary-route-time-label {
        font-size: 0.7rem;
        color: #6c757d;
        margin-top: 0.15rem;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }
</style>

<div class="row d-none d-md-block">
    <div class="col-12 text-center mt-3">
        @if (!empty($referralName))
            <h3 class="text-main mb-2">{{ $referralName }}</h3>
        @endif
        <h4 class="text-main mb-3">Summary {{ $tripTypes[$tripType] ?? '' }}</h4>
    </div>

    @if (in_array($tripType, ['O', 'R', 'M'], true) && count($bookingRoutes) > 0)
        @foreach ($bookingRoutes as $bookingRoute)
            @php
                $subRoute = $bookingRoute['route'];
                $departStation = $subRoute['departure_station'] ?? [];
                $destStation = $subRoute['destination_station'] ?? [];
                $legFare = ((float) ($subRoute['prices']['regular'] ?? 0)) * $adultCount;
                $travelDate = ! empty($bookingRoute['traveldate'])
                    ? \Carbon\Carbon::createFromFormat('Y-m-d', substr($bookingRoute['traveldate'], 0, 10))->format('l d F Y')
                    : '';
                $tripSeq = (int) ($bookingRoute['seq'] ?? $loop->iteration);
                $tripTotal = count($bookingRoutes);
                $dateHeading = $tripTotal > 1
                    ? 'Trip ' . $tripSeq . '/' . $tripTotal . ' ' . $travelDate
                    : $travelDate;
            @endphp

            <div class="col-12 mb-3">
                <div class="summary-route-card">
                    <div class="summary-route-date">
                        {{ $dateHeading }}
                    </div>

                    <div class="summary-route-row">
                        <div class="summary-route-left">
                            <div class="summary-route-label">Departure from</div>
                            <div class="summary-route-station">
                                {{ $departStation['name'] ?? '' }}
                                @if (!empty($departStation['nickname']))
                                    <span class="fw-normal text-muted">[{{ $departStation['nickname'] }}]</span>
                                @endif
                            </div>
                            @if (!empty($departStation['piername']))
                                <div class="summary-route-pier">{{ $departStation['piername'] }}</div>
                            @endif
                        </div>
                        <div class="summary-route-right">
                            <div class="summary-route-time">{{ $subRoute['departure_time'] ?? '' }}</div>
                            <div class="summary-route-time-label">Depart</div>
                        </div>
                    </div>

                    <div class="summary-route-row">
                        <div class="summary-route-left">
                            <div class="summary-route-label">Destination to</div>
                            <div class="summary-route-station">
                                {{ $destStation['name'] ?? '' }}
                                @if (!empty($destStation['nickname']))
                                    <span class="fw-normal text-muted">[{{ $destStation['nickname'] }}]</span>
                                @endif
                            </div>
                            @if (!empty($destStation['piername']))
                                <div class="summary-route-pier">{{ $destStation['piername'] }}</div>
                            @endif
                        </div>
                        <div class="summary-route-right">
                            <div class="summary-route-time">{{ $subRoute['arrival_time'] ?? '' }}</div>
                            <div class="summary-route-time-label">Arrive</div>
                        </div>
                    </div>
                </div>
            </div>

            @if (in_array($tripType, ['R', 'M'], true))
                <div class="col-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center text-primary">
                        <p class="mb-0">Fare</p>
                        <h6 class="mb-0"><strong>{{ number_format($subRoute['prices']['regular'] ?? 0, 2) }}</strong> THB</h6>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <p class="mb-0">Adult x {{ $adultCount }}</p>
                        <h6 class="mb-0">{{ number_format($legFare, 2) }} THB</h6>
                    </div>
                </div>
            @endif
        @endforeach

        @if ($tripType === 'O')
            @php
                $subRoute = $bookingRoutes[0]['route'];
            @endphp
            <div class="col-12 mb-3">
                <div class="mt-2">
                    <div class="d-flex justify-content-between align-items-center text-primary">
                        <p class="mb-0">Fare</p>
                        <h6 class="mb-0"><strong>{{ number_format($subRoute['prices']['regular'] ?? 0, 2) }}</strong> THB</h6>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <p class="mb-0">Adult x {{ $adultCount }}</p>
                        <h6 class="mb-0">{{ number_format(($subRoute['prices']['regular'] ?? 0) * $adultCount, 2) }} THB</h6>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <h5 class="mb-0">Total</h5>
                        <h5 class="mb-0">THB <strong>{{ number_format($totalPrice, 2) }}</strong></h5>
                    </div>
                </div>
            </div>
        @else
            <div class="col-12 mb-3">
                <hr>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <h5 class="mb-0">Total</h5>
                    <h5 class="mb-0">THB <strong>{{ number_format($totalPrice, 2) }}</strong></h5>
                </div>
            </div>
        @endif
    @endif
</div>

<div class="row d-block d-lg-none">
    <div class="col text-end mb-3">
        <button type="button" class="btn btn-primary">Summary: {{ number_format($totalPrice, 2) }} THB</button>
    </div>
</div>

<script>
    console.log(@json($sessionData));
    console.log(@json($bookingRoutes));
</script>
