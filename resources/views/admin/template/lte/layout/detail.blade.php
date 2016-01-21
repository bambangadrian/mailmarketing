@extends('admin.template.lte.layout.basic')

@section('content-title')
    <h3 class="box-title">
        <i class="fa fa-file-text"></i>
        {{ isset($contentTitle) ? $contentTitle : 'Detail Data' }}
    </h3>
@stop

@section('content-page')
    @yield('data-form')
    @include('admin.template.lte.error')
@stop

@section('content-status')
    <div class="text-muted small">
        <i style="color:red;">* Required field, you must fill this item.</i>
        @yield('content-status-item')
    </div>
@stop
