@extends('admin.template.lte.layout.basic')

@section('content-title')
    <h3 class="box-title">
        <i class="fa fa-file"></i>
        {{ isset($contentTitle) ? $contentTitle : 'Detail Data' }}
    </h3>
@stop

@section('content-page')
    @if (session('validation-message'))
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="icon fa fa-warning"></i> {{ session('validation-message') }}
        </div>
    @endif
    {!! Form::open(['action' => $controller.'@store']) !!}
        @yield('data-form')
    {!! Form::close() !!}
@stop

@section('content-status')
    <div class="text-muted small">
        <i style="color:red;">* Required field, you must fill this item.</i>
    </div>
@stop