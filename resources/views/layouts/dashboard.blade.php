<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ $page_title ?? '' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/b-2.4.2/b-html5-2.4.2/datatables.min.css" rel="stylesheet">

    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{ asset('asset/adminlte/css/adminlte.min.css') }}"> --}}

    @vite(['resources/adminlte/css/adminlte.css'])
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('partials.dashboard.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('partials.dashboard.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('aku_isi_mas')
        </div>

        <!-- Main Footer -->
        @include('partials.dashboard.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    {{-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <!-- AdminLTE App -->
    {{-- <script src="dist/js/adminlte.min.js"></script> --}}

    <script src="https://kit.fontawesome.com/5f4be2ccfb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/block-ui@2.70.1/jquery.blockUI.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/b-2.4.2/b-html5-2.4.2/datatables.min.js"></script>
    <script src="{{ asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/js/adminlte.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('skrip_jawa')
</body>

</html>
