@props(['role' => null])

@php
    $action = is_null($role) ? route('dashboard.roles.store') : route('dashboard.roles.update', $role);
@endphp

<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    @if (!is_null($role))
        @method('PUT')
    @endif
    @csrf
    <div class="mb-3">
        <x-dashboard.input-label :id="$role ? 'role-' . $role->id . '-name' : 'role-name'" value="Название роли" />
        @if ($role)
            <x-dashboard.text-input name="name" placeholder="Название роли" :value="$role->code" />
        @else
            <x-dashboard.text-input name="name" placeholder="Название роли" />
        @endif
        <x-dashboard.input-error column="name" />
    </div>
    <div class="mb-3">
        <x-dashboard.input-label :id="$role ? 'role-' . $role->id . '-guard-name' : 'role-guard-name'" value="Код в API" />
        @if ($role)
            <x-dashboard.text-input name="guard_name" placeholder="Название защиты" :value="$role->guard_name" />
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
