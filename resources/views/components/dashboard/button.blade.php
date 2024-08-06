@props(['href' => null, 'type' => 'button'])

@if (is_null($href))
    <button type="{{ $type }}" {!! $attributes->merge(['class' => 'btn ']) !!}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {!! $attributes->merge(['class' => 'btn ']) !!}>
        {{ $slot }}
    </a>
@endif
