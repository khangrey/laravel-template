@props(['title' => ''])

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? '' }} | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="HQIT" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    @stack('links')

    <!-- Layout config Js -->
    <script src="{{ asset('velzon/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('velzon/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('velzon/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('velzon/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('velzon/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>

    {{ $slot }}

    <!-- JAVASCRIPT -->
    <script src="{{ asset('velzon/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('velzon/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('velzon/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('velzon/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('velzon/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('velzon/js/plugins.js') }}"></script>

    @stack('scripts')

    <!-- App js -->
    <script src="{{ asset('velzon/js/app.js') }}"></script>
</body>

</html>
