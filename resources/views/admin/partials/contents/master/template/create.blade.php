@extends('admin.template.lte.layout.detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\TemplateController@index') }}"><i class="fa fa-code-fork"></i> Tamplate</a></li>
    </ol>
@stop

@section('data-form')
    <div class="form-group">
        {!! Form::label('Tpl_Name', 'Tamplate Name', ['class' => 'required']) !!}
        {!! Form::text('Tpl_Name', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Tpl_Description', 'Description') !!}
        {!! Form::textarea('Tpl_Description', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="checkbox">
        <label for="Tpl_Active">
            {!! Form::checkbox('Tpl_Active', 'Y') !!}
            Active
        </label>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-2 col-md-offset-10">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Insert</button>
        </div>
    </div>

@stop