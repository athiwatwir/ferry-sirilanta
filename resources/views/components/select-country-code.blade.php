@props(['name'=>''])
<select class="form-select mb-3" aria-label="Default select example" name="{{ $name }}">
    @foreach ($countryCodes as $countryCode)
    <option value="{{ $countryCode['dial_code'] }}" @selected($countryCode['dial_code']=='+66' )>{{ $countryCode['code'] }} {{ $countryCode['dial_code'] }}</option>
    @endforeach
</select>
