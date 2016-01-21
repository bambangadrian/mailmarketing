@if (session('message'))
    @if(session('status'))
        <div class="alert alert-message alert-{{ session('status') }}">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div style="margin-right: 25px;">
                <i class="icon fa {{ BootstrapHelper::getIconStatus(session('status')) }}"></i> {{ session('message') }}
            </div>
        </div>
    @endif
@endif

