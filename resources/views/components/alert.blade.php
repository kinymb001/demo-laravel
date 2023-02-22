@if (session()->has('alert_primary'))
    <div class="mt-3 alert alert-primary" role="alert">
        {{ session('alert_primary') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session()->has('alert_danger'))
    <div class="mt-3 alert alert-danger" role="alert">
        {{ session('alert_danger') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session()->has('alert_success'))
    <div class="mt-3 alert alert-success" role="alert" id="success">
        {{ session('alert_success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
