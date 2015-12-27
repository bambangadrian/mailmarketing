@extends('admin.template.lte.layout.detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\TrackingStatusController@index') }}"><i class="fa fa-tags"></i> Tracking Status</a></li>
    </ol>
@stop

@section('data-form')
    <div class="form-group">
        {!! Form::label('Mts_Name', 'Tracking Status Name',['class' => 'required']) !!}
        {!! Form::text('Mts_Name', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="checkbox">
        <label for="Mts_Active">
            {!! Form::checkbox('Mts_Active', 'Y') !!}
            Active
        </label>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-2 col-md-offset-10">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Insert</button>
        </div>
    </div>

@stop