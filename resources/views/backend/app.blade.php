<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="{{ asset('backend/assets/icons/css/all.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/select2/select2.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset(Cache::has('dark-theme') ? 'backend/assets/css/dark.css' : 'backend/assets/css/light.css') }}">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/logo.png') }}" />

    <link rel="stylesheet" href="{{ asset('backend/assets/css/paper.css') }}">
</head>

<body class="{{ Cache::has('light-theme') ? '' : 'sidebar-dark' }} sidebar-folded rtl">

    <div class="main-wrapper">

        <!-- sidebar -->
        @include('backend.body.sidebar')
        <!-- end sidebar -->

        <div class="page-wrapper">

            <!-- navbar -->
            @include('backend.body.navbar')
            <!-- end navbar -->

            @yield('content')

            <!-- footer-->
            @include('backend.body.footer')
            <!-- end footer -->

        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('backend/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/select2/select2.min.js') }}"></script>

    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script
        src="{{ asset(Cache::has('dark-theme') ? 'backend/assets/js/dashboard-dark.js' : 'backend/assets/js/dashboard-light.js') }}">
    </script>
    <script src="{{ asset('backend/assets/js/datepicker.js') }}"></script>
    <!-- End custom js for this page -->
    @include('sweetalert::alert')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.29/sweetalert2.all.js"
        integrity="sha512-W5SwJPyOiXXyfvtnUlX/T1s6PLgKSuUcSD++cdbY0zOPi4/Ymu4dCzBHnlH5OPxKPRp6XyBp+3jvmxuMyCsoaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('scripts')
    <script src="{{ asset('Backend/assets/js/scripts.js') }}"></script>
    @livewireScripts
</body>

</html>
