<x-dashboard::app-layout :title="__('dashboard::app.Profile')">
    <form method="post" action="{{ route('dashboard.profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-xxl-3">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                                <img src="{{ auth()->user()->avatar_url }}"
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
                            <h5 class="fs-17 mb-1">{{ auth()->user()->name }}</h5>
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
                                    <x-dashboard::input-label id="full_name" :value="__('dashboard::app.table.Full name')" />
                                    <x-dashboard::text-input name="name" id="full_name" :value="auth()->user()->name"
                                        :placeholder="__('dashboard::app.inputs.Enter :attribute', [
                                            'attribute' => __('dashboard::app.table.Full name'),
                                        ])" />
                                    <x-dashboard::input-error :messages="$errors->get('name')" />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <x-dashboard::input-label id="email" :value="__('dashboard::app.inputs.Email')" />
                                    <x-dashboard::text-input type="email" name="email" :value="auth()->user()->email"
                                        :placeholder="__('dashboard::app.inputs.Enter :attribute', [
                                            'attribute' => __('dashboard::app.inputs.Email'),
                                        ])" />
                                    <x-dashboard::input-error :messages="$errors->get('email')" />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div>
                                    <x-dashboard::input-label id="password" :value="__('dashboard::app.inputs.Password')" />
                                    <x-dashboard::text-input type="password" name="password" :placeholder="__('dashboard::app.inputs.Enter :attribute', [
                                        'attribute' => __('dashboard::app.inputs.Password'),
                                    ])" />
                                    <x-dashboard::input-error :messages="$errors->get('password')" />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div>
                                    <x-dashboard::input-label id="password_confirmation" :value="__('dashboard::app.inputs.Confirm password')" />
                                    <x-dashboard::text-input type="password" name="password_confirmation"
                                        :placeholder="__('dashboard::app.inputs.Enter :attribute', [
                                            'attribute' => __('dashboard::app.inputs.Password'),
                                        ])" />
                                </div>
                            </div>
                            <!--end col-->
                            <div class='col-lg-12'>
                                <div class="text-muted text-warning">
                                    {{ __('dashboard::app.inputs.password_leave_blank') }}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack justify-content-end gap-2">
                                    <x-dashboard::button type="submit" class="btn btn-primary">
                                        {{ __('dashboard::app.buttons.Update') }}
                                    </x-dashboard::button>
                                    <x-dashboard::button href="{{ route('dashboard.welcome') }}"
                                        class="btn btn-soft-danger">
                                        {{ __('dashboard::app.buttons.Go home') }}
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
