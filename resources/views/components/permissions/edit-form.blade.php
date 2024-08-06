@props(['permission' => null])

@php
    $action = is_null($permission)
        ? route('dashboard.permissions.store')
        : route('dashboard.permissions.update', $permission);
@endphp

<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    @if (!is_null($permission))
        @method('PUT')
    @endif
    @csrf
    <div class="mb-3">
        <x-dashboard.input-label :id="$permission ? 'permission-' . $permission->id . '-name' : 'permission-name'" value="Название разрешения" required />
        @if ($permission)
            <x-dashboard.text-input name="name" placeholder="Название разрешения" :value="$permission->name" />
        @else
            <x-dashboard.text-input name="name" placeholder="Название разрешения" />
        @endif
        <x-dashboard.input-error column="name" />
    </div>
    <div class="mb-3">
        <x-dashboard.input-label :id="$permission ? 'permission-' . $permission->id . '-guard-name' : 'permission-guard-name'" value="Название защиты" />
        @if ($permission)
            <x-dashboard.text-input name="guard_name" placeholder="Название защиты" :value="$permission->guard_name" />
        @else
            <x-dashboard.text-input name="guard_name" placeholder="Название защиты" />
        @endif
        <x-dashboard.input-error column="guard_name" />
    </div>
    <div class="d-flex justify-content-end">
        <x-dashboard.button type="submit" class="btn-success">
            Отправить
        </x-dashboard.button>
    </div>
</form>
