<form class="search-form" action="{{ route('booking.flight') }}">
    <div class="btn-group mb-3" role="group">
        <button type="button" class="btn btn-lg btn-main px-4 font-proxima-600" data-action="trip_type" data-value="O">One Way</button>
        <button type="button" class="btn btn-lg btn-light px-4 font-proxima-600" data-action="trip_type" data-value="R">Return</button>
        <button type="button" class="btn btn-lg btn-light px-4 font-proxima-600" data-action="trip_type" data-value="M">Multi-City</button>
        <input type="hidden" name="trip_type" id="trip_type" value="O">
    </div>

    <!-- From -->
    <div class="dropdown mb-3" data-type="from">
        <label for="from">From</label>
        <input type="text" id="from" placeholder="Type city or airport" autocomplete="off" required>
        <input type="hidden" name="depart_station" id="from_id">
        <div class="dropdown-list"></div>
    </div>

    <!-- To -->
    <div class="dropdown mb-3" data-type="to">
        <label for="to">To</label>
        <input type="text" id="to" placeholder="Type city or airport" autocomplete="off" required>
        <input type="hidden" name="dest_station" id="to_id">
        <div class="dropdown-list"></div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 mb-3">
            <input class="form-control form-control-lg" type="text" placeholder="Depart Date" name="depart_date_picker" id="depart_date_picker" required>
            <input type="hidden" id="depart_date" name="depart_date">
        </div>
        <div class="col-12 col-lg-6 mb-3">
            <input class="form-control form-control-lg" type="text" placeholder="Return Date" name="return_date_picker" id="return_date_picker" style="display: none;">
            <input type="hidden" id="return_date" name="return_date">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="dropdown-passenger">
                <button class="btn btn-lg btn-light" type="button" id="passenger-toggle">
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
    </div>
    <div class="row">
        <div class="col-12 text-end">
            <button class="btn btn-main btn-lg">Book Now</button>
        </div>
    </div>
