@extends('admin.template.lte.index')
@section('segment-title','501')
@section('segment-desc', 'Halaman Tidak Diizinkan')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-exclamation-triangle"></i> Restricted</li>
        <li class="active">501</li>
    </ol>
@stop
@section('content')
    <div class="error-page">
        <h2 class="headline text-red"> 501</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> You access restricted page</h3>
            <p>
                You're not allowed to access this page. If you feel this is an error or system fault
                please call our staff/webmaster on +62(022) XXXYZ.
            </p>
        </div>
    </div>
@stop