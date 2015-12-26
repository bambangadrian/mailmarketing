@extends('admin.template.lte.layout.basic')

@section('content-title')
    <h3 class="box-title">{{ isset($contentTitle) ? $contentTitle : 'Record Detail Fieldset' }}</h3>
@stop

@section('content-page')
    <form role="form">
        @yield('data-form')
    </form>
@stop

@section('content-status')
    <div class="text-muted small">
        <i style="color:red;">* Required Field </i>
    </div>
@stop