</form>

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<script>
    let departStations = []; // เก็บรายการ departure ไว้ให้เลือกทีหลัง

    /**
     * ฟังก์ชันสร้าง dropdown autocomplete
     */
    function bindDropdown(input, stations, onSelect) {
        const dropdown = input.parentElement;
        const list = dropdown.querySelector(".dropdown-list");
        const hiddenInput = dropdown.querySelector("input[type=hidden]"); // 👈 hidden input

        input.addEventListener("input", () => {
            const val = input.value.toLowerCase();
            list.innerHTML = "";
            const filtered = stations.filter(a =>
                a.name.toLowerCase().includes(val) ||
                a.piername.toLowerCase().includes(val)
            );
            filtered.forEach(a => {
                const item = document.createElement("div");
                item.textContent = `${a.name} (${a.piername})`;
                item.addEventListener("click", () => {
                    input.value = `${a.name} (${a.piername})`;
                    hiddenInput.value = a.id; // ✅ เก็บ id จริง
                    list.style.display = "none";
                    if (onSelect) onSelect(a); // 🔑 callback เมื่อเลือก item
                });
                list.appendChild(item);
            });
            list.style.display = filtered.length ? "block" : "none";
        });

        input.addEventListener("focus", () => {
            if (input.value === "") {
                list.innerHTML = "";
                stations.forEach(a => {
                    const item = document.createElement("div");
                    item.textContent = `${a.name} (${a.piername})`;
                    item.addEventListener("click", () => {
                        input.value = `${a.name} (${a.piername})`;
                        hiddenInput.value = a.id; // ✅ เก็บ id จริง
                        list.style.display = "none";
                        if (onSelect) onSelect(a);
                    });
                    list.appendChild(item);
                });
                list.style.display = "block";
            }
        });

        // ปิด dropdown ถ้าคลิกข้างนอก
        document.addEventListener("click", e => {
            if (!dropdown.contains(e.target)) {
                list.style.display = "none";
            }
        });
    }

    /**
     * โหลด departure stations
     */
    function loadDepartStations() {
        apiGet("station/departure", {
            group: 'N'
        }, function(res) {
            console.log("departure:", res);
            departStations = res.data;
            const input = document.getElementById('from');

            // bindDropdown พร้อม callback เมื่อเลือกสถานี
            bindDropdown(input, departStations, function(selected) {
                console.log("เลือก departure:", selected);
                loadDestStations(selected.id); // 🔑 โหลดปลายทางจาก id ที่เลือก
            });
        }, function(err) {
            console.error("Error departure:", err);
        });
    }

    /**
     * โหลด destination stations (ต้องใช้ depart_station)
     */
    function loadDestStations(departStationId) {
        apiGet("station/destination", {
            group: 'N'
            , depart_station: departStationId
        }, function(res) {
            console.log("destination:", res);
            const input = document.getElementById('to');
            bindDropdown(input, res.data);
        }, function(err) {
            console.error("Error destination:", err);
        });
    }

    /**
     * Toggle Trip type
     */
    $(document).on("click", ".btn-group [data-action='trip_type']", function() {
        $(".btn-group [data-action='trip_type']")
            .removeClass("btn-main")
            .addClass("btn-light");

        $(this).removeClass("btn-light").addClass("btn-main");

        const value = $(this).data("value");
        $('#trip_type').val(value);
        if (value === 'O') {
            $('#return_date_picker').hide();
            $('#return_date_picker').prop('required', false);
        } else {
            $('#return_date_picker').show();
            $('#return_date_picker').prop('required', true);
        }
    });

    // เริ่มทำงาน
    $(document).ready(function() {
        loadDepartStations();

        $('#depart_date_picker').datepicker({
            format: "d M yyyy"
            , autoclose: true
            , todayHighlight: true
            , startDate: 'today'
        }).on('changeDate', function(e) {
            let date = e.format('yyyy-mm-dd');
            $('#depart_date').val(date);

            // อัพเดต return date picker ให้เริ่มจากวันถัดไป
            let nextDay = new Date(e.date);
            nextDay.setDate(nextDay.getDate() + 1);
            $('#return_date_picker').datepicker('setStartDate', nextDay);
            $('#return_date').val(nextDay);
            // ล้าง return date ถ้าเลือกไว้แล้วแต่น้อยกว่า depart date
            let currentReturn = $('#return_date').datepicker('getDate');
            if (currentReturn && currentReturn <= e.date) {
                $('#return_date_picker').datepicker('clearDates');
                $('#return_date').val('');
            }
        });

        $('#return_date_picker').datepicker({
            format: "d M yyyy"
            , autoclose: true
            , todayHighlight: true
            , startDate: 'today'
        }).on('changeDate', function(e) {
            let date = e.format('yyyy-mm-dd');
            $('#return_date').val(date);
        });
    });

</script>




<script>
    let counts = {
        adult: 1
        , child: 0
        , infant: 0
    };

    function updateSummary() {
        let summary = [];
        if (counts.adult > 0) summary.push(counts.adult + " Adult");
        if (counts.child > 0) summary.push(counts.child + " Child");
        if (counts.infant > 0) summary.push(counts.infant + " Infant");
        document.getElementById("passenger-summary").textContent = summary.join(", ");
    }

    document.getElementById("passenger-toggle").addEventListener("click", () => {
        const menu = document.getElementById("passenger-menu");
        menu.style.display = (menu.style.display === "block") ? "none" : "block";
    });

    document.querySelectorAll(".btn-plus").forEach(btn => {
        btn.addEventListener("click", () => {
            const type = btn.dataset.type;
            if (counts.adult + counts.child + counts.infant < 9) {
                counts[type]++;
                document.getElementById(type + "-count").textContent = counts[type];
                document.getElementById(type).value = counts[type];
                updateSummary();

            } else {
                alert("Maximum 9 passengers allowed.");
            }
        });
    });

    document.querySelectorAll(".btn-minus").forEach(btn => {
        btn.addEventListener("click", () => {
            const type = btn.dataset.type;
            if (counts[type] > 0 && !(type === "adult" && counts.adult === 1)) {
                counts[type]--;
                document.getElementById(type + "-count").textContent = counts[type];
                updateSummary();
            }
        });
    });

    document.getElementById("btn-done").addEventListener("click", () => {
        document.getElementById("passenger-menu").style.display = "none";
    });

    // ปิด dropdown เมื่อคลิกข้างนอก
    document.addEventListener("click", function(event) {
        const menu = document.getElementById("passenger-menu");
        const toggle = document.getElementById("passenger-toggle");
        if (!toggle.contains(event.target) && !menu.contains(event.target)) {
            menu.style.display = "none";
        }
    });

    updateSummary();

</script>
@stop
