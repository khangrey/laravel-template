@props(['name', 'id' => $name, 'value' => old($name), 'disabled' => false])

<textarea @disabled($disabled) {!! $attributes !!} name="{{ $name }}" id="{{ $id }}">{!! $value !!}</textarea>
