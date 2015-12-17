@if(Session::has('info'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info alert-dismissable">
            <i class="fa fa-info"></i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('info') }}
        </div>
    </div>
</div>
@endif