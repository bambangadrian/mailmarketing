@extends('admin.template.lte.layout.basic')

@section('content-title')
    <h3 class="box-title">
        <i class="fa fa-file"></i>
        {{ isset($contentTitle) ? $contentTitle : 'Detail Data' }}
    </h3>
@stop

@section('content-page')
    {!! Form::open(['action' => $controller.'@store']) !!}
        @yield('data-form')
    {!! Form::close() !!}
    @if ($errors->any())
        <div class="alert alert-danger alert-important">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="icon fa fa-warning"></i> Invalid data found
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@stop

@section('content-status')
    <div class="text-muted small">
        <i style="color:red;">* Required field, you must fill this item.</i>
    </div>
@stop