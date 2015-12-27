@extends('admin.template.lte.layout.detail')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\MailListController@index') }}"><i class="fa fa-bookmark"></i> Mailing List</a></li>
    </ol>
@stop

@section('data-form')
    <div class="form-group">
        {!! Form::label('Mls_Name', 'Mail List Name',['class' => 'required']) !!}
        {!! Form::text('Mls_Name', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Mls_EmailAddressFrom', 'Email Address From',['class' => 'required']) !!}
        {!! Form::text('Mls_EmailAddressFrom', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Mls_EmailNameFrom', 'Email Name From',['class' => 'required']) !!}
        {!! Form::text('Mls_EmailNameFrom', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Mls_Reminder', 'Reminder') !!}
        {!! Form::text('Mls_Reminder', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Mls_CompanyName', 'Company Name',['class' => 'required']) !!}
        {!! Form::text('Mls_CompanyName', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Mls_Address1', 'Alamat 1') !!}
        {!! Form::text('Mls_Address1', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Mls_Address2', 'Alamat 2') !!}
        {!! Form::text('Mls_Address1', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Mls_City', 'City') !!}
        {!! Form::text('Mls_City', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Mls_Country', 'Country') !!}
        {!! Form::text('Mls_Country', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Mls_Phone', 'Phone Number') !!}
        {!! Form::text('Mls_Phone', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Mls_NotifType', 'Notification Type') !!}
        {!! Form::textarea('Mls_NotifType', null, ['class' => 'form-control', 'placeholder' => 'Enter ...']) !!}
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