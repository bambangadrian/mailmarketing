@extends('admin.template.lte.layout.detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\UserController@index') }}"><i class="fa fa-user"></i> User</a></li>
    </ol>
@stop

@section('data-form')
    <div class="form-group">
        {!! Form::label('Usr_Name', 'User Name',['class' => 'required']) !!}
        {!! Form::text('Usr_Name', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Usr_Email', 'Email User',['class' => 'required']) !!}
        {!! Form::text('Usr_Email', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Usr_Password', 'Password User',['class' => 'required']) !!}
        {!! Form::text('Usr_Password', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="checkbox">
        <label for="Usr_Active">
            {!! Form::checkbox('Usr_Active', 'Y') !!}
            Active
        </label>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-2 col-md-offset-10">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Insert</button>
        </div>
    </div>

@stop