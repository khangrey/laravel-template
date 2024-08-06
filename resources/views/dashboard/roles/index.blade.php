<x-dashboard-layout title="Роли">
    <x-dashboard.validation-errors />
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title flex-grow-1 mb-0">Роли</h4>
            <div class="flex-shrink-0">
                <x-dashboard.button type="button" data-bs-target="#create-role-modal" data-bs-toggle="modal"
                    class="btn btn-sm btn-secondary">
                    <i class="ri-add-line me-1 align-middle"></i>
                    Создать роль
                </x-dashboard.button>
                <x-dashboard.modal class="modal-lg" id="create-role-modal" title="Создать роль">
                    <x-roles.edit-form />
                </x-dashboard.modal>
            </div>
        </div>
        <div class="card-body">
            <div class="table-card">
                <table class="table-striped-columns mb-0 table">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Название</th>
                            <th scope="col">Создано</th>
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
                                        <x-dashboard.button type="button"
                                            data-bs-target="#role-{{ $item->id }}-edit-modal" data-bs-toggle="modal"
                                            class="link-primary fs-15 border-0 bg-transparent p-0">
                                            <i class="ri-edit-2-line"></i>
                                        </x-dashboard.button>
                                        <x-dashboard.button type="button"
                                            data-bs-target="#role-{{ $item->id }}-permissions-edit-form"
                                            data-bs-toggle="modal"
                                            class="link-primary fs-15 border-0 bg-transparent p-0">
                                            <i class="ri-shield-user-line"></i>
                                        </x-dashboard.button>
                                        <x-dashboard.button type="button"
                                            data-bs-target="#role-{{ $item->id }}-delete-form"
                                            data-bs-toggle="modal"
                                            class="link-danger fs-15 border-0 bg-transparent p-0">
                                            <i class="ri-delete-bin-line"></i>
                                        </x-dashboard.button>
                                    </div>
                                </td>
                            </tr>
                            <x-dashboard.delete-modal :item="$item" id="role-{{ $item->id }}-delete-form"
                                :action="route('dashboard.roles.destroy', $item)" />
                            <x-dashboard.modal class="modal-lg" id="role-{{ $item->id }}-edit-modal"
                                :title="'Изменить страну ' . $item->name">
                                <x-roles.edit-form :role="$item" />
                            </x-dashboard.modal>
                            <x-dashboard.modal id="role-{{ $item->id }}-permissions-edit-form" class="modal-lg"
                                :title="'Изменить разрешения у роли ' . $item->name">
                                <x-roles.edit-permissions-form :permissions="$permissions" :role="$item" />
                            </x-dashboard.modal>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">{{ $roles->links() }}</div>
    </div>
    @push('scripts')
        <script src="{{ asset('velzon/js/pages/profile-setting.init.js') }}"></script>
    @endpush
</x-dashboard-layout>
