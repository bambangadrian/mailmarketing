@extends('admin.template.lte.layout.detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\CampaignController@index') }}"><i class="fa fa-indent"></i> Campaign</a></li>
    </ol>
@stop

@section('data-form')
    <div class="form-group">
        {!! Form::label('Cpg_TypeID', 'Campaign Type',['class' => 'required']) !!}
        {!! Form::text('Cpg_TypeID', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Cpg_CategoryID', 'Category Campaign',['class' => 'required']) !!}
        {!! Form::text('Cpg_CategoryID', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Cpg_TopicID', 'Campaign Topic',['class' => 'required']) !!}
        {!! Form::text('Cpg_TopicID', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Cpg_TemplateID', 'Tamplate ID') !!}
        {!! Form::text('Cpg_TemplateID', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Cpg_Name', 'Campaign Name',['class' => 'required']) !!}
        {!! Form::text('Cpg_Name', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Cpg_EmailSubject', 'Email Subject') !!}
        {!! Form::text('Cpg_EmailSubject', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Cpg_EmailAddressFrom', 'Email Address From') !!}
        {!! Form::text('Cpg_EmailAddressFrom', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Cpg_EmailNameFrom', 'Email Name From') !!}
        {!! Form::text('Cpg_EmailNameFrom', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Cpg_Content', 'Content') !!}
        {!! Form::text('Cpg_Content', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
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