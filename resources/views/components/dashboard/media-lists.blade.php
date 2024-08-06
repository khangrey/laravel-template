@props(['item', 'collection', 'canDelete' => false])

@if ($item->hasMedia($collection))
    <div class="list-group list-group-fill-success mt-3">
        @foreach ($item->getMedia($collection) as $file)
            <div class="position-relative">
                <a href="{{ $file->getUrl() }}" class="list-group-item list-group-item-action position-relative"><i
                        class="ri-download-2-fill align-middle me-2"></i>{{ $file->file_name }}
                </a>
                @if ($canDelete)
                    <form action="{{ route('dashboard.media.delete', $file) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="right-0 bg-transparent border-0 p-0 link-danger fs-15"
                            style="right: 16px; z-index: 100; top: 12px; position: absolute">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endif
