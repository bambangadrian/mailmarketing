@extends('admin.template.lte.layout.detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\SubscriberController@index') }}"><i class="fa fa-user-md"></i> Subcriber</a></li>
    </ol>
@stop

@section('data-form')
    <div class="form-group">
        {!! Form::label('Sbr_ImportFromID', 'Import Form ID',['class' => 'required']) !!}
        {!! Form::text('Sbr_ImportFromID', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Sbr_EmailAddress', 'Email Address',['class' => 'required']) !!}
        {!! Form::text('Sbr_EmailAddress', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Sbr_FirstName', 'First Name',['class' => 'required']) !!}
        {!! Form::text('Sbr_FirstName', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Sbr_LastName', 'Last Name') !!}
        {!! Form::text('Sbr_LastName', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Sbr_Address1', 'Alamat 1') !!}
        {!! Form::text('Sbr_Address1', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Sbr_Address2', 'Alamat 2') !!}
        {!! Form::text('Sbr_Address2', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Sbr_Address3', 'Alamat 3') !!}
        {!! Form::text('Sbr_Address3', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Sbr_MemberRating', 'Member Rating') !!}
        {!! Form::text('Sbr_MemberRating', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="checkbox">
        <label for="Sbr_Active">
            {!! Form::checkbox('Sbr_Active', 'Y') !!}
            Active
        </label>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-2 col-md-offset-10">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Insert</button>
        </div>
    </div>

@stop