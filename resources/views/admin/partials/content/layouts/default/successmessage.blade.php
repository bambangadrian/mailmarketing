@if(Session::has('success'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissable">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('success') }}
        </div>
    </div>
</div>
@endif