@extends('admin.template.lte.index')

@section('content')
    <h4 class="page-header">Selamat Datang,  {{  Auth::user()->Usr_Name }}</h4>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
@stop
