@props(['item', 'collection', 'canDelete' => false])

@if ($item->hasMedia($collection))
    <div class="list-group list-group-fill-success mt-3">
        @foreach ($item->getMedia($collection) as $file)
            <div class="position-relative">
                <a href="{{ $file->getUrl() }}" class="list-group-item list-group-item-action position-relative"><i
                        class="ri-download-2-fill me-2 align-middle"></i>{{ $file->file_name }}
                </a>
                @if ($canDelete)
                    <a href="{{ route('media::delete', $file) }}"
                        class="link-danger fs-15 right-0 border-0 bg-transparent p-0"
                        style="right: 16px; z-index: 100; top: 12px; position: absolute">
                        <i class="ri-delete-bin-line"></i>
                    </a>
                @endif
            </div>
        @endforeach
    </div>
@endif
