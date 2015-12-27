@extends('admin.template.lte.layout.detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\Dss\DssPeriodController@index') }}"><i class="fa fa fa-cube"></i> Period</a></li>
    </ol>
@stop

@section('data-form')
    <div class="form-group">
        {!! Form::label('Dss_RandomIndexID', 'Random Index ID',['class' => 'required']) !!}
        {!! Form::text('Dss_RandomIndexID', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dss_Name', 'Dss Name',['class' => 'required']) !!}
        {!! Form::text('Dss_Name', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dss_Description', 'Description') !!}
        {!! Form::textarea('Dss_Description', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dss_StartPeriod', 'Start Period') !!}
        {!! Form::text('Dss_StartPeriod', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dss_EndPeriod', 'End Period') !!}
        {!! Form::text('Dss_EndPeriod', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dss_CriteriaEigenValue', 'Criteria Eigen Value') !!}
        {!! Form::text('Dss_CriteriaEigenValue', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dss_CriteriaConsistencyIndex', 'Criteria Consistency Criteria') !!}
        {!! Form::text('Dss_CriteriaConsistencyIndex', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dss_CriteriaConsistencyRatio', 'Criteria Consistency Ratio') !!}
        {!! Form::textarea('Dss_CriteriaConsistencyRatio', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="checkbox">
        <label for="Mls_Active">
            {!! Form::checkbox('Mls_Active', 'Y') !!}
            Active
        </label>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-2 col-md-offset-10">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Insert</button>
        </div>
    </div>

@stop