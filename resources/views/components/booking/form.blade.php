@props(['aff_id' => null])

<link href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" rel="stylesheet" />
<style>
    .trip-type-container {
        background: #e8e8e8;
        border-radius: 50px;
        padding: 6px;
        display: inline-flex;
        /* เปลี่ยนจาก flex เป็น inline-flex */
        width: auto;
        /* เปลี่ยนจาก 100% เป็น auto */
        gap: 0;

        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* เพิ่ม wrapper สำหรับจัดให้อยู่กึ่งกลาง */
    .trip-type-wrapper {
        display: flex;

        margin-bottom: 1rem;
    }

    .trip-type-btn {
        position: relative;
        background: transparent;
        border: none;
        padding: 8px 40px;
        border-radius: 50px;
        font-weight: 700;
        color: #666;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        flex: 1;
        white-space: nowrap;
        /* เพิ่มบรรทัดนี้ */
    }

    @media (max-width: 768px) {
        .trip-type-container {
            padding: 4px;
        }

        .trip-type-btn {
            padding: 10px 16px;
            font-size: 0.75rem;
            letter-spacing: 0.3px;
            white-space: nowrap;
            /* เพิ่มบรรทัดนี้ด้วย */
        }
    }

    .trip-type-btn.active {
        background: #f06222;
        color: #ffffff;
        box-shadow: 0 4px 12px rgb(240, 99, 43, 0.4);
    }

    .trip-type-btn:hover:not(.active) {
        color: #333;
    }

    .trip-type-btn .icon {
        display: none;
    }

    .btn-xl {
        padding: 1rem;
        font-size: 1.1rem;
    }

    .multi-island-link {
        text-align: center;
        font-size: 0.93rem;
        font-weight: 600;

    }

    .multi-island-link a {
        color: #F16424 !important;
    }

</style>

<style>
    .selection-underline {
        padding: 0.5rem 0;
        margin-bottom: 0.5rem;
        cursor: pointer;
        position: relative;
        border-bottom: 3px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .selection-underline::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 0;
        height: 3px;
        background: linear-gradient(90deg, #F16424, #ff8c5a);
        transition: width 0.4s ease;
    }

    .selection-underline:hover::after {
        width: 100%;
    }

    .selection-underline-content {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .selection-underline-icon {
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .selection-underline:hover .selection-underline-icon {
        transform: translateX(8px);
    }

    .selection-underline-text {
        flex: 1;
    }

    .selection-underline-title {
        font-weight: 600;
        font-size: 1.1rem;
        color: #2c3e50;
        margin: 0;
        transition: color 0.3s ease;
    }

    .selection-underline:hover .selection-underline-title {
        color: #F16424;
    }

    .selection-underline-subtitle {
        font-size: 0.875rem;
        color: #6c757d;
        margin: 0;
    }

    .selection-underline-arrow {
        opacity: 0;
        transform: translateX(-10px);
        transition: all 0.3s ease;
    }

    .selection-underline:hover .selection-underline-arrow {
        opacity: 1;
        transform: translateX(0);
    }

    /* Date input with underline style */
    #depart_date,
    #return_date {
        border: none;
        border-bottom: 3px solid #e9ecef;
        border-radius: 0;
        padding: 0.5rem 0;
        background: transparent;
        transition: all 0.3s ease;
    }

    #depart_date::placeholder,
    #return_date::placeholder {
        color: #ef6222;
        opacity: 1;
    }

    #depart_date:focus,
    #return_date:focus {
        border-bottom: 3px solid #F16424;
        box-shadow: none;
        outline: none;
    }

    #depart_date:hover,
    #return_date:hover {
        border-bottom-color: #F16424;
    }


    /* Ensure card doesn't clip dropdown */
    .card,
    .card-body {
        overflow: visible !important;
    }




    /* Let's Go button hover effect */
    .btn-dark.btn-lg.w-100:hover {
        color: #F16424 !important;
    }

    .avatar.avatar-lg {
        width: 48px;
        height: 48px;
        min-width: 48px;
        min-height: 48px;
        flex-shrink: 0;
    }

    .avatar.avatar-lg .avatar-initial {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

</style>

<form class="" action="{{ route('booking.flight') }}">
    <input type="hidden" name="aff_id" value="{{ $aff_id }}">
    <div class="btn-group mb-3" role="group">
        <input type="hidden" name="trip_type" id="trip_type" value="O">
        <input type="hidden" name="dest_station_id" id="dest_station_id">
        <input type="hidden" name="depart_station_id" id="depart_station_id">
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="d-flex align-items-center gap-2 flex-wrap trip-type-wrapper">
                <div class="trip-type-container d-flex align-items-center gap-2">
                    <button type="button" class="trip-type-btn active" data-value="O" data-action="trip_type">
                        <span>ONE-WAY</span>
                    </button>
                    <button type="button" class="trip-type-btn" data-value="R" data-action="trip_type">
                        <span>ROUND-TRIP</span>
                    </button>
                </div>
                <div class="multi-island-link">
                    <a href="/" class="">MULTI-ISLAND</a>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <div class="selection-underline" data-type="departure" data-bs-toggle="modal" data-bs-target="#onboardHorizontalImageModal">
                <div class="selection-underline-content">
                    <div class="selection-underline-icon">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#F16424" class="icon icon-tabler icons-tabler-filled icon-tabler-location">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M20.891 2.006l.106 -.006l.13 .008l.09 .016l.123 .035l.107 .046l.1 .057l.09 .067l.082 .075l.052 .059l.082 .116l.052 .096c.047 .1 .077 .206 .09 .316l.005 .106c0 .075 -.008 .149 -.024 .22l-.035 .123l-6.532 18.077a1.55 1.55 0 0 1 -1.409 .903a1.547 1.547 0 0 1 -1.329 -.747l-.065 -.127l-3.352 -6.702l-6.67 -3.336a1.55 1.55 0 0 1 -.898 -1.259l-.006 -.149c0 -.56 .301 -1.072 .841 -1.37l.14 -.07l18.017 -6.506l.106 -.03l.108 -.018z" /></svg>
                    </div>
                    <div class="selection-underline-text">
                        <div class="selection-underline-title">Choose Your Departure</div>
                        <div class="selection-underline-subtitle">Select your starting point</div>
                    </div>
                    <div class="selection-underline-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#F16424" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 18l6-6-6-6" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="selection-underline" data-type="destination" data-bs-toggle="modal" data-bs-target="#onboardHorizontalImageModal">
                <div class="selection-underline-content">
                    <div class="selection-underline-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#F16424" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                        </svg>
                    </div>
                    <div class="selection-underline-text">
                        <div class="selection-underline-title">Choose Your Destination</div>
                        <div class="selection-underline-subtitle">Where do you want to go?</div>
                    </div>
                    <div class="selection-underline-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#F16424" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 18l6-6-6-6" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-md-6 mb-3 d-none" id="depart_date_container">
            <input type="text" class="form-control form-control-lg" name="depart_date" placeholder="Depart Date *" id="depart_date" />

        </div>
        <div class="col-12 col-md-6 mb-3 d-none" id="return_date_container">
            <input type="text" class="form-control form-control-lg" name="return_date" placeholder="Return Date *" id="return_date" />
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 mb-3" style="display: none;">
            <div class="dropdown-passenger">
                <button class="btn btn-lg btn-light w-100" type="button" id="passenger-toggle">
                    👤 <span id="_passenger-summary">2 Passenger(s)</span>
                </button>

                <div class="dropdown-menu-passenger" id="passenger-menu">
                    <div class="passenger-row">
                        <div>
                            <strong>Passenger</strong><br>

                        </div>
                        <div class="counter">
                            <button class="btn-minus" type="button" data-type="adult">−</button>
                            <span id="_adult-count">2</span>
                            <button class="btn-plus" type="button" data-type="adult">+</button>
                            <input type="hidden" name="_adult" id="_adult" value="2">
                        </div>
                    </div>

                    <div class="passenger-row" style="display: none;">
                        <div>
                            <strong>Child</strong><br>
                            <small>(2 to 11 years)</small>
                        </div>
                        <div class="counter">
                            <button class="btn-minus" type="button" data-type="child">−</button>
                            <span id="child-count">0</span>
                            <button class="btn-plus" type="button" data-type="child">+</button>
                            <input type="hidden" name="child" id="child" value="0">
                        </div>
                    </div>

                    <div class="passenger-row" style="display: none;">
                        <div>
                            <strong>Infant</strong><br>
                            <small>(1 to 23 months)</small>
                        </div>
                        <div class="counter">
                            <button class="btn-minus" type="button" data-type="infant">−</button>
                            <span id="infant-count">0</span>
                            <button class="btn-plus" type="button" data-type="infant">+</button>
                            <input type="hidden" name="infant" id="infant" value="0">
                        </div>
                    </div>

                    <div style="text-align:right; margin-top:10px;">
                        <button class="btn-done" type="button" id="btn-done">Done</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="passenger-row">
                <div>
                    <strong>👤 <span id="passenger-summary">2 Passenger(s)</span></strong>

                </div>
                <div class="counter">
                    <button class="btn-minus" type="button" data-type="adult">−</button>
                    <span id="adult-count">2</span>
                    <button class="btn-plus" type="button" data-type="adult">+</button>
                    <input type="hidden" name="adult" id="adult" value="2">
                </div>
            </div>

        </div>
        <div class="col-12">
            <div class="row align-items-center">
                <div class="col-5">
                    <img src="{{ asset('img/3d-hand-holding-coupon.png') }}" alt="" style="margin-left: 20%;width: 80%;">
                </div>
                <div class="col-7">
                    <button type="submit" class="btn btn-main btn-lg w-100" id="btn-letgo">Let's Go! <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle-arrow-right ms-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 2l.324 .005a10 10 0 1 1 -.648 0l.324 -.005zm.613 5.21a1 1 0 0 0 -1.32 1.497l2.291 2.293h-5.584l-.117 .007a1 1 0 0 0 .117 1.993h5.584l-2.291 2.293l-.083 .094a1 1 0 0 0 1.497 1.32l4 -4l.073 -.082l.064 -.089l.062 -.113l.044 -.11l.03 -.112l.017 -.126l.003 -.075l-.007 -.118l-.029 -.148l-.035 -.105l-.054 -.113l-.071 -.111a1.008 1.008 0 0 0 -.097 -.112l-4 -4z" /></svg></button>
                </div>
            </div>
        </div>
        <div class="col-12 my-2">
            <span>For groups more than 12pax, request <a href="https://tigerlineferry.com" target="_blank">TigerlineFerry.com</a></span>
        </div>
    </div>

</form>

<!-- Modal -->
<div class="modal-onboarding modal fade animate__animated" id="onboardHorizontalImageModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content text-center">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="onboarding-content mb-0 pb-8">

                    <div class="row mb-3" id="box-step">
                        <div class="col-12" id="box-section-title">
                            <h3 id="modal-title-type" style="color: #f06222;">Select "Section"</h3>
                            <div class="col-12 col-lg-6 mx-auto">
                                <div class="row">
                                    <div class="col-3 text-end">
                                        <div class="d-flex justify-content-end">
                                            <div class="avatar avatar-lg">
                                                <span class="avatar-initial rounded-circle bg-primary">1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 text-start">
                                        <img src="{{ asset('img/icon/boat-icon.png') }}" alt="" width="50">
                                        <br>
                                        <div class="dash-line"></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="avatar avatar-lg">
                                            <span class="avatar-initial rounded-circle bg-secondary">2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12" id="box-station-title" style="display: none;">
                            <h3 id="modal-title-type text-warning" style="color: #f06222;">Select "Station"</h3>
                            <div class="col-12 col-lg-6 mx-auto">
                                <div class="row">
                                    <div class="col-3 text-end">
                                        <div class="d-flex justify-content-end">
                                            <div class="avatar avatar-lg">
                                                <span class="avatar-initial rounded-circle bg-secondary">1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <img src="{{ asset('img/icon/boat-icon.png') }}" alt="" width="50">
                                        <br>
                                        <div class="dash-line"></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="avatar avatar-lg">
                                            <span class="avatar-initial rounded-circle bg-primary">2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="box-section"></div>

                    <div class="row d-none" id="box-station">

                        <div class="col-12">
                            <div class="row" id="box-station-2"></div>
                        </div>
                        <div class="col-12 text-start mb-2 mt-3">
                            <button id="bt-back-to-station" type="button" class="btn btn-sm btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-left">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M11 7l-5 5l5 5" />
                                    <path d="M17 7l-5 5l5 5" />
                                </svg>
                                Back
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer border-0" style="display: none;">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-section {}

    .btn-section.active {
        color: #fff;
        background-color: #f06225;
        border-color: #f06225;
    }

    .btn-station.active {
        background-color: #f06225;
        color: #fff;
        border-color: #f06225;
    }

    .dash-line {
        margin: 0px 0;
        color: #ccc;
        letter-spacing: 2px;
        font-size: 20px;
        line-height: 1;
        overflow: hidden;
        white-space: nowrap;
    }

    .dash-line::before {
        content: '~ ~ ~ ~ ~ ~ ~ ~ ~ ~';
    }

    .btn-main-section {
        background-color: #2ca7e6;
    }

    .btn-main-section:hover {
        background-color: #f06225;
    }

    .btn-main-section.active {
        background-color: #f06225;
        color: #fff;
        border-color: #f06225;
    }

    .two-tone-button {
        display: flex;
        flex-direction: column;
        width: 100%;
        aspect-ratio: 1;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        text-decoration: none;
        background: white;
    }

    .button-top {
        background: #025e9d;
        color: white;

        font-weight: 700;
        font-size: 40px;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 1;
        width: 100%;
    }

    .button-bottom {
        background: white;
        color: #000000;

        font-size: 17px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 1;
        font-weight: 500;
        text-align: center;
        line-height: 1.3;
        word-break: break-word;
        hyphens: auto;
    }

    /* Auto-resize สำหรับข้อความยาว */
    .button-bottom.long-text {
        font-size: 13px;
    }

    .button-bottom.very-long-text {
        font-size: 11px;
    }

    @media (max-width: 768px) {
        .two-tone-button {
            border-radius: 10px !important;
        }

        .button-top {
            font-size: 20px !important;
        }

        .button-bottom {
            font-size: 9px !important;
            padding: 0 5px;
        }
    }

</style>

@section('script')

<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script>
    document.querySelectorAll('.trip-type-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.trip-type-btn').forEach(b => {
                b.classList.remove('active');
            });
            this.classList.add('active');
        });
    });

    function toggleBg() {
        const avatars = document.querySelectorAll('.avatar .avatar-initial');
        const midCol = document.querySelector('.col.text-start');

        if (avatars.length < 2 || !midCol) return;

        const left = avatars[0];
        const right = avatars[1];

        // สลับสี
        left.classList.toggle('bg-primary');
        left.classList.toggle('bg-secondary');

        right.classList.toggle('bg-primary');
        right.classList.toggle('bg-secondary');

        // ปรับตำแหน่งคอลัมน์กลางตามสี
        if (left.classList.contains('bg-primary')) {
            midCol.classList.remove('text-end');
            midCol.classList.add('text-start');
        } else {
            midCol.classList.remove('text-start');
            midCol.classList.add('text-end');
        }
    }

    $(document).ready(function() {
        // Return date picker - ต้องสร้างก่อนเพื่อให้ departurePicker สามารถอ้างอิงได้
        var returnDate = document.querySelector("#return_date");
        var returnPicker = flatpickr(returnDate, {
            monthSelectorType: "static"
            , static: true
            , minDate: "today"
            , disableMobile: true
        });

        // Departure date picker
        var flatpickrDate = document.querySelector("#depart_date");
        var departurePicker = flatpickr(flatpickrDate, {
            monthSelectorType: "static"
            , static: true
            , minDate: "today"
            , disableMobile: true
            , onChange: function(selectedDates, dateStr, instance) {
                if (selectedDates.length > 0 && returnPicker) {
                    returnPicker.set('minDate', selectedDates[0]);

                    if (returnPicker.selectedDates.length > 0 &&
                        returnPicker.selectedDates[0] < selectedDates[0]) {
                        returnPicker.clear();
                    }
                }
            }
        });
    });

    (function() {
        'use strict';

        // ==================== State Management ====================
        const state = {
            departStations: {}
            , destStations: {}
            , selectType: null
            , destStationId: null
            , departStationId: null
            , passengerCounts: {
                adult: 2
                , child: 0
                , infant: 0
            }
        };

        // ==================== DOM Elements Cache ====================
        const elements = {
            modal: document.getElementById('onboardHorizontalImageModal')
            , modalTitle: document.getElementById('modal-title-type')
            , boxSection: document.getElementById('box-section')
            , boxStation: document.getElementById('box-station')
            , boxStation2: document.getElementById('box-station-2')
            , backButton: document.getElementById('bt-back-to-station')
            , tripTypeInput: document.getElementById('trip_type')
            , destStationInput: document.getElementById('dest_station_id')
            , departStationInput: document.getElementById('depart_station_id')
            , departStationBtn: document.querySelector('.btn-select-depart-station')
            , destStationBtn: document.querySelector('.btn-select-dest-station')
            , passengerToggle: document.getElementById('passenger-toggle')
            , passengerMenu: document.getElementById('passenger-menu')
            , passengerSummary: document.getElementById('passenger-summary')
            , submitButton: document.getElementById('btn-letgo')
            , departDatePicker: document.getElementById('depart_date')
            , returnDatePicker: document.getElementById('return_date')
        };

        // ==================== API Calls ====================
        function loadDepartStations() {
            apiGet("station/departure", {
                group: 'Y'
            }, (res) => {
                state.departStations = res.data;
                renderSections(state.departStations);
            }, (err) => console.error("Error loading departure stations:", err));
        }

        function loadDestStations(departStationId) {
            apiGet("station/destination", {
                group: 'N'
                , depart_station: departStationId
            }, (res) => {
                state.destStations = res.data;
                // สำหรับ destination ให้แสดง station ทั้งหมดเลย
                renderAllStations(state.destStations);
            }, (err) => console.error("Error loading destination stations:", err));
        }

        // ==================== Rendering Functions ====================
        function renderSections(stations) {
            $('#box-step').show();
            elements.boxSection.innerHTML = "";
            elements.boxStation2.innerHTML = "";

            Object.keys(stations).forEach(key => {
                const section = stations[key].sections;
                const sectionCol = document.createElement('div');
                sectionCol.className = 'col-3 col-md-3 mb-2 px-1 px-lg-3 text-dark';
                sectionCol.innerHTML = `<img src="${section.icon}" class="w-100 pointer btn-section" data-section="${key}">`;
                elements.boxSection.appendChild(sectionCol);
            });

            attachSectionListeners();
        }

        function renderSections2(stations) {
            $('#box-step').show();
            elements.boxSection.innerHTML = "";
            elements.boxStation2.innerHTML = "";

            Object.keys(stations).forEach(key => {
                const section = stations[key].sections;
                const sectionCol = document.createElement('div');
                sectionCol.className = 'col-3 col-md-3 mb-2 px-1 px-lg-3 text-dark';
                sectionCol.innerHTML = `
                <button class="btn btn-primary p-1 btn-lg w-100 btn-section d-flex flex-column align-items-center btn-ios mb-1" data-section="${key}">
    <div class="section-image w-100">
        <img src="${section.icon}" class="w-100">
    </div>
${section.badge_text ? `<span class="position-absolute top-0 start-100 translate-middle badge badge-center bg-warning text-white">${section.badge_text}</span>` : ''}
</button> ${section.name ? `${section.name}` : ''}
            `;
                elements.boxSection.appendChild(sectionCol);
            });

            attachSectionListeners();
        }

        // ตัด nickname ให้ไม่เกิน 25 ตัวอักษร (เติม ... ถ้ายาวเกิน)
        function formatNickname(name) {
            const maxLen = 25;
            if (!name) return "";
            return name.length > maxLen ? name.slice(0, maxLen) + "..." : name;
        }

        // ฟังก์ชันใหม่: แสดง station ทั้งหมดโดยไม่ต้องเลือก section
        function renderAllStations(stations) {
            $('#box-step').hide();
            elements.boxSection.innerHTML = "";
            elements.boxStation2.innerHTML = "";

            stations.forEach(st => {
                const stCol = document.createElement('div');
                stCol.className = 'col-3 col-md-3 mb-2 px-1 px-lg-3';
                stCol.innerHTML = `
                    <button class="two-tone-button w-100 align-items-center btn-station btn-ios p-0"
                            data-id="${st.id}"
                            data-name="${st.name}">
                <div class="button-top">${formatNickname(st.nickname)}</div><div class="button-bottom">${st.name}</div></button>
                `;
                elements.boxSection.appendChild(stCol);
            });

            // แสดง section และซ่อน boxStation
            elements.boxSection.classList.remove('d-none');
            elements.boxStation.classList.add('d-none');

            attachStationListeners();
        }

        function renderStations(stations, sectionKey) {
            elements.boxStation2.innerHTML = "";

            Object.keys(stations).forEach(key => {
                if (sectionKey && key !== sectionKey) return;

                const stationList = stations[key].stations;
                stationList.forEach(st => {
                    const stCol = document.createElement('div');
                    stCol.className = 'col-3 col-md-3 mb-3 px-1 px-lg-3';
                    stCol.innerHTML = `
                    <button class="two-tone-button w-100 align-items-center btn-station btn-ios p-0"
                            data-id="${st.id}"
                            data-name="${st.name}">
                <div class="button-top">${formatNickname(st.nickname)}</div><div class="button-bottom">${st.name}</div></button>
                `;
                    elements.boxStation2.appendChild(stCol);
                });
            });

            attachStationListeners();
        }

        // ==================== Toggle Date Inputs ====================
        function toggleDateInputs() {
            const hasDepart = !!state.departStationId;
            const hasDest = !!state.destStationId;
            const departDateContainer = document.getElementById('depart_date_container');
            const returnDateContainer = document.getElementById('return_date_container');
            const tripType = elements.tripTypeInput ? elements.tripTypeInput.value : 'O';
            const needsReturnDate = tripType === 'R' || tripType === 'M';

            if (hasDepart && hasDest) {
                // แสดง depart date container
                if (departDateContainer) {
                    departDateContainer.classList.remove('d-none');
                }

                // แสดง return date container เฉพาะเมื่อเลือก round-trip
                if (returnDateContainer) {
                    if (needsReturnDate) {
                        returnDateContainer.classList.remove('d-none');
                    } else {
                        returnDateContainer.classList.add('d-none');
                    }
                }
            } else {
                // ซ่อน date containers ทั้งหมด
                if (departDateContainer) {
                    departDateContainer.classList.add('d-none');
                }
                if (returnDateContainer) {
                    returnDateContainer.classList.add('d-none');
                }
            }
        }

        // ==================== Validation Functions ====================
        function validateForm() {
            const hasDepart = !!state.departStationId;
            const hasDest = !!state.destStationId;
            const hasDepartDate = !!elements.departDatePicker.value;

            const tripType = elements.tripTypeInput.value;
            const needsReturnDate = tripType === 'R' || tripType === 'M';
            const hasReturnDate = needsReturnDate ? !!elements.returnDatePicker.value : true;

            const isValid = hasDepart && hasDest && hasDepartDate && hasReturnDate;

            elements.submitButton.disabled = !isValid;

            if (!isValid) {
                elements.submitButton.classList.add('disabled');
                elements.submitButton.classList.add('btn-secondary');
                elements.submitButton.classList.remove('btn-main');
                elements.submitButton.classList.add('text-dark');
            } else {
                elements.submitButton.classList.remove('disabled');
                elements.submitButton.classList.remove('btn-secondary');
                elements.submitButton.classList.remove('text-dark');
                //elements.submitButton.classList.add('btn-letgo');
                elements.submitButton.classList.add('btn-main');
                //elements.submitButton.classList.add('text-dark');
            }
        }

        // ==================== Event Listeners ====================
        function attachSectionListeners() {
            document.querySelectorAll('.btn-section').forEach(btn => {
                btn.addEventListener('click', function() {
                    const sectionKey = this.dataset.section;

                    // Highlight selected section
                    document.querySelectorAll('.btn-section').forEach(b => b.classList.remove(
                        'active'));
                    this.classList.add('active');

                    // Render stations for selected section
                    const currentStations = state.departStations;
                    renderStations(currentStations, sectionKey);

                    // Toggle visibility
                    elements.boxStation.classList.remove('d-none');
                    elements.boxSection.classList.add('d-none');
                    toggleBg();
                    //elements.modalTitle.textContent = 'Select "Station"';

                    $('#box-station-title').show();
                    $('#box-section-title').hide();
                });
            });
        }

        function attachStationListeners() {
            document.querySelectorAll('.btn-station').forEach(btn => {
                btn.addEventListener('click', function() {
                    const stationId = this.dataset.id;
                    const stationName = this.dataset.name;

                    // Highlight selected station
                    document.querySelectorAll('.btn-station').forEach(b => b.classList.remove(
                        'active'));
                    this.classList.add('active');

                    handleStationSelection(stationId, stationName);
                });
            });
        }

        function handleStationSelection(stationId, stationName) {
            if (state.selectType === 'departure') {
                state.departStationId = stationId;
                elements.departStationInput.value = stationId;

                // อัพเดทชื่อใน selection-underline
                const departureElement = document.querySelector('.selection-underline[data-type="departure"]');
                const departureTitle = departureElement.querySelector('.selection-underline-title');
                const departureSubtitle = departureElement.querySelector('.selection-underline-subtitle');
                departureTitle.textContent = stationName;
                departureSubtitle.textContent = 'Selected departure point';

                // เคลียร์ destination
                state.destStationId = null;
                elements.destStationInput.value = '';
                const destinationElement = document.querySelector('.selection-underline[data-type="destination"]');
                const destinationTitle = destinationElement.querySelector('.selection-underline-title');
                const destinationSubtitle = destinationElement.querySelector('.selection-underline-subtitle');
                destinationTitle.textContent = 'Choose Your Destination';
                destinationSubtitle.textContent = 'Where do you want to go?';

                loadDestStations(stationId);
            } else if (state.selectType === 'destination') {
                state.destStationId = stationId;
                elements.destStationInput.value = stationId;

                // อัพเดทชื่อใน selection-underline
                const destinationElement = document.querySelector('.selection-underline[data-type="destination"]');
                const destinationTitle = destinationElement.querySelector('.selection-underline-title');
                const destinationSubtitle = destinationElement.querySelector('.selection-underline-subtitle');
                destinationTitle.textContent = stationName;
                destinationSubtitle.textContent = 'Selected destination';
            }

            toggleDateInputs();
            validateForm();
            resetModalView();
            $(elements.modal).modal('hide');
        }

        function resetModalView() {
            elements.boxStation.classList.add('d-none');
            elements.boxSection.classList.remove('d-none');

            $('#box-station-title').hide();
            $('#box-section-title').show();
            toggleBg();
        }

        // ==================== Trip Type Handler ====================
        function setupTripTypeHandlers() {
            document.querySelectorAll("[data-action='trip_type']").forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll("[data-action='trip_type']").forEach(b => {
                        b.classList.remove('btn-main');
                        b.classList.add('btn-light');
                    });
                    this.classList.remove('btn-light');
                    this.classList.add('btn-main');

                    const value = this.dataset.value;
                    elements.tripTypeInput.value = value;

                    console.log('Trip type changed to:', value);

                    // อัพเดทการแสดง date inputs
                    toggleDateInputs();

                    if (value === 'O') {
                        if (elements.returnDatePicker) {
                            elements.returnDatePicker.required = false;
                        }
                    } else {
                        if (elements.returnDatePicker) {
                            elements.returnDatePicker.required = true;
                        }
                    }

                    validateForm();
                });
            });
        }

        // ==================== Passenger Counter ====================
        function updatePassengerSummary() {
            const count = state.passengerCounts.adult;
            const passengerSummary = document.getElementById('passenger-summary');
            if (passengerSummary) {
                passengerSummary.textContent = count === 1 ? '1 Passenger' : `${count} Passengers`;
            }
        }



        function setupPassengerHandlers() {
            elements.passengerToggle.addEventListener('click', () => {
                elements.passengerMenu.classList.toggle('d-block');
            });

            document.querySelectorAll('.btn-plus').forEach(btn => {
                btn.addEventListener('click', () => {
                    const type = btn.dataset.type;
                    const totalPassengers = state.passengerCounts.adult +
                        state.passengerCounts.child +
                        state.passengerCounts.infant;

                    if (totalPassengers < 12) {
                        state.passengerCounts[type]++;
                        document.getElementById(`${type}-count`).textContent = state
                            .passengerCounts[type];
                        document.getElementById(type).value = state.passengerCounts[type];
                        updatePassengerSummary();
                    } else {
                        alert("Maximum 12 passengers allowed.");
                    }
                });
            });

            document.querySelectorAll('.btn-minus').forEach(btn => {
                btn.addEventListener('click', () => {
                    const type = btn.dataset.type;
                    const canDecrement = state.passengerCounts[type] > 0 &&
                        !(type === 'adult' && state.passengerCounts.adult === 1);

                    if (canDecrement) {
                        state.passengerCounts[type]--;
                        document.getElementById(`${type}-count`).textContent = state
                            .passengerCounts[type];
                        document.getElementById(type).value = state.passengerCounts[type];
                        updatePassengerSummary();
                    }
                });
            });

            document.getElementById('btn-done').addEventListener('click', () => {
                elements.passengerMenu.classList.remove('d-block');
            });

            document.addEventListener('click', (event) => {
                if (!elements.passengerToggle.contains(event.target) &&
                    !elements.passengerMenu.contains(event.target)) {
                    elements.passengerMenu.classList.remove('d-block');
                }
            });
        }

        // ==================== Modal Handlers ====================
        function setupModalHandlers() {
            $(elements.modal).on('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                state.selectType = button.dataset.type;

                const titleText = state.selectType === 'departure' ?
                    'Select "Section"' :
                    'Select "Station"';
                //elements.modalTitle.textContent = titleText;
                $('#box-station-title').hide();
                $('#box-section-title').show();

                // โหลดข้อมูลใหม่ทุกครั้งที่เปิด modal
                if (state.selectType === 'departure') {
                    loadDepartStations();
                } else if (state.selectType === 'destination' && state.departStationId) {
                    loadDestStations(state.departStationId);
                }
            });

            elements.backButton.addEventListener('click', resetModalView);
        }

        // ==================== Initialization ====================
        function init() {
            setupTripTypeHandlers();
            setupPassengerHandlers();
            setupModalHandlers();

            loadDepartStations();
            updatePassengerSummary();
            elements.departDatePicker.addEventListener('change', validateForm);
            elements.returnDatePicker.addEventListener('change', validateForm);
            toggleDateInputs(); // ตรวจสอบสถานะเริ่มต้น
            validateForm();
        }

        $(document).ready(init);

    })();

</script>
@stop
