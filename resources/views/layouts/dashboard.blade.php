@props(['title' => ''])

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-layout-mode="light" data-layout-width="fluid"
    data-layout-position="fixed" data-layout-style="default">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? '' }} | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="HQIT" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    @stack('links')

    <!-- Layout config Js -->
    <script src="{{ asset('dashboard/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('dashboard/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('dashboard/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('dashboard/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>

    <div id="layout-wrapper">
        <x-dashboard.topbar />
        <x-dashboard.sidebar />

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
            <x-dashboard.footer />
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('dashboard/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('dashboard/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('dashboard/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins.js') }}"></script>

    @stack('scripts')

    <!-- App js -->
    <script src="{{ asset('dashboard/js/app.js') }}"></script>
</body>

</html>
