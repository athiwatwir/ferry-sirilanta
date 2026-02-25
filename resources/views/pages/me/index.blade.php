@extends('layouts.booking')

@section('content')
<link href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" rel="stylesheet" />

<style>
    .search-ticket-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 0 15px;
    }

    .search-ticket-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .search-ticket-title {
        color: #2c3e50;
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 10px;
        text-align: center;
    }

    .search-ticket-subtitle {
        color: #6c757d;
        font-size: 1rem;
        margin-bottom: 30px;
        text-align: center;
    }

    .form-group-search {
        margin-bottom: 25px;
    }

    .form-label-search {
        font-weight: 600;
        color: #2c3e50;
        font-size: 0.95rem;
        margin-bottom: 8px;
        display: block;
    }

    .form-input-search {
        width: 100%;
        border: none;
        border-bottom: 3px solid #e9ecef;
        border-radius: 0;
        padding: 0.75rem 0;
        background: transparent;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-input-search:focus {
        border-bottom: 3px solid #F16424;
        box-shadow: none;
        outline: none;
    }

    .form-input-search::placeholder {
        color: #adb5bd;
        opacity: 1;
    }

    .btn-search-ticket {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, #F16424 0%, #ff8c5a 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .btn-search-ticket:hover {
        background: linear-gradient(135deg, #ff8c5a 0%, #F16424 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(241, 100, 36, 0.3);
        color: white;
    }

    .search-icon {
        width: 24px;
        height: 24px;
        margin-right: 8px;
    }

    @media (max-width: 768px) {
        .search-ticket-container {
            margin: 20px auto;
        }

        .search-ticket-card {
            padding: 20px;
        }

        .search-ticket-title {
            font-size: 1.5rem;
        }
    }
</style>

<div class="search-ticket-container">
    <div class="search-ticket-card">
        <h1 class="search-ticket-title">Find your booking</h1>
        <p class="search-ticket-subtitle">please enter your email and travel date to find your booking</p>

        <form action="{{ url('/me/search') }}" method="POST" id="search-ticket-form">
            @csrf
            @method('POST')

            <div class="form-group-search">
                <label for="email" class="form-label-search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#F16424" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon" style="display: inline-block; vertical-align: middle;">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 7a5 5 0 0 1 5 -5a5 5 0 0 1 5 5v6a5 5 0 0 1 -5 5a5 5 0 0 1 -5 -5v-6z" />
                        <path d="M21 7a5 5 0 0 0 -5 -5a5 5 0 0 0 -5 5v6a5 5 0 0 0 5 5a5 5 0 0 0 5 -5v-6z" />
                    </svg>
                    Email
                </label>
                <input
                    type="email"
                    class="form-input-search"
                    id="email"
                    name="email"
                    placeholder="please enter your email"
                    required
                    value="{{ old('email') }}"
                />
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group-search">
                <label for="travel_date" class="form-label-search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#F16424" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon" style="display: inline-block; vertical-align: middle;">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                        <path d="M16 3v4" />
                        <path d="M8 3v4" />
                        <path d="M4 11h16" />
                    </svg>
                    Travel Date
                </label>
                <input
                    type="text"
                    class="form-input-search"
                    id="travel_date"
                    name="travel_date"
                    placeholder="please select your travel date"
                    required
                    value="{{ old('travel_date') }}"
                />
                @error('travel_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-search-ticket">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: middle; margin-right: 8px;">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>
                Search
            </button>
        </form>
    </div>
</div>

<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Flatpickr for travel date
        const travelDateInput = document.getElementById('travel_date');
        if (travelDateInput) {
            flatpickr(travelDateInput, {
                dateFormat: "Y-m-d",
                minDate: "today",
                monthSelectorType: "static",
                static: true,
                locale: {
                    firstDayOfWeek: 1
                }
            });
        }
    });
</script>

@stop
