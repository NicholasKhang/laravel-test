<div class="form-group row">
    <label for="{{ $name }}" class="col-sm-2 col-form-label">{{ $label }}</label>
    <div class="col-sm-10">
        <textarea id="{{ $name }}" name="{{ $name }}" class="form-control" rows="{{ $rows }}"
            placeholder="{{ $placeholder }}"
            {{ !empty($disabled) ? 'disabled' : '' }}>{{ isset($value) ? $value : '' }}</textarea>
    </div>
</div>
