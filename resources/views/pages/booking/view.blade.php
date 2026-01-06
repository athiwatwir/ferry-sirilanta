@extends('layouts.booking')


@section('content')
<style>
    .booking-container {
        max-width: 1000px;
        margin: 30px auto;
        padding: 0 15px;
    }

    .booking-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
        color: white;
        padding: 30px;
        border-radius: 15px 15px 0 0;
        box-shadow: 0 4px 15px rgba(30, 136, 229, 0.3);
    }

    .booking-card {
        background: white;
        border-radius: 0 0 15px 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .section-title {
        color: var(--primary-blue);
        font-weight: 600;
        font-size: 1.2rem;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--light-blue);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-row {
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .info-label {
        color: #666;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .info-value {
        color: #333;
        font-weight: 600;
    }

    .status-badge {
        padding: 8px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .status-draft {
        background: #ffd54f;
        color: #f57f17;
    }

    .route-card {
        background: var(--light-blue);
        border-left: 4px solid var(--primary-blue);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .passenger-card {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 10px;
        border-left: 3px solid var(--accent-blue);
    }

    .payment-summary {
        background: linear-gradient(135deg, var(--light-blue) 0%, #bbdefb 100%);
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
    }

    .qr-section {
        text-align: center;
        padding: 20px;
        background: white;
        border-radius: 10px;
        border: 2px dashed var(--primary-blue);
    }

    .icon-box {
        width: 40px;
        height: 40px;
        background: var(--light-blue);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-blue);
        font-size: 1.2rem;
    }

    .boat-icon {
        font-size: 2rem;
        color: var(--primary-blue);
    }

</style>
@if($booking['status'] != 'CO')
<div class="row">
    <div class="col-12 text-center">
        <h3>{{ $status[$booking['status']]['title'] }}</h3>
    </div>
</div>

@if($booking['status'] == 'DR')
<div class="row">
    <div class="col-12 text-center">
        <a href="{{ $paymentUrl }}" class="btn btn-lg btn-success waves-effect waves-light text-white" id="bt-next">Continue to Payment</a>
    </div>
</div>
@endif

@else
<div class="text-center mt-4">
    <a href="{{ env('TICKET_URL') }}{{ $booking['invoiceno'] }}" class="btn btn-primary" target="_blank">
        <i class="bi bi-download"></i> Ticket PDF
    </a>
</div>
@endif

<div class="booking-container">
    <div class="booking-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="mb-2"><i class="bi bi-ticket-detailed"></i> Booking Details</h2>

            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <h4 class="mb-0">Invoice No: {{ $booking['invoiceno'] }}</h4>
            </div>
        </div>
    </div>

    <div class="booking-card">
        <div class="p-4">
            <!-- Booking Information -->
            <div class="section-title">
                <div class="icon-box">
                    <i class="bi bi-info-circle"></i>
                </div>
                <span>Booking Information</span>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="info-row">
                        <div class="info-label">Departure Date</div>
                        <div class="info-value">
                            <i class="bi bi-calendar3 text-primary"></i>
                            {{ date('d/m/Y', strtotime($booking['departdate'])) }}
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Trip Type</div>
                        <div class="info-value">One Way</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-row">
                        <div class="info-label">Total Passengers</div>
                        <div class="info-value">
                            <i class="bi bi-people-fill text-primary"></i>
                            Adults: {{ $booking['adult_passenger'] }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Route Information -->
            <div class="section-title mt-4">
                <div class="icon-box">
                    <i class="bi bi-signpost-2"></i>
                </div>
                <span>Route Information</span>
            </div>

            @foreach($booking['routes'] as $route)
            <div class="route-card">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <h5 class="mb-1" style="color: var(--dark-blue);">
                            <i class="bi bi-clock"></i> {{ $route['departure_time'] }}
                            {{ $route['departure_station']['name'] }}
                        </h5>


                    </div>
                    <div class="col-md-2 text-center">

                    </div>
                    <div class="col-md-5">
                        <h5 class="mb-1" style="color: var(--dark-blue);">
                            <i class="bi bi-clock"></i> {{ $route['arrival_time'] }}
                            {{ $route['destination_station']['name'] }}
                        </h5>


                    </div>
                </div>
            </div>
            @endforeach

            <!-- Passenger Information -->
            <div class="section-title mt-4">
                <div class="icon-box">
                    <i class="bi bi-person-badge"></i>
                </div>
                <span>Passenger Information</span>
            </div>

            @foreach($booking['customers'] as $index => $customer)
            <div class="passenger-card">
                <div class="row">
                    <div class="col-md-6">
                        <div><strong>{{ $index + 1 }}. {{ $customer['fullname'] }}</strong></div>
                        <div class="text-muted small">
                            <span class="badge bg-info">{{ $customer['type'] }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="small">
                            <i class="bi bi-envelope"></i> {{ $customer['email'] }}
                        </div>
                        <div class="small">
                            <i class="bi bi-telephone"></i> {{ $customer['mobile'] }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Payment Information -->
            <div class="section-title mt-4">
                <div class="icon-box">
                    <i class="bi bi-credit-card"></i>
                </div>
                <span>Payment Information</span>
            </div>

            @foreach($booking['payments'] as $payment)
            <div class="payment-summary">
                <div class="row">
                    <div class="col-6">
                        <div class="text-muted">Payment Method:</div>
                        <strong>{{ $payment['payment_method'] }}</strong>
                    </div>
                    <div class="col-6 text-end">
                        <div class="text-muted">Total Amount:</div>
                        <h4 class="mb-0" style="color: var(--dark-blue);">
                            ฿{{ number_format($payment['totalamt'], 2) }}
                        </h4>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Actions -->

        </div>
    </div>
</div>


@stop
