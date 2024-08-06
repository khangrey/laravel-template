@props(['name', 'id' => null, 'multiple' => false])

<div class="dropzone">
    <div class="fallback">
        <input id="{{ $id ?: $name }}" name="{{ $name }}" type="file"
            @if ($multiple) multiple="multiple" @endif>
    </div>
    <div class="dz-message needsclick">
        <div class="mb-3">
            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
        </div>

        <h4>Drop files here or click to upload.</h4>
    </div>
</div>

<ul class="list-unstyled mb-0" id="dropzone-preview">
    <li class="mt-2" id="dropzone-preview-list">
        <!-- This is used as the file preview template -->
        <div class="rounded border">
            <div class="d-flex p-2">
                <div class="me-3 flex-shrink-0">
                    <div class="avatar-sm bg-light rounded">
                        <img data-dz-thumbnail class="img-fluid d-block rounded"
                            src="{{ asset('dashboard/images/new-document.png') }}" alt="Dropzone-Image" />
                    </div>
                </div>
                <div class="flex-grow-1">
                    <div class="pt-1">
                        <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                        <p class="fs-13 text-muted mb-0" data-dz-size></p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                </div>
                <div class="ms-3 flex-shrink-0">
                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </li>
</ul>
<!-- end dropzon-preview -->
