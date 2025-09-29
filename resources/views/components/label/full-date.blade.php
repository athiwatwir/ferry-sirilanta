@props(['date'=>''])

@if (!empty($date))
{{ \Carbon\Carbon::parse($date)->format('l M d, Y') }}
@endif
