<x-dashboard::app-layout :title="__('dashboard::app.buttons.Create :model', ['model' => __('dashboard::app.models.User')])">
    <form method="post" action="{{ route('dashboard.users.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xxl-3">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                                <img src="https://ui-avatars.com/api/?name=User&color=7F9CF5&background=EBF4FF"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                    alt="user-profile-image">
                                <div class="avatar-xs rounded-circle profile-photo-edit p-0">
                                    <input id="profile-img-file-input" name="profile_photo_path" type="file"
                                        class="profile-img-file-input">
                                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="ri-camera-fill"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-xxl-9">
                <div class="card">
                    <div class="card-body p-4">
                        <x-dashboard::validation-errors />

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <x-dashboard::input-label id="name" :value="__('dashboard::app.table.Full name')" />
                                    <x-dashboard::text-input name="name" :placeholder="__('dashboard::app.table.Full name')" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <x-dashboard::input-label type="email" id="email" :value="__('dashboard::app.inputs.Email')" />
                                    <x-dashboard::text-input name="email" :placeholder="__('dashboard::app.inputs.Email')" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <x-dashboard::input-label id="password" :value="__('dashboard::app.inputs.Password')" />
                                    <x-dashboard::text-input type="password" name="password" :placeholder="__('dashboard::app.inputs.Password')" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <x-dashboard::input-label id="password_confirmation" :value="__('dashboard::app.inputs.Confirm password')" />
                                    <x-dashboard::text-input type="password" name="password_confirmation"
                                        :placeholder="__('dashboard::app.inputs.Confirm password')" />
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="hstack justify-content-end gap-2">
                                    <x-dashboard::button type="submit" class="btn btn-primary">
                                        {{ __('dashboard::app.buttons.Create') }}
                                    </x-dashboard::button>
                                    <x-dashboard::button href="{{ route('dashboard.users.index') }}"
                                        class="btn btn-soft-danger">
                                        {{ __('dashboard::app.buttons.Go back') }}
                                    </x-dashboard::button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </form>
    <!--end row-->

    @push('scripts')
        <script src="{{ asset('dashboard/js/pages/profile-setting.init.js') }}"></script>
    @endpush
</x-dashboard::app-layout>
