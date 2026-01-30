@props(['name'=>'','label'=>'','isrrequire'=>true,'placeholder'=>''])
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="{{ $name }}" name="{{ $name }}" @required($isrrequire) placeholder="{{ $placeholder }}">
    <label for="{{ $name }}">{{ $label }} @if ($isrrequire)
        <strong class="text-danger">*</strong>
        @endif</label>
</div>
