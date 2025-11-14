<link href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" rel="stylesheet" />
<form class="search-form" action="{{ route('booking.flight') }}">
    <div class="btn-group mb-3" role="group">
        <button type="button" class="btn btn-lg btn-main px-4 font-proxima-600" data-action="trip_type" data-value="O">One Way</button>
        <button type="button" class="btn btn-lg btn-light px-4 font-proxima-600" data-action="trip_type" data-value="R">Return</button>
        <button type="button" class="btn btn-lg btn-light px-4 font-proxima-600" data-action="trip_type" data-value="M">Multi-City</button>
        <input type="hidden" name="trip_type" id="trip_type" value="O">
        <input type="hidden" name="dest_station_id" id="dest_station_id">
        <input type="hidden" name="depart_station_id" id="depart_station_id">
    </div>

    <div class="row">
        <div class="col-12 mb-3">
            <button type="button" class="btn btn-xl btn-outline-secondary w-100 btn-select-depart-station" data-type="departure" data-bs-toggle="modal" data-bs-target="#onboardHorizontalImageModal">
                <svg style="margin-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plane-departure">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14.639 10.258l4.83 -1.294a2 2 0 1 1 1.035 3.863l-14.489 3.883l-4.45 -5.02l2.897 -.776l2.45 1.414l2.897 -.776l-3.743 -6.244l2.898 -.777l5.675 5.727z" />
                    <path d="M3 21h18" />
                </svg>
                <span>Choose Your Departure</span>
            </button>
        </div>

        <div class="col-12 mb-3">
            <button disabled type="button" class="btn btn-xl btn-outline-secondary w-100 btn-select-dest-station" data-type="destination" data-bs-toggle="modal" data-bs-target="#onboardHorizontalImageModal">
                <svg style="margin-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plane-arrival">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15.157 11.81l4.83 1.295a2 2 0 1 1 -1.036 3.863l-14.489 -3.882l-1.345 -6.572l2.898 .776l1.414 2.45l2.898 .776l-.12 -7.279l2.898 .777l2.052 7.797z" />
                    <path d="M3 21h18" />
                </svg>
                <span>Choose Your Destination</span>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 mb-3">
            <input type="text" class="form-control form-control-lg" name="depart_date" placeholder="Depart Date" id="depart_date" />

        </div>
        <div class="col-12 col-lg-6 mb-3">
            <input type="text" class="form-control form-control-lg d-none" name="return_date" placeholder="Return Date" id="return_date" />
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="dropdown-passenger">
                <button class="btn btn-lg btn-light w-100" type="button" id="passenger-toggle">
                    👤 <span id="passenger-summary">1 Adult</span>
                </button>

                <div class="dropdown-menu-passenger" id="passenger-menu">
                    <div class="passenger-row">
                        <div>
                            <strong>Adult</strong><br>
                            <small>(Above 12 years)</small>
                        </div>
                        <div class="counter">
                            <button class="btn-minus" type="button" data-type="adult">−</button>
                            <span id="adult-count">1</span>
                            <button class="btn-plus" type="button" data-type="adult">+</button>
                            <input type="hidden" name="adult" id="adult" value="1">
                        </div>
                    </div>

                    <div class="passenger-row">
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

                    <div class="passenger-row">
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
        <div class="col-12 col-lg-6">
            <button class="btn btn-primary btn-lg w-100">Book Now</button>
        </div>
    </div>
</form>

<!-- Modal -->
<div class="modal-onboarding modal fade animate__animated" id="onboardHorizontalImageModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content text-center">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="onboarding-content mb-0">
                    <h3 id="modal-title-type">Choose Your Departure</h3>
                    <div class="row" id="box-section"></div>
                    <hr>
                    <div class="row d-none" id="box-station">
                        <div class="col-12 text-start mb-2">
                            <button id="bt-back-to-station" type="button" class="btn btn-sm btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-left">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M11 7l-5 5l5 5" />
                                    <path d="M17 7l-5 5l5 5" />
                                </svg>
                                Back to Section
                            </button>
                        </div>
                        <div class="col-12">
                            <div class="row" id="box-station-2"></div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="modal-footer border-0">
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

</style>

@section('script')

