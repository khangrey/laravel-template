@props(['id', 'value', 'required' => false])

<label for="{{ $id }}" class="form-label">
    {{ $value }}
    @if ($required)
        <span class="text-danger">*</span>
    @endif
</label>
