{{-- Renders GET/POST-friendly hidden inputs from session booking query (supports scalar + one-level numeric arrays). --}}
@php
    $withIds = $withIds ?? true;
    $idPrefix = $idPrefix ?? 'frm_';
@endphp
@foreach ($data as $key => $value)
    @continue(in_array($key, ['_token', '_method'], true))
    @if (is_array($value))
        @foreach ($value as $i => $v)
            @if (!is_array($v))
                <input
                    type="hidden"
                    name="{{ $key }}[{{ $i }}]"
                    value="{{ $v }}"
                    @if ($withIds) id="{{ $idPrefix }}{{ $key }}_{{ $i }}" @endif
                >
            @endif
        @endforeach
    @else
        <input
            type="hidden"
            name="{{ $key }}"
            value="{{ $value }}"
            @if ($withIds) id="{{ $idPrefix }}{{ $key }}" @endif
        >
    @endif
@endforeach