<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script>
    $(document).ready(function() {
        // Departure date picker
        var flatpickrDate = document.querySelector("#depart_date");
        var departurePicker = flatpickr(flatpickrDate, {
            monthSelectorType: "static"
            , static: true
            , minDate: "today"
            , onChange: function(selectedDates, dateStr, instance) {
                // เมื่อเลือกวันเดินทางแล้ว ตั้ง minDate ของ return date
                if (selectedDates.length > 0) {
                    returnPicker.set('minDate', selectedDates[0]);

                    // ถ้าวัน return เล็กกว่าวัน departure ให้เคลียร์ค่า
                    if (returnPicker.selectedDates.length > 0 &&
                        returnPicker.selectedDates[0] < selectedDates[0]) {
                        returnPicker.clear();
                    }
                }
            }
        });

        // Return date picker
        var returnDate = document.querySelector("#return_date");
        var returnPicker = flatpickr(returnDate, {
            monthSelectorType: "static"
            , static: true
            , minDate: "today"
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
            , returnDatePicker: document.getElementById('return_date_picker')
            , destStationInput: document.getElementById('dest_station_id')
            , departStationInput: document.getElementById('depart_station_id')
            , departStationBtn: document.querySelector('.btn-select-depart-station')
            , destStationBtn: document.querySelector('.btn-select-dest-station')
            , passengerToggle: document.getElementById('passenger-toggle')
            , passengerMenu: document.getElementById('passenger-menu')
            , passengerSummary: document.getElementById('passenger-summary')
            , submitButton: document.querySelector('.btn-primary.btn-lg.w-100')
            , departDatePicker: document.getElementById('depart_date') // เพิ่ม
            , returnDatePicker: document.getElementById('return_date') // เพิ่ม
        };

        // ==================== API Calls ====================
        function loadDepartStations() {
            apiGet("station/departure", {
                    group: 'Y'
                }
                , (res) => {
                    state.departStations = res.data;
                    renderSections(state.departStations);
                }
                , (err) => console.error("Error loading departure stations:", err)
            );
        }

        function loadDestStations(departStationId) {
            apiGet("station/destination", {
                    group: 'Y'
                    , depart_station: departStationId
                }
                , (res) => {
                    state.destStations = res.data;
                    renderSections(state.destStations);
                }
                , (err) => console.error("Error loading destination stations:", err)
            );
        }

        // ==================== Rendering Functions ====================
        function renderSections(stations) {
            elements.boxSection.innerHTML = "";
            elements.boxStation2.innerHTML = "";

            Object.keys(stations).forEach(key => {
                const section = stations[key].sections;
                const sectionCol = document.createElement('div');
                sectionCol.className = 'col-12 col-md-4 mb-2';
                sectionCol.innerHTML = `
                <button class="btn btn-primary pt-2 pt-lg-5 btn-lg w-100 btn-section" data-section="${key}">
                    ${section.name}
                </button>
            `;
                elements.boxSection.appendChild(sectionCol);
            });

            attachSectionListeners();
        }

        function renderStations(stations, sectionKey) {
            elements.boxStation2.innerHTML = "";

            Object.keys(stations).forEach(key => {
                if (sectionKey && key !== sectionKey) return;

                const stationList = stations[key].stations;
                stationList.forEach(st => {
                    const stCol = document.createElement('div');
                    stCol.className = 'col-12 col-md-6 mb-2';
                    stCol.innerHTML = `
                    <button class="btn btn-primary btn-lg w-100 text-start p-2 p-lg-4 btn-station"
                            data-id="${st.id}"
                            data-name="${st.name}">
                        <strong>${st.name}</strong><br>
                        <small class="text-muted">${st.piername || ''}</small>
                    </button>
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

            // Check return date only if it's required (trip type R or M)
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
                    document.querySelectorAll('.btn-section').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    // Render stations for selected section
                    const currentStations = state.selectType === 'departure' ?
                        state.departStations :
                        state.destStations;

                    renderStations(currentStations, sectionKey);

                    // Toggle visibility
                    elements.boxStation.classList.remove('d-none');
                    elements.boxSection.classList.add('d-none');
                });
            });
        }

        function attachStationListeners() {
            document.querySelectorAll('.btn-station').forEach(btn => {
                btn.addEventListener('click', function() {
                    const stationId = this.dataset.id;
                    const stationName = this.dataset.name;

                    // Highlight selected station
                    document.querySelectorAll('.btn-station').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    handleStationSelection(stationId, stationName);
                });
            });
        }

        function handleStationSelection(stationId, stationName) {
            if (state.selectType === 'departure') {
                state.departStationId = stationId;
                elements.departStationInput.value = stationId;
                elements.departStationBtn.querySelector('span').textContent = stationName;

                // Load destinations and enable destination button
                loadDestStations(stationId);
                elements.destStationBtn.disabled = false;
            } else if (state.selectType === 'destination') {
                state.destStationId = stationId;
                elements.destStationInput.value = stationId;
                elements.destStationBtn.querySelector('span').textContent = stationName;
            }

            // Validate form - เพิ่มบรรทัดนี้
            validateForm();

            // Reset view and close modal
            resetModalView();
            $(elements.modal).modal('hide');
        }

        function resetModalView() {
            elements.boxStation.classList.add('d-none');
            elements.boxSection.classList.remove('d-none');
        }

        // ==================== Trip Type Handler ====================
        function setupTripTypeHandlers() {
            document.querySelectorAll(".btn-group [data-action='trip_type']").forEach(btn => {
                btn.addEventListener('click', function() {
                    // Update button styles
                    document.querySelectorAll(".btn-group [data-action='trip_type']").forEach(b => {
                        b.classList.remove('btn-main');
                        b.classList.add('btn-light');
                    });
                    this.classList.remove('btn-light');
                    this.classList.add('btn-main');

                    // Update trip type
                    const value = this.dataset.value;
                    elements.tripTypeInput.value = value;

                    // Toggle return date visibility
                    if (value === 'O') {
                        elements.returnDatePicker.classList.add('d-none');
                        elements.returnDatePicker.required = false;
                    } else {
                        elements.returnDatePicker.classList.remove('d-none');
                        elements.returnDatePicker.required = true;
                    }

                    validateForm();
                });
            });
        }

        // ==================== Passenger Counter ====================
        function updatePassengerSummary() {
            const summary = [];
            const counts = state.passengerCounts;

            if (counts.adult > 0) summary.push(`${counts.adult} Adult`);
            if (counts.child > 0) summary.push(`${counts.child} Child`);
            if (counts.infant > 0) summary.push(`${counts.infant} Infant`);

            elements.passengerSummary.textContent = summary.join(", ");
        }

        function setupPassengerHandlers() {
            // Toggle passenger menu
            elements.passengerToggle.addEventListener('click', () => {
                elements.passengerMenu.classList.toggle('d-block');
            });

            // Plus buttons
            document.querySelectorAll('.btn-plus').forEach(btn => {
                btn.addEventListener('click', () => {
                    const type = btn.dataset.type;
                    const totalPassengers = state.passengerCounts.adult +
                        state.passengerCounts.child +
                        state.passengerCounts.infant;

                    if (totalPassengers < 9) {
                        state.passengerCounts[type]++;
                        document.getElementById(`${type}-count`).textContent = state.passengerCounts[type];
                        document.getElementById(type).value = state.passengerCounts[type];
                        updatePassengerSummary();
                    } else {
                        alert("Maximum 9 passengers allowed.");
                    }
                });
            });

            // Minus buttons
            document.querySelectorAll('.btn-minus').forEach(btn => {
                btn.addEventListener('click', () => {
                    const type = btn.dataset.type;
                    const canDecrement = state.passengerCounts[type] > 0 &&
                        !(type === 'adult' && state.passengerCounts.adult === 1);

                    if (canDecrement) {
                        state.passengerCounts[type]--;
                        document.getElementById(`${type}-count`).textContent = state.passengerCounts[type];
                        document.getElementById(type).value = state.passengerCounts[type];
                        updatePassengerSummary();
                    }
                });
            });

            // Done button
            document.getElementById('btn-done').addEventListener('click', () => {
                elements.passengerMenu.classList.remove('d-block');
            });

            // Close on outside click
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
                    'Choose Your Departure' :
                    'Choose Your Destination';
                elements.modalTitle.textContent = titleText;
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

        // Start the application
        $(document).ready(init);

    })();

</script>
@stop
