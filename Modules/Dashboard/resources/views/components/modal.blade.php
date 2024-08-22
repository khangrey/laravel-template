@props(['id', 'title' => null, 'footer' => null])

<!-- removeNotificationModal -->
<div id="{{ $id }}" tabindex="-1" aria-hidden="true" {{ $attributes->merge(['class' => 'modal fade zoomIn']) }}>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                @if ($title)
                    <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="{{ $id }}"></button>
            </div>
            <div class="modal-body">{{ $slot }}</div>
            @if ($footer)
                <div class="modal-footer">{{ $footer }}</div>
            @endif
        </div>
    </div>
</div>
