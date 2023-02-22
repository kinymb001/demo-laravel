<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> {{ request()->header('X-Forwarded-For') ?: request()->ip() }}
    </div>
    <strong>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

@if (session('message'))
    <div class="d-none alert alert-message">{{ session('message') }}</div>
@endif

@if (session('success'))
    <div class="d-none alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="d-none alert alert-error">{{ session('error') }}</div>
@endif

@if (session('warning'))
    <div class="d-none alert alert-warning">{{ session('warning') }}</div>
@endif

@if (session('delete-success'))
    <div class="d-none alert alert-delete-success">{{ session('delete-success') }}</div>
@endif

@if (session('delete-fail'))
    <div class="d-none alert alert-delete-fail">{{ session('delete-fail') }}</div>
@endif
