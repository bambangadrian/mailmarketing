@extends('admin.template.lte.index')
@section('segment-title')
    404
@stop
@section('segment-desc')
    Requested page was not found
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-exclamation-triangle"></i> Error Page</li>
        <li class="active">404</li>
    </ol>
@stop


@section('content')
    <div class="error-page">
        <h2 class="headline text-red"> 404</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i>&nbsp; Page Not Found !!!</h3>
            <p>
                We can not found your page request, please back to the previous page
                <a href="{{ url('/admin/dashboard') }}" class="alert-link"> (dashboard) </a>,
                or you can contact our staff/webmaster on +62(022) XXXYZ.
            </p>
        </div>
    </div>
@stop