<div class="input-group input-group-outline my-3 {{ old($name, $value ?? '') ? 'is-filled' : '' }}">
    @if (!empty($label))
        <label class="form-label">{{ $label }}</label>
    @endif

    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" class="form-control"
        value="{{ old($name, $value ?? '') }}" step="{{ $step ?? 'any' }}" min="{{ $min ?? null }}"
        {{ !empty($required) ? 'required' : '' }}>

    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
