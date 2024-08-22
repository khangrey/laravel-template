@props(['id' => null, 'name', 'selected' => old($name), 'placeholder' => 'Choose option', 'items'])

<select {!! $attributes->merge(['class' => 'form-select ' . !$errors->has($name) ?: 'is-invalid']) !!} id="{{ is_null($id) ? $name : $id }}" name="{{ $name }}">
    <option value="">{{ $placeholder }}</option>
    @foreach ($items as $value => $title)
        <option @selected($selected == $value) value="{{ $value }}">
            {{ $title }}
        </option>
    @endforeach
</select>
