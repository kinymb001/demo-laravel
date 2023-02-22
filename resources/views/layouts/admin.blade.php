<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @yield('title')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @vite(['resources/js/app.js'])
    @vite('resources/sass/app.scss')
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="sidebar-mini">
    <div class="wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.siderbar')

        @yield('body')

        @include('admin.layouts.footer')
    </div>
    @livewireScripts
    {{-- @vite('resources/js/app.js') --}}
</body>

</html>
