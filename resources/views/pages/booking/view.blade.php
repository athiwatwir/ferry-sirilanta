@extends('layouts.booking')

@section('style')
<style>
    .bv {
        max-width: 920px;
        margin: 0 auto 1.5rem;
        color: #111;
        font-size: 0.925rem;
    }

    .bv-card {
        background: #fff;
        border: 1px solid #222;
    }

    .bv-head {
        display: flex;
        flex-wrap: wrap;
        align-items: baseline;
        justify-content: space-between;
        gap: 0.5rem 1rem;
        padding: 0.75rem 1rem;
        border-bottom: 1px solid #222;
    }

    .bv-head h1 {
        margin: 0;
        font-size: 1.05rem;
        font-weight: 700;
        color: #111;
        letter-spacing: 0.02em;
        text-transform: uppercase;
    }

    .bv-head .meta {
        font-size: 0.85rem;
        color: #333;
        font-variant-numeric: tabular-nums;
    }

    .bv-bar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 0.5rem 1rem;
        padding: 0.55rem 1rem;
        border-bottom: 1px solid #ddd;
        background: #fafafa;
    }

    .bv-bar .status {
        font-weight: 700;
        color: #111;
        font-size: 0.9rem;
    }

    .bv-bar .status span {
        font-weight: 400;
        color: #444;
    }

    .bv-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.4rem;
    }

    .bv-actions .btn {
        border-radius: 0.35rem;
        font-size: 0.85rem;
        font-weight: 600;
        padding: 0.4rem 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        border: none;
        text-decoration: none;
        transition: background-color 0.15s ease, box-shadow 0.15s ease;
    }

    .bv-actions .btn i {
        font-size: 1.05rem;
        line-height: 1;
    }

    .bv-btn-orange {
        background: #f16225;
        color: #fff !important;
    }

    .bv-btn-orange:hover {
        background: #d95218;
        color: #fff !important;
        box-shadow: 0 2px 8px rgba(241, 98, 37, 0.35);
    }

    .bv-btn-blue {
        background: #045990;
        color: #fff !important;
    }

    .bv-btn-blue:hover {
        background: #034a73;
        color: #fff !important;
        box-shadow: 0 2px 8px rgba(4, 89, 144, 0.35);
    }

    .bv-body {
        padding: 0.75rem 1rem 1rem;
    }

    .bv-sec {
        margin-top: 0.85rem;
    }

    .bv-sec:first-child {
        margin-top: 0;
    }

    .bv-sec-title {
        margin: 0 0 0.4rem;
        padding-bottom: 0.25rem;
        border-bottom: 1px solid #111;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: #111;
    }

    .bv-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .bv-table th,
    .bv-table td {
        padding: 0.35rem 0.5rem;
        border-bottom: 1px solid #e5e5e5;
        vertical-align: top;
        text-align: left;
    }

    .bv-table th {
        width: 38%;
        font-weight: 600;
        color: #555;
        font-size: 0.8rem;
    }

    .bv-table td {
        color: #111;
        font-weight: 500;
        font-size: 0.9rem;
        word-break: break-word;
    }

    @media (min-width: 768px) {
        .bv-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 1.25rem;
        }

        .bv-grid-2 .bv-table th {
            width: 42%;
        }
    }

    .bv-route {
        border: 1px solid #ddd;
        margin-bottom: 0.5rem;
    }

    .bv-route:last-child {
        margin-bottom: 0;
    }

    .bv-route-head {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 0.25rem 0.75rem;
        padding: 0.35rem 0.55rem;
        background: #f5f5f5;
        border-bottom: 1px solid #ddd;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .bv-route-head-right {
        display: inline-flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 0.45rem 0.75rem;
        margin-left: auto;
        text-align: right;
    }

    .bv-ticketno {
        color: #f16225;
        font-weight: 800;
        font-size: 0.9rem;
        letter-spacing: 0.02em;
        font-variant-numeric: tabular-nums;
    }

    .bv-ticketno small {
        font-weight: 600;
        font-size: 0.7rem;
        color: #f16225;
        margin-right: 0.2rem;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .bv-route-body {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0;
    }

    @media (min-width: 576px) {
        .bv-route-body {
            grid-template-columns: 1fr auto 1fr;
            align-items: start;
        }
    }

    .bv-leg {
        padding: 0.5rem 0.55rem;
    }

    .bv-leg .role {
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #666;
        margin-bottom: 0.15rem;
    }

    .bv-leg .time {
        font-size: 1.05rem;
        font-weight: 700;
        font-variant-numeric: tabular-nums;
        line-height: 1.2;
        margin-bottom: 0.15rem;
    }

    .bv-leg .name {
        font-weight: 600;
        line-height: 1.3;
        font-size: 0.9rem;
    }

    .bv-leg .sub {
        font-size: 0.8rem;
        color: #555;
        line-height: 1.35;
        margin-top: 0.1rem;
    }

    .bv-arrow {
        display: none;
        padding: 0.75rem 0.35rem;
        color: #888;
        font-size: 0.85rem;
        text-align: center;
        align-self: center;
    }

    @media (min-width: 576px) {
        .bv-arrow {
            display: block;
        }
    }

    .bv-arrow-mobile {
        display: block;
        text-align: center;
        padding: 0.15rem;
        color: #888;
        border-top: 1px dashed #ddd;
        border-bottom: 1px dashed #ddd;
        font-size: 0.75rem;
    }

    @media (min-width: 576px) {
        .bv-arrow-mobile {
            display: none;
        }
    }

    .bv-pass {
        border: 1px solid #ddd;
        margin-bottom: 0.4rem;
    }

    .bv-pass:last-child {
        margin-bottom: 0;
    }

    .bv-pass-head {
        display: flex;
        flex-wrap: wrap;
        align-items: baseline;
        gap: 0.35rem 0.75rem;
        padding: 0.35rem 0.55rem;
        background: #f5f5f5;
        border-bottom: 1px solid #ddd;
        font-weight: 700;
        font-size: 0.9rem;
    }

    .bv-pass-head .idx {
        color: #666;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .bv-pass-head .type {
        margin-left: auto;
        font-size: 0.75rem;
        font-weight: 600;
        color: #444;
        border: 1px solid #bbb;
        padding: 0.05rem 0.4rem;
    }

    .bv-note {
        padding: 0.45rem 0.55rem;
        border: 1px solid #ddd;
        background: #fafafa;
        white-space: pre-wrap;
        word-break: break-word;
        line-height: 1.4;
        font-size: 0.875rem;
    }

    .bv-empty {
        color: #777;
        font-size: 0.85rem;
        padding: 0.25rem 0;
    }

    /* Mobile: readable size, less cramped */
    @media (max-width: 767.98px) {
        .bv {
            margin-bottom: 1rem;
            font-size: 0.8125rem;
        }

        .bv-head {
            padding: 0.55rem 0.65rem;
            gap: 0.25rem;
        }

        .bv-head h1 {
            font-size: 0.9rem;
            width: 100%;
        }

        .bv-head .meta {
            font-size: 0.75rem;
        }

        .bv-bar {
            padding: 0.45rem 0.65rem;
            gap: 0.4rem;
        }

        .bv-bar .status {
            font-size: 0.8rem;
            line-height: 1.35;
        }

        .bv-actions {
            width: 100%;
        }

        .bv-actions .btn {
            width: 100%;
            justify-content: center;
            font-size: 0.8rem;
            padding: 0.5rem 0.65rem;
        }

        .bv-body {
            padding: 0.55rem 0.65rem 0.75rem;
        }

        .bv-sec {
            margin-top: 0.7rem;
        }

        .bv-sec-title {
            font-size: 0.7rem;
            margin-bottom: 0.3rem;
            letter-spacing: 0.04em;
        }

        .bv-table th,
        .bv-table td {
            display: block;
            width: 100%;
            padding: 0.15rem 0;
            border-bottom: none;
        }

        .bv-table tr {
            display: block;
            padding: 0.4rem 0;
            border-bottom: 1px solid #e5e5e5;
        }

        .bv-table th {
            font-size: 0.7rem;
            margin-bottom: 0.05rem;
        }

        .bv-table td {
            font-size: 0.8125rem;
            padding-bottom: 0.35rem;
        }

        .bv-route-head {
            font-size: 0.72rem;
            padding: 0.3rem 0.45rem;
        }

        .bv-leg {
            padding: 0.4rem 0.45rem;
        }

        .bv-leg .role {
            font-size: 0.65rem;
        }

        .bv-leg .time {
            font-size: 0.95rem;
        }

        .bv-leg .name {
            font-size: 0.8125rem;
        }

        .bv-leg .sub {
            font-size: 0.72rem;
        }

        .bv-pass-head {
            font-size: 0.8125rem;
            padding: 0.3rem 0.45rem;
        }

        .bv-pass-head .idx,
        .bv-pass-head .type {
            font-size: 0.7rem;
        }

        .bv-note {
            font-size: 0.8125rem;
            padding: 0.4rem 0.45rem;
        }

        .bv-empty {
            font-size: 0.75rem;
        }
    }

</style>
@endsection

@section('content')
@php
$tripTypes = \App\Http\Controllers\BookingController::tripTypes();
$tripType = $booking['trip_type'] ?? '';
$tripTypeLabel = $tripTypes[$tripType] ?? ($tripType ?: '—');
$statusCode = $booking['status'] ?? '';
$statusTitle = $status[$statusCode]['title'] ?? $statusCode;
$invoiceNo = $booking['invoiceno'] ?? $booking['bookingno'] ?? '—';
$adults = (int) ($booking['adult_passenger'] ?? 0);
$children = (int) ($booking['child_passenger'] ?? 0);
$infants = (int) ($booking['infant_passenger'] ?? 0);
$routes = $booking['routes'] ?? [];
$customers = $booking['customers'] ?? [];
$payments = $booking['payments'] ?? [];
$note = $booking['note'] ?? null;
@endphp

<div class="bv">
    <div class="bv-card">
        <div class="bv-head">
            <h2>Booking details</h2>
            <div class="meta">Invoice {{ $invoiceNo }}</div>
        </div>

        <div class="bv-bar">
            <div class="status">
                Status: <span>{{ $statusTitle }}</span>
                @if (!empty($statusCode))
                <span>({{ $statusCode }})</span>
                @endif
            </div>
            <div class="bv-actions">
                @if ($statusCode === 'DR')
                <a href="{{ $paymentUrl }}" class="btn btn-dark btn-sm" id="bt-next">Continue to payment</a>
                @elseif ($statusCode === 'CO')
                <a href="{{ env('TICKET_URL') }}{{ $invoiceNo }}" class="btn bv-btn-orange btn-sm" target="_blank" rel="noopener">
                    <i class="icon-base ti tabler-file-type-pdf"></i>
                    Download A4 PDF
                </a>
                <a href="{{ env('TICKET_DETAIL_URL') }}{{ $invoiceNo }}" class="btn bv-btn-blue btn-sm" target="_blank" rel="noopener">
                    <i class="icon-base ti tabler-printer"></i>
                    Print Ticket
                </a>
                @endif
            </div>
        </div>

        <div class="bv-body">
            {{-- Booking info --}}
            <section class="bv-sec">
                <h3 class="bv-sec-title">Booking information</h3>
                <div class="bv-grid-2">
                    <table class="bv-table">
                        <tbody>
                            <tr>
                                <th>Invoice no.</th>
                                <td>{{ $invoiceNo }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>{{ $statusTitle }}</td>
                            </tr>
                            <tr>
                                <th>Trip type</th>
                                <td>{{ $tripTypeLabel }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="bv-table">
                        <tbody>
                            <tr>
                                <th>Departure date</th>
                                <td>
                                    @if (!empty($booking['departdate']))
                                    {{ date('d/m/Y', strtotime($booking['departdate'])) }}
                                    @else
                                    —
                                    @endif
                                </td>
                            </tr>
                            @if (!empty($booking['returndate']))
                            <tr>
                                <th>Return date</th>
                                <td>{{ date('d/m/Y', strtotime($booking['returndate'])) }}</td>
                            </tr>
                            @endif
                            <tr>
                                <th>Passengers</th>
                                <td>
                                    Adult {{ $adults }}
                                    @if ($children > 0), Child {{ $children }}@endif
                                    @if ($infants > 0), Infant {{ $infants }}@endif
                                </td>
                            </tr>
                            @if (!empty($booking['referenceno']))
                            <tr>
                                <th>Reference no.</th>
                                <td>{{ $booking['referenceno'] }}</td>
                            </tr>
                            @endif
                            @if (!empty($booking['created_at']) || !empty($booking['bookdate']))
                            <tr>
                                <th>Booked at</th>
                                <td>
                                    @php $bookedAt = $booking['created_at'] ?? $booking['bookdate']; @endphp
                                    {{ date('d/m/Y H:i', strtotime($bookedAt)) }}
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </section>

            {{-- Routes --}}
            <section class="bv-sec">
                <h3 class="bv-sec-title">Route ({{ count($routes) }})</h3>
                @forelse ($routes as $i => $route)
                @php
                $depart = $route['departure_station'] ?? [];
                $dest = $route['destination_station'] ?? [];
                $travelDate = $route['traveldate'] ?? $route['departdate'] ?? ($booking['departdate'] ?? null);
                $routePrice = $route['price'] ?? $route['totalamt'] ?? null;
                $routeTicketNo = $route['ticketno'] ?? $route['tickteno'] ?? $route['ticket_no'] ?? null;
                @endphp
                <div class="bv-route">
                    <div class="bv-route-head">
                        <span>Trip {{ $i + 1 }}@if ($travelDate) · {{ date('d/m/Y', strtotime($travelDate)) }}@endif</span>
                        <span class="bv-route-head-right">
                            @if (!empty($routeTicketNo))
                            <span class="bv-ticketno"><small>Ticket</small>{{ $routeTicketNo }}</span>
                            @endif
                            @if ($routePrice !== null && $routePrice !== '')
                            <span>{{ number_format((float) $routePrice, 2) }} THB</span>
                            @endif
                        </span>
                    </div>
                    <div class="bv-route-body">
                        <div class="bv-leg">
                            <div class="role">Departure</div>
                            <div class="time">{{ $route['departure_time'] ?? '—' }}</div>
                            <div class="name">
                                {{ $depart['name'] ?? '—' }}
                                @if (!empty($depart['nickname']))
                                [{{ $depart['nickname'] }}]
                                @endif
                            </div>
                            @if (!empty($depart['piername']))
                            <div class="sub">{{ $depart['piername'] }}</div>
                            @endif
                        </div>
                        <div class="bv-arrow-mobile">↓</div>
                        <div class="bv-arrow">→</div>
                        <div class="bv-leg">
                            <div class="role">Arrival</div>
                            <div class="time">{{ $route['arrival_time'] ?? '—' }}</div>
                            <div class="name">
                                {{ $dest['name'] ?? '—' }}
                                @if (!empty($dest['nickname']))
                                [{{ $dest['nickname'] }}]
                                @endif
                            </div>
                            @if (!empty($dest['piername']))
                            <div class="sub">{{ $dest['piername'] }}</div>
                            @endif
                        </div>
                    </div>
                    @if (!empty($route['id']) || !empty($route['boat_name']) || !empty($route['vessel_name']))
                    <table class="bv-table">
                        <tbody>

                            @if (!empty($route['boat_name']) || !empty($route['vessel_name']))
                            <tr>
                                <th>Vessel</th>
                                <td>{{ $route['boat_name'] ?? $route['vessel_name'] }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    @endif
                </div>
                @empty
                <p class="bv-empty">No route data.</p>
                @endforelse
            </section>

            {{-- Passengers --}}
            <section class="bv-sec">
                <h3 class="bv-sec-title">Lead passenger</h3>
                @forelse ($customers as $index => $customer)
                <div class="bv-pass">
                    <div class="bv-pass-head">
                        <span class="idx">#{{ $index + 1 }}</span>
                        <span>{{ $customer['fullname'] ?? '—' }}</span>
                        @if (!empty($customer['type']))
                        <span class="type">{{ $customer['type'] }}</span>
                        @endif
                    </div>
                    <table class="bv-table">
                        <tbody>
                            @if (!empty($customer['email']))
                            <tr>
                                <th>Email</th>
                                <td>{{ $customer['email'] }}</td>
                            </tr>
                            @endif
                            <tr>
                                <th>Telephone</th>
                                <td>
                                    @if (!empty($customer['mobile_code']) || !empty($customer['mobile']))
                                    {{ trim(($customer['mobile_code'] ?? '') . ' ' . ($customer['mobile'] ?? '')) }}
                                    @else
                                    —
                                    @endif
                                </td>
                            </tr>
                            @if (!empty($customer['other_contact']))
                            <tr>
                                <th>Other contact</th>
                                <td>{{ $customer['other_contact'] }}</td>
                            </tr>
                            @endif
                            @if (isset($customer['isdefault']))
                            <tr>
                                <th>Lead passenger</th>
                                <td>{{ ($customer['isdefault'] ?? '') === 'Y' ? 'Yes' : 'No' }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @empty
                <p class="bv-empty">No passenger data.</p>
                @endforelse
            </section>

            {{-- Note --}}
            @if (!empty($note))
            <section class="bv-sec">
                <h3 class="bv-sec-title">Customer note</h3>
                <div class="bv-note">{{ $note }}</div>
            </section>
            @endif

            {{-- Payment --}}
            <section class="bv-sec" style="display: none;">
                <h3 class="bv-sec-title">Payment</h3>
                @forelse ($payments as $pIndex => $payment)
                <table class="bv-table">
                    <tbody>
                        <tr>
                            <th>Payment #{{ $pIndex + 1 }}</th>
                            <td>{{ $payment['payment_method'] ?? '—' }}</td>
                        </tr>
                        @if (!empty($payment['payment_status']) || !empty($payment['status']))
                        <tr>
                            <th>Payment status</th>
                            <td>{{ $payment['payment_status'] ?? $payment['status'] }}</td>
                        </tr>
                        @endif
                        @if (!empty($payment['payment_date']) || !empty($payment['paid_at']))
                        <tr>
                            <th>Paid at</th>
                            <td>{{ date('d/m/Y H:i', strtotime($payment['payment_date'] ?? $payment['paid_at'])) }}</td>
                        </tr>
                        @endif
                        @if (!empty($payment['transaction_id']) || !empty($payment['refno']))
                        <tr>
                            <th>Transaction</th>
                            <td>{{ $payment['transaction_id'] ?? $payment['refno'] }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Amount</th>
                            <td>{{ number_format((float) ($payment['totalamt'] ?? $payment['amount'] ?? 0), 2) }} THB</td>
                        </tr>
                    </tbody>
                </table>
                @empty
                <p class="bv-empty">No payment data.</p>
                @endforelse
            </section>
        </div>
    </div>
</div>
@stop
