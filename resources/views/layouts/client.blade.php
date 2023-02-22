<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @yield('title')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('client/css/app.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>

<body class="sidebar-mini">
    <div class="wrapper">
        @include('client.layouts.header')

        @yield('body')

        @include('client.layouts.footer')
    </div>
    @livewireScripts
    <script preload type="text/javascript" src="{{ asset('client/js/index.js') }}"></script>
    <script preload type="text/javascript" src="{{ asset('client/js/jquery-3.6.0.min.js') }}"></script>
</body>

</html>
