<x-dashboard-layout :title="__('Profile Settings')">
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
                        <x-dashboard.validation-errors />

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label">{{ __('app.Full name') }}</label>
                                    <input type="text" class="form-control" id="full_name" name="name"
                                        placeholder="Enter your firstname" value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="emailInput" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailInput" name="email"
                                        placeholder="Enter your email" value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div>
                                    <label for="newpasswordInput" class="form-label">
                                        {{ __('Password') }}
                                    </label>
                                    <input type="password" name="password" class="form-control" id="newpasswordInput"
                                        placeholder="Enter new password">

                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div>
                                    <label for="confirmpasswordInput" class="form-label">{{ __('Confirm') }}</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="confirmpasswordInput" placeholder="Confirm password">
                                </div>
                            </div>
                            <!--end col-->
                            <div class='col-lg-12'>
                                <div class="text-muted text-warning">
                                    {{ __("If you don't want to change your password, you can leave these fields empty.") }}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack justify-content-end gap-2">
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                    <a href="{{ route('dashboard.welcome') }}" class="btn btn-soft-danger">
                                        {{ __('Go Home') }}
                                    </a>
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
</x-dashboard-layout>
