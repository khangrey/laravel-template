@props(['name', 'id' => null, 'multiple' => false, 'uploadUrl' => null, 'deleteUrl' => null, 'accept' => ''])

<input type="file" id="{{ $id ?: $name }}" name="{{ $name }}" class="filepond" multiple="{{ $multiple }}"
    data-allow-reorder="true">

@push('links')
    <!-- Filepond css -->
    <link rel="stylesheet" href="{{ asset('dashboard/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet"
        href="{{ asset('dashboard/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
@endpush

@push('scripts')
    <!-- filepond js -->
    <script src="{{ asset('dashboard/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('dashboard/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script
        src="{{ asset('dashboard/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('dashboard/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}">
    </script>
    <script
        src="{{ asset('dashboard/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('dashboard/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script>
        var inputMultipleElements = document.querySelectorAll(
            'input.filepond',
        )
        FilePond.registerPlugin(
            FilePondPluginFileValidateSize,
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
        )
        FilePond.setOptions({
            acceptedFileTypes: '{{ $accept }}',
            server: {
                {!! !$uploadUrl ?:
                    'process: { url: "' . $uploadUrl . '", method: "POST", headers: { "X-CSRF-TOKEN": "' . csrf_token() . '" }},' !!}
                {!! !$deleteUrl ?:
                    'revert: { url: "' . $deleteUrl . '", method: "DELETE", headers: { "X-CSRF-TOKEN": "' . csrf_token() . '" } }' !!}
            }
        });

        inputMultipleElements &&
            Array.from(inputMultipleElements).forEach(function(e) {
                FilePond.create(e)
            })
    </script>
@endpush
