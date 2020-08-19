<div class="form-group row">
    <label for="{{ $name }}" class="col-sm-2 col-form-label">{{ $label }}</label>
    <div class="col-sm-10">
        <input id="{{ $name }}" name="{{ $name }}" class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}"
            placeholder="{{ $placeholder }}" {{ !empty($disabled) ? 'disabled' : '' }}
            value="{{ isset($value) ? $value : '' }}">
        <span class="error invalid-feedback" style="display: inline">{{ $errors->first($name) }}</span>
    </div>
</div>
