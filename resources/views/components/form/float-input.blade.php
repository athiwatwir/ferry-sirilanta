@props(['name'=>'','label'=>'','isrrequire'=>true])
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="{{ $name }}" name="{{ $name }}" @required($isrrequire)>
    <label for="{{ $name }}">{{ $label }} @if ($isrrequire)
        <strong class="text-danger">*</strong>
        @endif</label>
</div>
