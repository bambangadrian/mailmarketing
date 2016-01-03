@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    {!! Form::model($model, ['url' => $formAction]) !!}
    {{ $formMethodField }}
        <div class="form-group">
            {!! Form::label('Usr_Name', 'Username', ['class' => 'required']) !!}
            {!! Form::text('Usr_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Username']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Usr_Email', 'Email', ['class' => 'required']) !!}
            {!! Form::email('Usr_Email', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Email']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Usr_Password', 'Password', ['class' => 'required']) !!}
            {!! Form::password('Usr_Password', ['required', 'class' => 'form-control', 'placeholder' => 'Enter Password']) !!}
        </div>
        <div class="checkbox">
            <label for="Usr_Active">
                {!! Form::hidden('Usr_Active', 0) !!}
                {!! Form::checkbox('Dal_Active', 1) !!}
                Active
            </label>
        </div>
        @include('admin.partials.layout.form.button')
    {!! Form::close() !!}
@stop