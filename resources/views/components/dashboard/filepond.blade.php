@props(['name', 'id' => null, 'multiple' => false])

<input type="file" id="{{ $id ?: $name }}" name="{{ $name }}" class="filepond" multiple="{{ $multiple }}"
    data-allow-reorder="true">
