@props(['headerSlot' => null, 'footerSlot' => null, 'headerClasses' => '', 'footerClasses' => ''])

<div class="card">
    @if ($headerSlot)
        <div @class(['card-header', $headerClasses])>
            {{ $headerSlot }}
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
    @if ($footerSlot)
        <div @class(['card-footer', $footerClasses])>
            {{ $footerSlot }}
        </div>
    @endif
</div>
