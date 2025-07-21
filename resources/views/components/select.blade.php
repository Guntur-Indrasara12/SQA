<div class="input-group input-group-outline my-3 {{ old($name, $value ?? '') ? 'is-filled' : '' }}">
    <select name="{{ $name }}" class="form-control" {{ !empty($required) ? 'required' : '' }}>
        <option value="">-- {{ $label ?? 'Select Option' }} --</option>
        @foreach ($options as $key => $val)
            <option value="{{ $key }}" {{ old($name, $value ?? '') == $key ? 'selected' : '' }}>
                {{ $val }}</option>
        @endforeach
    </select>

    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
