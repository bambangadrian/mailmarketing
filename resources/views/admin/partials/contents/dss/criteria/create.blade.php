@extends('admin.template.lte.layout.detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Dss</li>
        <li><a href="{{ action('Admin\Dss\DssCriteriaController@index') }}"><i class="fa fa-server"></i> Criteria</a></li>
    </ol>
@stop

@section('data-form')
    <div class="form-group">
        {!! Form::label('Dcr_DssID', 'Dss ID',['class' => 'required']) !!}
        {!! Form::text('Dcr_DssID', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dcr_Name', 'Criteria Name',['class' => 'required']) !!}
        {!! Form::text('Dcr_Name', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dcr_Description', 'Description') !!}
        {!! Form::textarea('Dcr_Description', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dcr_EigenVector', 'Eigen Vektor') !!}
        {!! Form::text('Dcr_EigenVectorr', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Dcr_MatrixTotal', 'Matrix Total') !!}
        {!! Form::text('MDcr_MatrixTotal', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
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