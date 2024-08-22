@props(['name', 'id' => null])

<input {{ $attributes->merge(['class' => $errors->has($name) ? 'form-control is-invalid' : 'form-control']) }}
    type="file" id="{{ is_null($id) ? $name : $id }}" name="{{ $name }}" />
