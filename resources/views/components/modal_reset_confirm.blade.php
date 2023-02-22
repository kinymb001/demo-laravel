<div class="modal fade" id="modal_reset_confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.reset_this_table') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{$url}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ __('messages.password') }}</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        {{ __('messages.submit') }}
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{ __('messages.close') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
