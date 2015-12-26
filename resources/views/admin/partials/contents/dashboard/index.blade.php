@extends('admin.template.lte.layout.basic')

@section('content')
    <h4 class="page-header">Selamat Datang,  {{  Auth::user()->Usr_Name }}</h4>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-support"></i> Dashboard</a></li>
    </ol>
@stop
