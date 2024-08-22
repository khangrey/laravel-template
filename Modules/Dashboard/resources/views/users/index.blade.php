<x-dashboard::app-layout :title="__('dashboard::app.models.Users')">
    <x-dashboard::validation-errors />
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title flex-grow-1 mb-0">
                {{ __('dashboard::app.models.Users') }}
            </h4>
            @can('create-user')
                <div class="flex-shrink-0">
                    <x-dashboard::button :href="route('dashboard.users.create')" class="btn rounded-pill btn-sm btn-secondary">
                        <i class="ri-add-line me-1 align-middle"></i>
                        {{ __('dashboard::app.buttons.Create :model', ['model' => __('dashboard::app.models.User')]) }}
                    </x-dashboard::button>
                </div>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-card">
                <table class="table-striped-columns mb-0 table">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ __('dashboard::app.table.Full name') }}</th>
                            <th scope="col">{{ __('dashboard::app.table.Created at') }}</th>
                            <th scope="col">{{ __('dashboard::app.table.Updated at') }}</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at->format('F d,Y H:i:s') }}</td>
                                <td>{{ $item->updated_at->format('F d,Y H:i:s') }}</td>
                                <td>
                                    <div class="hstack flex-wrap gap-3">
                                        @can('update-user')
                                            <x-dashboard::button :href="route('dashboard.users.edit', $item)"
                                                class="link-primary fs-15 border-0 bg-transparent p-0">
                                                <i class="ri-edit-2-line"></i>
                                            </x-dashboard::button>
                                        @endcan
                                        @can('delete-user')
                                            <x-dashboard::button type="button"
                                                data-bs-target="#user-{{ $item->id }}-delete-form"
                                                data-bs-toggle="modal"
                                                class="link-danger fs-15 border-0 bg-transparent p-0">
                                                <i class="ri-delete-bin-line"></i>
                                            </x-dashboard::button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            <x-dashboard::delete-modal :item="$item" id="user-{{ $item->id }}-delete-form"
                                :action="route('dashboard.users.destroy', $item)" />
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">{{ $users->links() }}</div>
    </div>
</x-dashboard::app-layout>
