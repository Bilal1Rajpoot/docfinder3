<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Docfinder</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('ad/assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('ad/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('ad/assets/css/font-awesome.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('ad/assets/css/feathericon.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('ad/assets/css/style.css') }}">

    <!--[if lt IE 9]>
    <script src="{{ asset('ad/assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('ad/assets/js/respond.min.js') }}"></script>
    <![endif]-->
    @livewireStyles

    @yield('custom-style')
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    @include('admin.common.header')

    @include('admin.common.slidebar')

    @yield('content')

</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{ asset('ad/assets/js/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('ad/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('ad/assets/js/bootstrap.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('ad/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('ad/assets/js/script.js') }}"></script>
@livewireScripts

@yield('custom-script')
</body>

</html>
