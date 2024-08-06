@props(['messages'])

@if ($messages)
    <ul>
        @foreach ($messages as $message)
            <li {{ $attributes->merge(['class' => 'invalid-feedback']) }}>{{ $message }}</li>
        @endforeach
    </ul>
@endif
