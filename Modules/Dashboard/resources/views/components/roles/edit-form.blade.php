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
        <x-dashboard::input-label :id="$role ? 'role-' . $role->id . '-name' : 'role-name'" :value="__('dashboard::app.inputs.Name :attribute', ['attribute' => __('dashboard::app.models.Role')])" />
        @if ($role)
            <x-dashboard::text-input name="name" :placeholder="__('dashboard::app.inputs.Enter :attribute', [
                'attribute' => __('dashboard::app.inputs.Name :attribute', [
                    'attribute' => __('dashboard::app.models.Role'),
                ]),
            ])" :value="$role->name" />
        @else
            <x-dashboard::text-input name="name" :placeholder="__('dashboard::app.inputs.Enter :attribute', [
                'attribute' => __('dashboard::app.inputs.Name :attribute', [
                    'attribute' => __('dashboard::app.models.Role'),
                ]),
            ])" />
        @endif
        <x-dashboard::input-error :messages="$errors->get('name')" />
    </div>
    <div class="mb-3">
        <x-dashboard::input-label :id="$role ? 'role-' . $role->id . '-guard-name' : 'role-guard-name'" :value="__('dashboard::app.inputs.Name :attribute', ['attribute' => __('dashboard::app.models.Guard')])" />
        @if ($role)
            <x-dashboard::text-input name="guard_name" :placeholder="__('dashboard::app.inputs.Enter :attribute', [
                'attribute' => __('dashboard::app.inputs.Name :attribute', [
                    'attribute' => __('dashboard::app.models.Guard'),
                ]),
            ])" :value="$role->guard_name" />
        @else
            <x-dashboard::text-input name="guard_name" :placeholder="__('dashboard::app.inputs.Enter :attribute', [
                'attribute' => __('dashboard::app.inputs.Name :attribute', [
                    'attribute' => __('dashboard::app.models.Guard'),
                ]),
            ])" />
        @endif
        <x-dashboard::input-error :messages="$errors->get('guard_name')" />
    </div>
    <div class="d-flex justify-content-end">
        <x-dashboard::button type="submit" class="btn-success">
            {{ __('dashboard::app.buttons.Send') }}
        </x-dashboard::button>
    </div>
</form>
