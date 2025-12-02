@props(['routes'=>[],'destStation'=>[],'departStation'=>[],'dateLists'=>[],'type'=>'A','departDateText'=>'','depart_date'=>''])
<style>
    .date-selector-wrapper {
        position: relative;
        padding: 0 50px;
    }

    .arrow-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: white;
        border: 2px solid #ddd;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        transition: all 0.2s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .arrow-btn:hover:not(:disabled) {
        background: #f8f9fa;
        border-color: #adb5bd;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .arrow-btn:disabled {
        opacity: 0.3;
        cursor: not-allowed;
    }

    .arrow-btn-left {
        left: 0;
    }

    .arrow-btn-right {
        right: 0;
    }

    .arrow-btn svg {
        width: 20px;
        height: 20px;
    }

    #dateSelector {
        display: flex !important;
        flex-wrap: nowrap !important;
        overflow-x: auto;
        overflow-y: hidden;
        gap: 0.5rem;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        padding: 4px 0;
    }

    #dateSelector::-webkit-scrollbar {
        display: none;
    }

    #dateSelector .col {
        flex: 0 0 auto !important;
        width: 110px;
    }

    .date-card {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 12px 8px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
        background: white;
        height: 100%;
    }

    .date-card:hover {
        border-color: #adb5bd;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .date-card.active {
        background: #0d6efd;
        color: white;
        border-color: #0d6efd;
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
    }

    .date-card h6 {
        font-size: 0.9rem;
        font-weight: 600;
    }

    /* Mobile: ซ่อนลูกศร */
    @media (max-width: 768px) {
        .arrow-btn {
            display: none !important;
        }

        .date-selector-wrapper {
            padding: 0;
        }
    }

    /* Desktop: แสดงลูกศร */
    @media (min-width: 769px) {
        #dateSelector {
            overflow-x: hidden;
        }
    }
</style>
<link href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" rel="stylesheet" />


<div class="row" style="display: none;">
    <div class="col-12">
        <h5 class="mb-0"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-speedboat">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M2 17h14.4a3 3 0 0 0 2.5 -1.34l3.1 -4.66h-6.23a4 4 0 0 0 -1.49 .29l-3.56 1.42a4 4 0 0 1 -1.49 .29h-5.73z" />
                <path d="M6 13l1.5 -5" />
                <path d="M6 8h8l2 3" />
            </svg>{{ $departStation['name'] }} to {{ $destStation['name'] }}</h5>
    </div>
    <div class="col-12 mb-3">
        <div class="date-selector py-1">
            <div class="date-selector-wrapper">
                <button class="arrow-btn arrow-btn-left" id="scrollLeft" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <div class="row g-2" id="dateSelector">
                    @foreach ($dateLists as $date)
                    <div class="col">
                        <div class="date-card @if ($date['active'] == 'Y') active @endif" data-date="{{ $date['date'] }}" data-type="depart">
                            <div class="date">
                                <h6 class="mb-0">{{ $date['date_text'] }}</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <button class="arrow-btn arrow-btn-right" id="scrollRight">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h5 class="mb-0"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-speedboat">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M2 17h14.4a3 3 0 0 0 2.5 -1.34l3.1 -4.66h-6.23a4 4 0 0 0 -1.49 .29l-3.56 1.42a4 4 0 0 1 -1.49 .29h-5.73z" />
                <path d="M6 13l1.5 -5" />
                <path d="M6 8h8l2 3" />
            </svg>{{ $departStation['name'] }} to {{ $destStation['name'] }}</h5>
    </div>
    <div class="col-12">
        <h5>Depart {{ $departDateText }} <a href="javascript:void(0);" id="_depart_date"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-stats">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                    <path d="M18 14v4h4" />
                    <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M15 3v4" />
                    <path d="M7 3v4" />
                    <path d="M3 11h16" />
                </svg></a></h5>
    </div>
</div>

@foreach ($routes as $route)

<x-route.card :route="$route" :departDate="$depart_date" />
@endforeach


@section('script')
@parent

<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script>
    (function() {
        const dateSelector = document.getElementById('dateSelector');
        const scrollLeftBtn = document.getElementById('scrollLeft');
        const scrollRightBtn = document.getElementById('scrollRight');
        const scrollAmount = 240; // เลื่อนประมาณ 2 cards

        function updateArrowStates() {
            const isAtStart = dateSelector.scrollLeft <= 0;
            const isAtEnd = dateSelector.scrollLeft + dateSelector.clientWidth >= dateSelector.scrollWidth - 1;

            scrollLeftBtn.disabled = isAtStart;
            scrollRightBtn.disabled = isAtEnd;
        }

        scrollLeftBtn.addEventListener('click', () => {
            dateSelector.scrollLeft -= scrollAmount;
        });

        scrollRightBtn.addEventListener('click', () => {
            dateSelector.scrollLeft += scrollAmount;
        });

        dateSelector.addEventListener('scroll', updateArrowStates);
        window.addEventListener('resize', updateArrowStates);

        // Click event for date cards
        document.querySelectorAll('.date-card').forEach(card => {
            card.addEventListener('click', function() {
                document.querySelectorAll('.date-card').forEach(c => c.classList.remove('active'));
                this.classList.add('active');

                // คุณสามารถเพิ่ม logic เพิ่มเติมตรงนี้ เช่น
                // const selectedDate = this.dataset.date;
                // console.log('Selected date:', selectedDate);
            });
        });

        // Initial check
        updateArrowStates();
    })();


    $(document).ready(function() {
        // Departure date picker
        var flatpickrDate = document.querySelector("#_depart_date");
        var departurePicker = flatpickr(flatpickrDate, {
            monthSelectorType: "static",
            static: true,
            minDate: "today",
            onChange: function(selectedDates, dateStr, instance) {
                if (selectedDates.length > 0) {
                    returnPicker.set('minDate', selectedDates[0]);

                    if (returnPicker.selectedDates.length > 0 &&
                        returnPicker.selectedDates[0] < selectedDates[0]) {
                        returnPicker.clear();
                    }
                }
            }
        });

    });
</script>
@stop