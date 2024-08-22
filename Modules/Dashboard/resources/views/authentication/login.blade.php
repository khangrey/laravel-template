<x-dashboard::guest-layout :title="__('Authentication')">
    <div class="auth-page-wrapper pt-5">
        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="mt-2 text-center">
                                    <h5 class="text-primary">{{ __('dashboard::app.Welcome back!') }}</h5>
                                    <p class="text-muted">{{ __('dashboard::app.Log in to the control panel') }}</p>
                                </div>
                                <div class="mt-4 p-2">
                                    <form action="{{ route('dashboard.login.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <x-dashboard::input-label id="email" :value="__('dashboard::app.Email')" />
                                            <x-dashboard::text-input name="email" type="email" :placeholder="__('dashboard::app.Enter :attribute', [
                                                'attribute' => __('dashboard::app.Email'),
                                            ])" />
                                            <x-dashboard::input-error :messages="$errors->get('email')" />
                                        </div>

                                        <div class="mb-3">
                                            <x-dashboard::input-label id="password" :value="__('dashboard::app.Password')" />

                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <x-dashboard::text-input type="password" name="password"
                                                    :placeholder="__('dashboard::app.Enter :attribute', [
                                                        'attribute' => __('dashboard::app.Password'),
                                                    ])" class="password-input" />
                                                <x-dashboard::button
                                                    class="btn-link position-absolute text-decoration-none text-muted password-addon end-0 top-0"
                                                    id="password-addon">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </x-dashboard::button>

                                                <x-dashboard::input-error :messages="$errors->get('password')" />
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <x-dashboard::button type="submit" class="btn-success w-100">
                                                {{ __('dashboard::app.Login') }}
                                            </x-dashboard::button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <x-dashboard::footer />
    </div>
    <!-- end auth-page-wrapper -->

    @push('scripts')
        <!-- password-addon init -->
        <script src="{{ asset('dashboard/js/pages/password-addon.init.js') }}"></script>
    @endpush
</x-dashboard::guest-layout>
