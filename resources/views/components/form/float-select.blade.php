@props(['options'=>[],'name'=>'','label'=>''])
<div class="form-floating mb-3">
    <select class="form-select" id="{{ $name }}" name="{{ $name }}">
        @foreach ($options as $value=> $text)
        <option value="{{ $value }}">{{ $text }}</option>
        @endforeach
    </select>
    <label for="floatingSelect">{{ $label }}</label>
</div>
