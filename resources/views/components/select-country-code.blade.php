@props(['name'=>''])
<select class="form-select mb-3" aria-label="Default select example" name="{{ $name }}">
    @foreach ($countryCodes as $countryCode)
    <option value="{{ $countryCode['dial_code'] }}">{{ $countryCode['name'] }} {{ $countryCode['dial_code'] }}</option>
    @endforeach
</select>
