@props(['messages'])

@if ($messages)
    <dl {{ $attributes->merge(['class' => 'invalid-feedback']) }}>
        @foreach ($messages as $message)
            <dd>{{ $message }}</dd>
        @endforeach
    </dl>
@endif
