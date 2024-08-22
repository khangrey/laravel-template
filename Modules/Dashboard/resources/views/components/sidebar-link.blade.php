@props(['collapseId' => null, 'collapse' => null])

<a {{ $attributes->merge(['class' => 'nav-link']) }}
    @if ($collapseId) href="#{{ $collapseId }}" data-bs-toggle="collapse" role="button" aria-controls="{{ $collapseId }}" @endif
    aria-expanded="false">
    {{ $slot }}
</a>
@if ($collapse)
    <div class="collapse menu-dropdown" @if ($collapseId) id="{{ $collapseId }}" @endif>
        {{ $collapse }}
    </div>
@endif
