@extends('layouts.booking')

@section('style')
<style>
    :root {
        --booking-brand: #045990;
        --booking-brand-dark: #034a73;
        --booking-accent: #f16225;
        --booking-accent-soft: rgba(241, 98, 37, 0.12);
        --booking-surface: #f4f8fc;
        --booking-border: rgba(4, 89, 144, 0.12);
        --booking-shadow: 0 12px 40px rgba(4, 89, 144, 0.08);
        --booking-shadow-hover: 0 16px 48px rgba(4, 89, 144, 0.12);
    }

    .booking-view-wrap {
        max-width: 960px;
        margin: 0 auto 3rem;
        padding: 0 0.75rem;
    }

    .booking-view-hero {
        background: linear-gradient(135deg, #0c79b6 0%, #253b7a 100%);
        color: #fff;
        border-radius: 1rem 1rem 0 0;
        padding: 1.75rem 1.5rem 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .booking-view-hero::after {
        content: '';
        position: absolute;
        top: -40%;
        right: -15%;
        width: 55%;
        height: 140%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.12) 0%, transparent 70%);
        pointer-events: none;
    }

    .booking-view-hero h1,
    .booking-view-hero h2 {
        color: #fff !important;
        position: relative;
        z-index: 1;
    }

    .booking-invoice-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(8px);
        padding: 0.5rem 1rem;
        border-radius: 999px;
        font-size: 0.9rem;
        font-weight: 600;
        border: 1px solid rgba(255, 255, 255, 0.25);
    }

    .booking-status-strip {
        background: var(--booking-surface);
        border-bottom: 1px solid var(--booking-border);
        padding: 1rem 1.5rem;
    }

    .booking-status-strip h3 {
        font-size: 1.1rem !important;
        margin: 0;
        color: var(--booking-brand);
    }

    .booking-body {
        background: #fff;
        border-radius: 0 0 1rem 1rem;
        box-shadow: var(--booking-shadow);
        overflow: hidden;
    }

    .booking-body-inner {
        padding: 1.5rem 1.25rem 1.75rem;
    }

    @media (min-width: 768px) {
        .booking-body-inner {
            padding: 2rem 2rem 2.25rem;
        }
    }

    .booking-section-head {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin: 1.75rem 0 1.25rem;
        padding-bottom: 0.65rem;
        border-bottom: 2px solid var(--booking-accent-soft);
    }

    .booking-section-head:first-of-type {
        margin-top: 0;
    }

    .booking-section-head .icon-wrap {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.65rem;
        background: linear-gradient(145deg, var(--booking-accent-soft), rgba(4, 89, 144, 0.08));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--booking-accent);
        font-size: 1.15rem;
    }

    .booking-section-head span {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--booking-brand);
        letter-spacing: -0.02em;
    }

    .booking-dl {
        display: grid;
        gap: 0;
    }

    @media (min-width: 768px) {
        .booking-dl {
            grid-template-columns: 1fr 1fr;
            gap: 0 1.5rem;
        }
    }

    .booking-dl-item {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
        padding: 0.85rem 0;
        border-bottom: 1px solid #eef2f6;
    }

    .booking-dl-item .label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #6c757d;
        font-weight: 600;
    }

    .booking-dl-item .value {
        font-size: 1rem;
        font-weight: 600;
        color: #212529;
    }

    .booking-dl-item .value i {
        color: var(--booking-brand);
        margin-right: 0.35rem;
    }

    .route-journey {
        background: linear-gradient(180deg, #fff 0%, #f8fbfe 100%);
        border: 1px solid var(--booking-border);
        border-radius: 0.85rem;
        padding: 1.25rem 1rem;
        margin-bottom: 1rem;
        transition: box-shadow 0.2s ease, border-color 0.2s ease;
    }

    .route-journey:hover {
        box-shadow: var(--booking-shadow-hover);
        border-color: rgba(4, 89, 144, 0.2);
    }

    .route-journey .point {
        font-weight: 700;
        color: var(--booking-brand);
        font-size: 0.95rem;
        line-height: 1.35;
    }

    .route-journey .time {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--booking-accent);
        margin-bottom: 0.25rem;
    }

    .route-journey-mid {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 0;
        min-height: 3rem;
    }

    .route-line {
        flex: 1;
        max-width: 120px;
        height: 3px;
        background: linear-gradient(90deg, var(--booking-brand), var(--booking-accent));
        border-radius: 2px;
        position: relative;
    }

    .route-line::after {
        content: '';
        position: absolute;
        right: -2px;
        top: 50%;
        transform: translateY(-50%);
        border: 6px solid transparent;
        border-left-color: var(--booking-accent);
    }

    .route-icon-mid {
        width: 2.25rem;
        height: 2.25rem;
        border-radius: 50%;
        background: var(--booking-accent-soft);
        color: var(--booking-accent);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        margin: 0 0.5rem;
    }

    .passenger-tile {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        align-items: flex-start;
        background: #fff;
        border: 1px solid var(--booking-border);
        border-radius: 0.85rem;
        padding: 1.1rem 1.15rem;
        margin-bottom: 0.75rem;
        transition: box-shadow 0.2s ease;
    }

    .passenger-tile:hover {
        box-shadow: 0 8px 24px rgba(4, 89, 144, 0.06);
    }

    .passenger-avatar {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--booking-brand), var(--booking-brand-dark));
        color: #fff;
        font-weight: 700;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .passenger-name {
        font-weight: 700;
        color: #212529;
        margin-bottom: 0.35rem;
    }

    .passenger-meta {
        font-size: 0.875rem;
        color: #5c6b7a;
    }

    .passenger-meta i {
        color: var(--booking-brand);
        width: 1.1rem;
    }

    .payment-card {
        background: linear-gradient(135deg, rgba(4, 89, 144, 0.06) 0%, rgba(241, 98, 37, 0.06) 100%);
        border: 1px solid var(--booking-border);
        border-radius: 0.85rem;
        padding: 1.25rem 1.35rem;
        margin-bottom: 0.75rem;
    }

    .payment-card .label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #6c757d;
        font-weight: 600;
    }

    .payment-card .amount {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--booking-brand);
        letter-spacing: -0.02em;
    }

    .badge-status-draft {
        background: linear-gradient(135deg, #fff3cd, #ffe69c);
        color: #856404;
        font-weight: 600;
        padding: 0.4em 0.85em;
        border-radius: 999px;
    }

    .badge-status-ok {
        background: linear-gradient(135deg, #d1e7dd, #a3cfbb);
        color: #0f5132;
        font-weight: 600;
        padding: 0.4em 0.85em;
        border-radius: 999px;
    }
</style>
@endsection

@section('content')
<div class="booking-view-wrap">
    <div class="booking-body">
        <div class="booking-view-hero">
            <div class="row align-items-center g-3">
                <div class="col-md-7">
                    <p class="small text-white-50 mb-1 text-uppercase fw-semibold letter-spacing-1">Reservation</p>
                    <h2 class="mb-0 fw-bold">
                        <i class="bi bi-ticket-detailed me-2"></i>Booking details
                    </h2>
                </div>
                <div class="col-md-5 text-md-end">
                    <div class="booking-invoice-pill">
                        <i class="bi bi-receipt"></i>
                        <span>Invoice {{ $booking['invoiceno'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        @if($booking['status'] != 'CO')
        <div class="booking-status-strip">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between gap-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge-status-draft"><i class="bi bi-hourglass-split me-1"></i>Status</span>
                    <h3 class="text-main">{{ $status[$booking['status']]['title'] }}</h3>
                </div>
                @if($booking['status'] == 'DR')
                <a href="{{ $paymentUrl }}" class="btn btn-lg btn-success text-white px-4 shadow-sm" id="bt-next">
                    <i class="bi bi-credit-card-2-front me-2"></i>Continue to payment
                </a>
                @endif
            </div>
        </div>
        @else
        <div class="booking-status-strip">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between gap-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge-status-ok"><i class="bi bi-check-circle me-1"></i>Confirmed</span>
                    <h3 class="text-main mb-0">Your booking is complete</h3>
                </div>
                <a href="{{ env('TICKET_URL') }}{{ $booking['invoiceno'] }}" class="btn btn-lg btn-main waves-effect waves-light px-4" target="_blank" rel="noopener">
                    <i class="bi bi-file-earmark-pdf me-2"></i>Download ticket PDF
                </a>
            </div>
        </div>
        @endif

        <div class="booking-body-inner">
            <div class="booking-section-head">
                <div class="icon-wrap"><i class="bi bi-info-circle"></i></div>
                <span>Booking information</span>
            </div>

            <div class="booking-dl">
                <div class="booking-dl-item">
                    <span class="label">Departure date</span>
                    <span class="value">
                        <i class="bi bi-calendar3"></i>{{ date('d/m/Y', strtotime($booking['departdate'])) }}
                    </span>
                </div>
                <div class="booking-dl-item">
                    <span class="label">Trip type</span>
                    <span class="value">One way</span>
                </div>
                <div class="booking-dl-item">
                    <span class="label">Total passengers</span>
                    <span class="value">
                        <i class="bi bi-people-fill"></i>Adults: {{ $booking['adult_passenger'] }}
                    </span>
                </div>
            </div>

            <div class="booking-section-head">
                <div class="icon-wrap"><i class="bi bi-signpost-split"></i></div>
                <span>Route</span>
            </div>

            @foreach($booking['routes'] as $route)
            <div class="route-journey">
                <div class="row align-items-center g-2">
                    <div class="col-md-5">
                        <div class="time"><i class="bi bi-clock me-1"></i>{{ $route['departure_time'] }}</div>
                        <div class="point">{{ $route['departure_station']['name'] }}</div>
                    </div>
                    <div class="col-md-2">
                        <div class="route-journey-mid">
                            <div class="route-line d-none d-md-block"></div>
                            <div class="route-icon-mid"><i class="bi bi-ship"></i></div>
                            <div class="route-line d-none d-md-block"></div>
                        </div>
                        <div class="text-center d-md-none py-1">
                            <i class="bi bi-arrow-down text-main fs-4"></i>
                        </div>
                    </div>
                    <div class="col-md-5 text-md-end">
                        <div class="time"><i class="bi bi-clock me-1"></i>{{ $route['arrival_time'] }}</div>
                        <div class="point">{{ $route['destination_station']['name'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="booking-section-head">
                <div class="icon-wrap"><i class="bi bi-person-vcard"></i></div>
                <span>Passengers</span>
            </div>

            @foreach($booking['customers'] as $index => $customer)
            <div class="passenger-tile">
                <div class="passenger-avatar">{{ $index + 1 }}</div>
                <div class="flex-grow-1 min-w-0">
                    <div class="passenger-name">{{ $customer['fullname'] }}</div>
                    <div class="mb-2">
                        <span class="badge rounded-pill" style="background: rgba(4, 89, 144, 0.12); color: var(--booking-brand); font-weight: 600;">{{ $customer['type'] }}</span>
                    </div>
                    <div class="passenger-meta"><i class="bi bi-envelope me-1"></i>{{ $customer['email'] }}</div>
                    <div class="passenger-meta"><i class="bi bi-telephone me-1"></i>{{ $customer['mobile'] }}</div>
                </div>
            </div>
            @endforeach

            <div class="booking-section-head">
                <div class="icon-wrap"><i class="bi bi-wallet2"></i></div>
                <span>Payment</span>
            </div>

            @foreach($booking['payments'] as $payment)
            <div class="payment-card">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-2 mb-sm-0">
                        <span class="label d-block mb-1">Payment method</span>
                        <strong class="text-dark">{{ $payment['payment_method'] }}</strong>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                        <span class="label d-block mb-1">Total amount</span>
                        <div class="amount">฿{{ number_format($payment['totalamt'], 2) }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
