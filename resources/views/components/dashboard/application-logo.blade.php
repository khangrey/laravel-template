@props(['sm_img' => null, 'lg_img' => null])

<a href="/" {{ $attributes->merge(['class' => 'logo']) }}>
    <span class="logo-sm">
        @if ($sm_img)
            <img src="{{ $sm_img }}" alt="" height="22">
        @else
            <span class="fw-medium user-name-text">{{ str(config('app.name'))->limit(1) }}</span>
        @endif
    </span>
    <span class="logo-lg">
        @if ($lg_img)
            <img src="{{ $lg_img }}" alt="" height="17">
        @else
            <span class="fw-medium user-name-text">{{ config('app.name') }}</span>
        @endif
    </span>
</a>
