<x-dashboard::app-layout :title="__('dashboard::app.models.Roles')">
    <x-dashboard::validation-errors />
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title flex-grow-1 mb-0">
                {{ __('dashboard::app.models.Roles') }}
            </h4>
            <div class="flex-shrink-0">
                <x-dashboard::button type="button" data-bs-target="#create-role-modal" data-bs-toggle="modal"
                    class="btn btn-sm btn-secondary">
                    <i class="ri-add-line me-1 align-middle"></i>
                    {{ __('dashboard::app.buttons.Create :model', ['model' => __('dashboard::app.models.Role')]) }}
                </x-dashboard::button>
                <x-dashboard::modal class="modal-lg" id="create-role-modal" :title="__('dashboard::app.buttons.Create :model', ['model' => __('dashboard::app.models.Role')])">
                    <x-dashboard::roles.edit-form />
                </x-dashboard::modal>
            </div>
        </div>
        <div class="card-body">
            <div class="table-card">
                <table class="table-striped-columns mb-0 table">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ __('dashboard::app.table.Name') }}</th>
                            <th scope="col">{{ __('dashboard::app.table.Created at') }}</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at->format('F d,Y') }}</td>
                                <td>
                                    <div class="hstack flex-wrap gap-3">
                                        <x-dashboard::button type="button"
                                            data-bs-target="#role-{{ $item->id }}-edit-modal" data-bs-toggle="modal"
                                            class="link-primary fs-15 border-0 bg-transparent p-0">
                                            <i class="ri-edit-2-line"></i>
                                        </x-dashboard::button>
                                        <x-dashboard::button type="button"
                                            data-bs-target="#role-{{ $item->id }}-permissions-edit-form"
                                            data-bs-toggle="modal"
                                            class="link-primary fs-15 border-0 bg-transparent p-0">
                                            <i class="ri-shield-user-line"></i>
                                        </x-dashboard::button>
                                        <x-dashboard::button type="button"
                                            data-bs-target="#role-{{ $item->id }}-delete-form"
                                            data-bs-toggle="modal"
                                            class="link-danger fs-15 border-0 bg-transparent p-0">
                                            <i class="ri-delete-bin-line"></i>
                                        </x-dashboard::button>
                                    </div>
                                </td>
                            </tr>
                            <x-dashboard::delete-modal :item="$item" id="role-{{ $item->id }}-delete-form"
                                :action="route('dashboard.roles.destroy', $item)" />
                            <x-dashboard::modal class="modal-lg" id="role-{{ $item->id }}-edit-modal"
                                :title="__('dashboard::app.buttons.Update :model', [
                                    'model' => __('dashboard::app.models.Role'),
                                ]) .
                                    ' ' .
                                    $item->name">
                                <x-dashboard::roles.edit-form :role="$item" />
                            </x-dashboard::modal>
                            <x-dashboard::modal id="role-{{ $item->id }}-permissions-edit-form" class="modal-lg"
                                :title="__('dashboard::app.buttons.Update :model', [
                                    'model' => __('dashboard::app.models.Role permission'),
                                ]) .
                                    ' ' .
                                    $item->name">
                                <x-dashboard::roles.edit-permissions-form :permissions="$permissions" :role="$item" />
                            </x-dashboard::modal>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">{{ $roles->links() }}</div>
    </div>
    @push('scripts')
        <script src="{{ asset('dashboard/js/pages/profile-setting.init.js') }}"></script>
    @endpush
</x-dashboard::app-layout>
