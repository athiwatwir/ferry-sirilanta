{{-- Renders GET/POST-friendly hidden inputs from session booking query (supports scalar + one-level numeric arrays). --}}
@foreach ($data as $key => $value)
    @continue(in_array($key, ['_token', '_method'], true))
    @if (is_array($value))
        @foreach ($value as $i => $v)
            @if (!is_array($v))
                <input type="hidden" name="{{ $key }}[{{ $i }}]" value="{{ $v }}" id="frm_{{ $key }}_{{ $i }}">
            @endif
        @endforeach
    @else
        <input type="hidden" name="{{ $key }}" value="{{ $value }}" id="frm_{{ $key }}">
    @endif
@endforeach
