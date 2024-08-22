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
        <x-dashboard::input-label :id="$permission ? 'permission-' . $permission->id . '-name' : 'permission-name'" :value="__('dashboard::app.inputs.Name :attribute', ['attribute' => __('dashboard::app.models.Permission')])" required />
        @if ($permission)
            <x-dashboard::text-input name="name" :placeholder="__('dashboard::app.inputs.Enter :attribute', [
                'attribute' => __('dashboard::app.inputs.Name :attribute', [
                    'attribute' => __('dashboard::app.models.Permission'),
                ]),
            ])" :value="$permission->name" />
        @else
            <x-dashboard::text-input name="name" :placeholder="__('dashboard::app.inputs.Enter :attribute', [
                'attribute' => __('dashboard::app.inputs.Name :attribute', [
                    'attribute' => __('dashboard::app.models.Permission'),
                ]),
            ])" />
        @endif
        <x-dashboard::input-error :messages="$errors->get('name')" />
    </div>
    <div class="mb-3">
        <x-dashboard::input-label :id="$permission ? 'permission-' . $permission->id . '-guard-name' : 'permission-guard-name'" :value="__('dashboard::app.inputs.Name :attribute', ['attribute' => __('dashboard::app.models.Guard')])" />
        @if ($permission)
            <x-dashboard::text-input name="guard_name" :placeholder="__('dashboard::app.inputs.Enter :attribute', [
                'attribute' => __('dashboard::app.inputs.Name :attribute', [
                    'attribute' => __('dashboard::app.models.Guard'),
                ]),
            ])" :value="$permission->guard_name" />
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
