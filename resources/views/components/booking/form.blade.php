<link href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" rel="stylesheet" />
<form class="" action="{{ route('booking.flight') }}">
    <div class="btn-group mb-3" role="group">
        <input type="hidden" name="trip_type" id="trip_type" value="O">
        <input type="hidden" name="dest_station_id" id="dest_station_id">
        <input type="hidden" name="depart_station_id" id="depart_station_id">
    </div>
    <div class="row mb-3">
        <div class="col">
            <button type="button" class="btn btn-lg btn-main px-4 font-proxima-600 w-100" data-action="trip_type" data-value="O">One Way</button>
        </div>
        <div class="col-6" style="display: none;">
            <button type="button" class="btn btn-lg btn-light px-4 font-proxima-600 w-100" data-action="trip_type" data-value="R">Return</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <button type="button" class="btn btn-xl btn-outline-secondary w-100 btn-select-depart-station" data-type="departure" data-bs-toggle="modal" data-bs-target="#onboardHorizontalImageModal">
                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-speedboat">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M2 17h14.4a3 3 0 0 0 2.5 -1.34l3.1 -4.66h-6.23a4 4 0 0 0 -1.49 .29l-3.56 1.42a4 4 0 0 1 -1.49 .29h-5.73z" />
                    <path d="M6 13l1.5 -5" />
                    <path d="M6 8h8l2 3" /></svg>
                <span>Choose Your Departure</span>
            </button>
        </div>

        <div class="col-12 mb-3">
            <button disabled type="button" class="btn btn-xl btn-outline-secondary w-100 btn-select-dest-station" data-type="destination" data-bs-toggle="modal" data-bs-target="#onboardHorizontalImageModal">
                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                    <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                <span>Choose Your Destination</span>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 mb-3">
            <input type="text" class="form-control form-control-lg" name="depart_date" placeholder="Depart Date" id="depart_date" />

        </div>
        <div class="col-12 col-lg-6 mb-3" style="display: none;">
            <input type="text" class="form-control form-control-lg d-none" name="return_date" placeholder="Return Date" id="return_date" />
        </div>
        <div class="col-12 col-lg-6">
            <div class="dropdown-passenger">
                <button class="btn btn-lg btn-light w-100" type="button" id="passenger-toggle">
                    👤 <span id="passenger-summary">1 Passenger</span>
                </button>

                <div class="dropdown-menu-passenger" id="passenger-menu">
                    <div class="passenger-row">
                        <div>
                            <strong>Passenger</strong><br>

                        </div>
                        <div class="counter">
                            <button class="btn-minus" type="button" data-type="adult">−</button>
                            <span id="adult-count">1</span>
                            <button class="btn-plus" type="button" data-type="adult">+</button>
                            <input type="hidden" name="adult" id="adult" value="1">
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
    </div>

    <div class="row">

        <div class="col-12 col-lg-6 mx-auto">
            <button class="btn btn-primary btn-lg w-100">SEARCH</button>
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
                <button class="btn btn-primary py-5 py-lg-12 btn-lg w-100 btn-section" data-section="${key}">
                    ${section.name}<br/>${section.name_th}
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
                    stCol.className = 'col-12 col-md-4 mb-2';
                    stCol.innerHTML = `
                    <button class="btn btn-primary btn-lg w-100 text-start py-5 py-lg-12 btn-station"
                            data-id="${st.id}"
                            data-name="${st.name}"><svg fill="#ffffff" width="50px" height="50px" viewBox="-1 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="m1.258 4.956-.16 1.162 1.13-.316.441 1.088.82-.838.926.72.292-1.135 1.162.16-.316-1.13 1.088-.44-.838-.82.72-.926-1.135-.292.16-1.162-1.13.316-.441-1.088-.825.838-.926-.72-.292 1.135-1.162-.16.316 1.13-1.088.441.838.82-.72.926zm1.429-3.226c.187-.066.403-.104.628-.104 1.075 0 1.946.871 1.946 1.946s-.871 1.946-1.946 1.946c-.849 0-1.572-.544-1.837-1.303l-.004-.014c-.066-.188-.105-.404-.105-.629 0-.849.545-1.571 1.304-1.836l.014-.004z"></path><path d="m4.691 20.582c.111 0 .212-.046.284-.119l.246-.254c.434-.447 1.04-.724 1.711-.724s1.277.277 1.711.724l.001.001.252.258c.072.073.173.119.284.119h.001c.11 0 .21-.046.28-.119l.266-.27c.434-.441 1.037-.714 1.703-.714.673 0 1.282.279 1.716.727l.001.001.24.246c.072.075.172.121.284.122.111-.002.211-.047.284-.119l.244-.252c.434-.447 1.04-.724 1.711-.724s1.277.277 1.711.724l.001.001.25.254c.072.075.172.121.284.122.112 0 .213-.047.284-.122l.246-.254c.162-.164.346-.305.548-.418l.012-.006c-1.233-1.134-2.696-2.04-4.309-2.637l-.091-.029c-.674-2.876-.08-6.654.846-9.511.021-.022.04-.042.058-.064 1.512.375 2.615 1.72 2.615 3.323 0 .858-.316 1.642-.838 2.242l.004-.004c.022 0 .047.001.073.001 1.888 0 3.418-1.53 3.418-3.418s-1.53-3.418-3.418-3.418c-.037 0-.074.001-.111.002h.005c.261-.075.563-.127.875-.145h.011c.088-.007.191-.012.294-.012 1.28 0 2.408.65 3.072 1.638l.008.013c.175-.356.277-.774.277-1.217 0-.05-.001-.1-.004-.15v.007c-.221-1.696-1.656-2.992-3.395-2.992-.14 0-.278.008-.413.025l.016-.002c-.234.012-.453.043-.666.092l.026-.005c.001-.026.001-.056.001-.086 0-.244-.024-.482-.069-.712l.004.023c-.201-1.54-1.504-2.717-3.083-2.717-.128 0-.255.008-.379.023l.015-.001c-.44.088-.827.277-1.148.542l.004-.003c.959.341 1.698 1.089 2.02 2.031l.007.023c-.277-.229-.59-.433-.925-.598l-.028-.013c-2.027-.984-4.335-.417-5.155 1.271-.183.372-.291.809-.291 1.271 0 .07.002.139.007.208l-.001-.009c.628-.394 1.392-.627 2.21-.627.718 0 1.395.18 1.986.497l-.023-.011c.325.16.604.337.863.539l-.011-.008c-.417-.174-.901-.276-1.408-.276-2.063 0-3.736 1.673-3.736 3.736 0 .998.391 1.904 1.028 2.574l-.002-.002c.369.388.82.696 1.325.895l.025.009c-.12-.351-.19-.755-.19-1.176 0-2.063 1.672-3.735 3.735-3.735.14 0 .278.008.414.023l-.017-.002c-2.038 3.902-3.261 6.946-3.465 9.291h-.05c-1.026.002-2.017.148-2.956.419l.076-.019c-1.117-1.153-1.977-2.562-2.484-4.129l-.021-.075c0-.016 0-.032.006-.045.21-.091.454-.144.711-.144 1.006 0 1.822.816 1.822 1.822 0 .049-.002.098-.006.146v-.006c.459-.335.754-.871.754-1.476 0-1.006-.816-1.822-1.822-1.822-.422 0-.81.143-1.119.384l.004-.003c.1-.127.209-.24.328-.34l.004-.003c.344-.302.799-.486 1.296-.486.24 0 .471.043.684.122l-.014-.004c-.051-.259-.162-.486-.318-.674l.002.002c-.332-.347-.799-.562-1.316-.562-.484 0-.924.189-1.25.497l.001-.001c-.089.075-.17.154-.244.238l-.002.002c-.084-.115-.174-.217-.272-.309l-.001-.001c-.302-.315-.726-.51-1.196-.51-.439 0-.839.171-1.135.45l.001-.001c-.15.163-.261.363-.318.585l-.002.009c.154-.05.332-.078.516-.078.376 0 .724.119 1.009.322l-.005-.004c-.039-.002-.084-.003-.13-.003-.167 0-.33.017-.488.049l.016-.003c-1.022.108-1.811.965-1.811 2.007 0 .061.003.122.008.181l-.001-.008c.054.278.175.522.347.722l-.002-.002c.297-.73.946-1.26 1.731-1.383l.013-.002c.138-.028.296-.044.458-.044.026 0 .053 0 .079.001h-.004c-.873.224-1.508 1.004-1.508 1.932 0 1.1.891 1.991 1.991 1.991.191 0 .375-.027.55-.077l-.014.003c-.514-.366-.846-.959-.846-1.631 0-.12.011-.238.031-.353l-.002.012c.104-.589.457-1.079.944-1.366l.009-.005c.204 1.754.653 3.354 1.315 4.837l-.042-.105c-1.279.611-2.38 1.358-3.351 2.243l.011-.01c.429.146.794.381 1.09.684l.001.001c.081.063.185.102.297.102z"></path><path d="m1.202 21.61c.116-.001.221-.048.297-.125.241-.247.578-.401.95-.401s.709.153.95.4c.329.337.787.546 1.295.546s.966-.209 1.294-.546l.246-.252c.178-.184.427-.297.703-.297s.525.114.703.297l.252.258c.328.338.786.547 1.294.547.504 0 .961-.207 1.288-.541l.268-.27c.177-.182.424-.294.698-.294.276 0 .525.115.703.299l.24.246c.326.34.785.552 1.293.552h.002.001c.508 0 .966-.211 1.293-.549l.001-.001.244-.25c.178-.183.428-.297.703-.297s.525.114.703.297l.246.252c.328.337.786.546 1.293.546s.965-.209 1.293-.546l.247-.255c.178-.184.427-.297.703-.297s.525.114.703.297c.075.078.18.126.296.126s.221-.048.296-.126c.076-.079.123-.187.123-.305s-.047-.226-.123-.305c-.329-.337-.787-.547-1.295-.547s-.966.209-1.294.546l-.246.254c-.178.184-.427.297-.703.297s-.525-.114-.703-.297l-.246-.254c-.329-.337-.787-.547-1.295-.547s-.966.209-1.294.546l-.244.25c-.179.182-.428.295-.703.297-.276-.001-.525-.116-.703-.3l-.24-.246c-.328-.34-.788-.552-1.297-.552-.504 0-.96.207-1.287.541l-.266.27c-.178.18-.425.292-.698.292-.276 0-.525-.114-.703-.297l-.252-.258c-.329-.337-.787-.546-1.295-.546s-.966.209-1.294.546l-.246.252c-.178.183-.426.297-.701.297-.001 0-.001 0-.002 0-.001 0-.002 0-.003 0-.274 0-.521-.114-.697-.296-.391-.403-.937-.653-1.542-.653s-1.151.25-1.541.652l-.001.001c-.076.079-.122.187-.122.305s.047.226.123.305c.073.081.178.132.295.133z"></path><path d="m21.696 22.584c-.329-.337-.787-.547-1.295-.547s-.966.209-1.294.546l-.246.254c-.178.183-.428.297-.703.297s-.525-.114-.703-.297l-.247-.255c-.329-.337-.787-.547-1.295-.547s-.966.209-1.294.546l-.244.25c-.179.182-.428.295-.703.297-.276-.001-.525-.116-.703-.3l-.24-.246c-.328-.34-.788-.552-1.297-.552-.504 0-.96.207-1.287.541l-.266.27c-.178.18-.425.292-.698.292-.276 0-.525-.114-.703-.297l-.252-.258c-.329-.337-.787-.547-1.295-.547s-.966.209-1.294.546l-.246.254c-.178.184-.427.297-.703.297s-.525-.114-.703-.297c-.391-.403-.937-.653-1.542-.653s-1.151.25-1.541.652l-.001.001c-.076.079-.122.187-.122.305s.047.226.123.305c.075.078.18.127.297.127.116-.001.221-.048.297-.125.241-.247.578-.401.95-.401s.709.153.95.4c.329.337.787.546 1.295.546s.966-.209 1.294-.546l.246-.252c.178-.183.428-.297.703-.297s.525.114.703.297l.252.258c.328.337.786.547 1.294.547.504 0 .961-.207 1.288-.541l.268-.27c.177-.182.424-.294.698-.294.276 0 .525.115.703.299l.24.246c.326.34.785.552 1.293.552h.001.002c.507 0 .965-.21 1.292-.548v-.001l.244-.25c.178-.184.427-.297.703-.297s.525.114.703.297l.246.252c.328.337.786.546 1.293.546s.965-.209 1.293-.546l.246-.252c.178-.184.427-.297.703-.297s.525.114.703.297c.075.078.18.126.296.126s.221-.048.296-.126c.078-.078.127-.187.127-.306s-.048-.226-.125-.304z"></path></g></svg>
                        ${st.name}<br/>${st.name_th}
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
            document.querySelectorAll("[data-action='trip_type']").forEach(btn => {
                btn.addEventListener('click', function() {
                    // Update button styles
                    document.querySelectorAll("[data-action='trip_type']").forEach(b => {
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

            if (counts.adult > 0) summary.push(`${counts.adult} Passenger`);
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
