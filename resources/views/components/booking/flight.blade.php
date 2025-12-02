@props(['routes'=>[],'destStation'=>[],'departStation'=>[],'dateLists'=>[],'tripType'=>'O','departDateText'=>'','depart_date'=>''])


<link href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" rel="stylesheet" />


<div class="row">
    <div class="col-12">
        <h5 class="mb-0"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-speedboat">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M2 17h14.4a3 3 0 0 0 2.5 -1.34l3.1 -4.66h-6.23a4 4 0 0 0 -1.49 .29l-3.56 1.42a4 4 0 0 1 -1.49 .29h-5.73z" />
                <path d="M6 13l1.5 -5" />
                <path d="M6 8h8l2 3" /></svg>{{ $departStation['name'] }} to {{ $destStation['name'] }}</h5>
    </div>
    <div class="col-12">
        <h5>Depart {{ $departDateText }} <a href="javascript:void(0);" data-action="depart-date" data-target="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-stats">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                    <path d="M18 14v4h4" />
                    <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M15 3v4" />
                    <path d="M7 3v4" />
                    <path d="M3 11h16" /></svg></a>
        </h5>

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
        // Departure date picker
        var flatpickrDate = document.querySelector('[data-action="depart-date"]');
        var departurePicker = flatpickr(flatpickrDate, {
            monthSelectorType: "static"
            , static: true
            , minDate: "today"
            , onChange: function(selectedDates, dateStr, instance) {
                if (selectedDates.length > 0) {
                    console.log(selectedDates);
                    console.log(dateStr);
                    $('#frm_depart_date').val(dateStr);
                    $('#frm').submit();
                }
            }
        });

    });

</script>
@stop
