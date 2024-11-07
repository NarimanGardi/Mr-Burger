<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>@yield('title')</title>


    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/boxicons.css') }}"/>
    <link rel="stylesheet" href="{{ asset(Cache::has('dark-theme') ? 'backend/assets/css/dark.css' : 'backend/assets/css/light.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/page-auth.css') }}" />
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
</head>

<body>
    
    @yield('content')

    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/scripts.js') }}"></script>
</body>

</html>
