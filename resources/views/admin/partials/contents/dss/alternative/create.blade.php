@extends('admin.template.lte.layout.detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-database"></i> DSS</li>
        <li><a href="{{ action('Admin\Dss\DssAlternativeController@index') }}"><i class="fa fa-gg"></i> Alternative</a></li>
    </ol>
@stop


@section('data-form')
        <!-- text input -->
    <div class="form-group">
        <label>Alternative Name</label>
        <input type="text" class="form-control" placeholder="Enter ...">
    </div>
    <!-- radio -->
    <div class="form-group">
        <label>Active Option</label>
        <div class="radio">
            <label><input type="radio" name="Dal_Name" value="Y">Yes</label>
            <label><input type="radio" name="Dal_Name" value="N">No</label>
        </div>
    </div>
@stop