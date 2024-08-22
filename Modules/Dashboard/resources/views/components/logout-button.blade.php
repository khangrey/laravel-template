<form method="post" action="{{ $action }}">
    @csrf
    @method($method)

    <button type="submit" {{ $attributes }}>
        {{ $slot->isEmpty() ? __('Log out') : $slot }}
    </button>
</form>
