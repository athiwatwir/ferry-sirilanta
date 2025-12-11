@props(['routes'=>[],'destStation'=>[],'departStation'=>[],'dateLists'=>[],'tripType'=>'O','departDateText'=>'','depart_date'=>''])


<link href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" rel="stylesheet" />


<div class="row">
    <div class="col-12">
        <h3 class="mb-0"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-speedboat">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M2 17h14.4a3 3 0 0 0 2.5 -1.34l3.1 -4.66h-6.23a4 4 0 0 0 -1.49 .29l-3.56 1.42a4 4 0 0 1 -1.49 .29h-5.73z" />
                <path d="M6 13l1.5 -5" />
                <path d="M6 8h8l2 3" /></svg>{{ $departStation['name'] }} to {{ $destStation['name'] }}</h3>
    </div>
    <div class="col-9 col-lg-10">
        <h3 class="d-flex align-items-center gap-2 mb-0">
            <span>Depart {{ $departDateText }}</span>

        </h3>
    </div>
    <div class="col-3 col-lg-2 text-end">
        <a href="javascript:void(0);" id="depart-date-trigger" class="d-inline-flex align-items-center text-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-event">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                <path d="M16 3l0 4" />
                <path d="M8 3l0 4" />
                <path d="M4 11l16 0" />
                <path d="M8 15h2v2h-2z" /></svg> <small>Change</small>
        </a>
        <input type="text" id="depart-date-input" class="flatpickr-hidden" aria-hidden="true" />
    </div>

</div>
</div>

<!-- route detail -->
@foreach ($routes as $route)
<x-route.card :route="$route" :departDate="$depart_date" />
@endforeach
<!-- route detail -->

@section('script')
@parent

<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script>
    $(document).ready(function() {
        // Departure date picker (hidden input to avoid showing textbox on mobile)
        var flatpickrInput = document.querySelector('#depart-date-input');
        var trigger = document.querySelector('#depart-date-trigger');

        // ถ้า element ไม่เจอให้หยุดเพื่อกัน error บนบางหน้า
        if (!flatpickrInput || !trigger) {
            return;
        }

        var departurePicker = flatpickr(flatpickrInput, {
            monthSelectorType: "static"
            , minDate: "today"
            , clickOpens: false
            , disableMobile: true
            , positionElement: trigger
            , appendTo: document.body
            , onOpen: function(selectedDates, dateStr, instance) {
                if (instance && instance.calendarContainer) {
                    instance.calendarContainer.classList.add('flatpickr-align-right');
                }
            }
            , onChange: function(selectedDates, dateStr) {
                if (selectedDates.length > 0) {
                    $('#frm_depart_date').val(dateStr);
                    $('#frm').submit();
                }
            }
        });

        function openPicker(e) {
            if (e) e.preventDefault();
            departurePicker.open();
        }

        trigger.addEventListener('click', openPicker);
        trigger.addEventListener('touchstart', openPicker, {
            passive: false
        });
        trigger.addEventListener('touchend', openPicker, {
            passive: false
        });

    });

</script>
@stop
