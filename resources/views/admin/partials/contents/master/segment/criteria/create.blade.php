@extends('admin.template.lte.layout.detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\SegmentCriteriaController@index') }}"><i class="fa fa-code-fork"></i> Segment Criteria</a></li>
    </ol>
@stop

@section('data-form')
    <div class="form-group">
        {!! Form::label('Sc_Name', 'Criteria Name', ['class' => 'required']) !!}
        {!! Form::text('Sc_Name', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="checkbox">
        <label for="Sc_Active">
            {!! Form::checkbox('Sc_Active', 'Y') !!}
            Active
        </label>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-2 col-md-offset-10">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Insert</button>
        </div>
    </div>

@stop