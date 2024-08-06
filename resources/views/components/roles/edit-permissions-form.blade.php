@props(['role', 'permissions'])

<form action="{{ route('dashboard.roles.update-permissions', $role) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        @foreach ($permissions as $permission)
            <div class="col-md-3">
                <div class="form-check form-check-right mb-2">
                    <input class="form-check-input" type="checkbox" value="{{ $permission->name }}" name="permissions[]"
                        id="role-{{ $role->id }}-permission-{{ $permission->id }}" @checked($role->hasPermissionTo($permission->name))>
                    <label class="form-check-label" for="role-{{ $role->id }}-permission-{{ $permission->id }}">
                        {{ $permission->name }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end">
        <x-dashboard.button type="submit" class="btn btn-success">
            Отправить
        </x-dashboard.button>
    </div>
</form>
