@props(['name', 'id' => null, 'value' => null, 'type' => 'text', 'errorName' => $name])

<input {{ $attributes->merge(['class' => !$errors->has($errorName) ? 'form-control' : 'form-control is-invalid']) }}
    type="{{ $type }}" id="{{ is_null($id) ? $name : $id }}" name="{{ $name }}"
    value="{{ is_null($value) ? old($name) : $value }}" />
