@if(Session::has('alert'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('alert') }}
        </div>
    </div>
</div>
@endif