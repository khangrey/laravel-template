<x-guest-dashboard-layout :title="__('Authentication')">
    <div class="auth-page-wrapper pt-5">
        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="mt-2 text-center">
                                    <h5 class="text-primary">{{ __('Welcome back!') }}</h5>
                                    <p class="text-muted">{{ __('Log in to the control panel') }}</p>
                                </div>
                                <div class="mt-4 p-2">
                                    <x-dashboard.validation-errors />
                                    <form action="{{ route('dashboard.login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control" id="email"
                                                placeholder="{{ __('Enter :attribute', ['attribute' => 'Email']) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">{{ __('Password') }}</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control password-input pe-5"
                                                    placeholder="{{ __('Enter :attribute', ['attribute' => __('Password')]) }}"
                                                    id="password-input" name="password">
                                                <button
                                                    class="btn btn-link position-absolute text-decoration-none text-muted password-addon end-0 top-0"
                                                    type="button" id="password-addon">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">
                                                {{ __('Login') }}
                                            </button>
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

        <x-dashboard.footer />
    </div>
    <!-- end auth-page-wrapper -->

    @push('scripts')
        <!-- particles js -->
        <script src="{{ asset('dashboard/libs/particles.js/particles.js') }}"></script>
        <!-- particles app js -->
        <script src="{{ asset('dashboard/js/pages/particles.app.js') }}"></script>
        <!-- password-addon init -->
        <script src="{{ asset('dashboard/js/pages/password-addon.init.js') }}"></script>
    @endpush
</x-guest-dashboard-layout>
