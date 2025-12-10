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
        margin-bottom: 0.2rem;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* เพิ่ม wrapper สำหรับจัดให้อยู่กึ่งกลาง */
    .trip-type-wrapper {
        display: flex;
        justify-content: center;
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

</style>

<form class="" action="{{ route('booking.flight') }}">
    <div class="btn-group mb-3" role="group">
        <input type="hidden" name="trip_type" id="trip_type" value="O">
        <input type="hidden" name="dest_station_id" id="dest_station_id">
        <input type="hidden" name="depart_station_id" id="depart_station_id">
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="trip-type-wrapper">
                <div class="trip-type-container">
                    <button type="button" class="trip-type-btn active" data-value="O" data-action="trip_type">
                        <span>One-way</span>
                    </button>
                    <button type="button" class="trip-type-btn" data-value="R" data-action="trip_type">
                        <span>Return</span>
                    </button>
                    <button type="button" class="trip-type-btn" data-value="M" data-action="trip_type" style="display: none;">
                        <span>Multi Island</span>
                    </button>
                </div>
            </div>
            <div class="multi-island-link">
                <a href="/" class="btn btn-secondary" style="border-radius: 50px;">Multi Island</a>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <div class="selection-underline" data-type="departure" data-bs-toggle="modal" data-bs-target="#onboardHorizontalImageModal">
                <div class="selection-underline-content">
                    <div class="selection-underline-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#F16424" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M2 17h14.4a3 3 0 0 0 2.5 -1.34l3.1 -4.66h-6.23a4 4 0 0 0 -1.49 .29l-3.56 1.42a4 4 0 0 1 -1.49 .29h-5.73z" />
                            <path d="M6 13l1.5 -5" />
                            <path d="M6 8h8l2 3" />
                        </svg>
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
        <div class="col-12 mb-3">
            <input type="text" class="form-control form-control-lg" name="depart_date" placeholder="Depart Date" id="depart_date" />

        </div>
        <div class="col-12 mb-3">
            <input type="text" class="form-control form-control-lg d-none" name="return_date" placeholder="Return Date" id="return_date" />
        </div>
        <div class="col-12 col-lg-6 mb-3" style="display: none;">
            <div class="dropdown-passenger">
                <button class="btn btn-lg btn-light w-100" type="button" id="passenger-toggle">
                    👤 <span id="_passenger-summary">1 Passenger</span>
                </button>

                <div class="dropdown-menu-passenger" id="passenger-menu">
                    <div class="passenger-row">
                        <div>
                            <strong>Passenger</strong><br>

                        </div>
                        <div class="counter">
                            <button class="btn-minus" type="button" data-type="adult">−</button>
                            <span id="_adult-count">1</span>
                            <button class="btn-plus" type="button" data-type="adult">+</button>
                            <input type="hidden" name="_adult" id="_adult" value="1">
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
        <div class="col-12 col-lg-6 mb-3">
            <div class="passenger-row">
                <div>
                    <strong>👤 <span id="passenger-summary">1 Passenger</span></strong>

                </div>
                <div class="counter">
                    <button class="btn-minus" type="button" data-type="adult">−</button>
                    <span id="adult-count">1</span>
                    <button class="btn-plus" type="button" data-type="adult">+</button>
                    <input type="hidden" name="adult" id="adult" value="1">
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-6">
            <div class="row align-items-center">
                <div class="col-4">
                    <img src="{{ asset('img/3d-hand-holding-coupon.png') }}" alt="" class="w-100">
                </div>
                <div class="col-8">
                    <button type="submit" class="btn btn-dark btn-lg w-100">Let's Go!</button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <small>For groups more than 12pax, request <a href="https://tigerlineferry.com" target="_blank">TigerlineFerry.com</a></small>
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
                <div class="onboarding-content mb-0">
                    <h3 id="modal-title-type" class="mb-1">Select "Section"</h3>
                    <div class="row mb-3" id="box-step">
                        <div class="col-12 col-lg-6 mx-auto">
                            <div class="row">
                                <div class="col-3">
                                    <div class="avatar avatar-md me-2">
                                        <span class="avatar-initial rounded-circle bg-primary">1</span>
                                    </div>
                                </div>
                                <div class="col text-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-speedboat">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M2 17h14.4a3 3 0 0 0 2.5 -1.34l3.1 -4.66h-6.23a4 4 0 0 0 -1.49 .29l-3.56 1.42a4 4 0 0 1 -1.49 .29h-5.73z" />
                                        <path d="M6 13l1.5 -5" />
                                        <path d="M6 8h8l2 3" />
                                    </svg>
                                    <br>
                                    <div class="dash-line"></div>
                                </div>
                                <div class="col-3">
                                    <div class="avatar avatar-md me-2">
                                        <span class="avatar-initial rounded-circle bg-secondary">2</span>
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
                        <div class="col-12 text-start mb-2">
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
        border-bottom: 2px dashed #ccc;
        margin: 8px 0;
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
        });

        // Departure date picker
        var flatpickrDate = document.querySelector("#depart_date");
        var departurePicker = flatpickr(flatpickrDate, {
            monthSelectorType: "static"
            , static: true
            , minDate: "today"
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
                adult: 1
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
            , submitButton: document.querySelector('.btn-dark.btn-lg.w-100')
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
                sectionCol.className = 'col-3 col-md-3 mb-2 px-1 px-lg-3';
                sectionCol.innerHTML = `
                <button class="btn btn-primary p-1 btn-lg w-100 btn-section d-flex flex-column align-items-center" data-section="${key}">
    <div class="section-image w-100">
        <img src="${section.icon}" class="w-100">
    </div>

</button> <small> ${section.name}</small>
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
                    <button class="btn btn-primary py-3 py-lg-7 btn-lg w-100 btn-section d-flex flex-column align-items-center btn-station"
                            data-id="${st.id}"
                            data-name="${st.name}">
                       <span class="mb-0 py-1 px-1 text-white fs-1 fw-bold station-nickname">${formatNickname(st.nickname)}</span></button><small class="station-name">${st.name}</small>
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
                    stCol.className = 'col-3 col-md-3 mb-2 px-1 px-lg-3';
                    stCol.innerHTML = `
                    <button class="btn btn-primary py-3 py-lg-7 p-1 btn-lg w-100 btn-section d-flex flex-column align-items-center btn-station"
                            data-id="${st.id}"
                            data-name="${st.name}">
                <span class="mb-0 py-1 px-1 text-white fs-1 fw-bold station-nickname">${formatNickname(st.nickname)}</span></button><small class="station-name">${st.name}</small>
                `;
                    elements.boxStation2.appendChild(stCol);
                });
            });

            attachStationListeners();
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
            } else {
                elements.submitButton.classList.remove('disabled');
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
                    elements.modalTitle.textContent = 'Select "Station"';
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

            validateForm();
            resetModalView();
            $(elements.modal).modal('hide');
        }

        function resetModalView() {
            elements.boxStation.classList.add('d-none');
            elements.boxSection.classList.remove('d-none');
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
                    console.log('returnDatePicker element:', elements.returnDatePicker);

                    if (value === 'O') {
                        if (elements.returnDatePicker) {
                            elements.returnDatePicker.classList.add('d-none');
                            elements.returnDatePicker.required = false;
                            // ซ่อน parent div ด้วย
                            const returnDateParent = elements.returnDatePicker.closest('.col-12');
                            if (returnDateParent) {
                                returnDateParent.classList.add('d-none');
                            }
                        }
                    } else {
                        if (elements.returnDatePicker) {
                            // แสดง parent div ก่อน
                            const returnDateParent = elements.returnDatePicker.closest('.col-12');
                            if (returnDateParent) {
                                returnDateParent.classList.remove('d-none');
                            }
                            // แล้วค่อยแสดง input
                            elements.returnDatePicker.classList.remove('d-none');
                            elements.returnDatePicker.required = true;
                            console.log('Return date picker should be visible now');
                        } else {
                            console.error('returnDatePicker element not found!');
                        }
                    }

                    validateForm();
                });
            });
        }

        // ==================== Passenger Counter ====================
        function updatePassengerSummary() {
            const summary = [];
            const counts = state.passengerCounts;

            if (counts.adult > 0) summary.push(`${counts.adult} Passenger`);
            if (counts.child > 0) summary.push(`${counts.child} Child`);
            if (counts.infant > 0) summary.push(`${counts.infant} Infant`);

            elements.passengerSummary.textContent = summary.join(", ");
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
                elements.modalTitle.textContent = titleText;

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
            validateForm();
        }

        $(document).ready(init);

    })();

</script>
@stop
