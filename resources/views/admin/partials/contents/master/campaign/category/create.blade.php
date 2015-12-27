@extends('admin.template.lte.layout.detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\CampaignCategoryController@index') }}"><i class="fa fa-gavel"></i> Campaign Category</a></li>
    </ol>
@stop

@section('data-form')
    <div class="form-group">
        {!! Form::label('Cc_Name', 'Category Name') !!}
        {!! Form::text('Cc_Name', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="checkbox">
        <label for="Cc_Active">
            {!! Form::checkbox('Cc_Active', 'Y') !!}
            Active
        </label>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-2 col-md-offset-10">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Insert</button>
        </div>
    </div>

@stop