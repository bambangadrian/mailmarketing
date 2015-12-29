@extends('admin.template.lte.layout.detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-database"></i> DSS</li>
        <li><a href="{{ action('Admin\Dss\DssAlternativeController@index') }}"><i class="fa fa-gg"></i> Alternative</a></li>
    </ol>
@stop

@section('data-form')
    <div class="form-group">
        {!! Form::label('Dal_Name', 'Alternative Name', ['class' => 'required']) !!}
        {!! Form::text('Dal_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Alternative Name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Dal_DssID', 'DSS Period', ['class' => 'required']) !!}
        {!! Form::select('Dal_DssID', $dssOptions, null, ['class' => 'form-control']) !!}
    </div>

    <div class="checkbox">
        <label for="Dal_Active">
            {!! Form::hidden('Dal_Active', 'N') !!}
            {!! Form::checkbox('Dal_Active', 'Y') !!}
            Active
        </label>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-2 col-md-offset-10">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Insert</button>
        </div>
    </div>

@stop