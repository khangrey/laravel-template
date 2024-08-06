FilePond.registerPlugin(
    FilePondPluginFileEncode,
    FilePondPluginFileValidateSize,
    FilePondPluginImageExifOrientation,
    FilePondPluginImagePreview
);

let inputMultipleElements = document.querySelectorAll("input.filepond");
inputMultipleElements &&
    Array.from(inputMultipleElements).forEach(function (e) {
        FilePond.create(e);
    });
