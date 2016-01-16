@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
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
                        {!! Form::checkbox('Usr_Active', 1) !!}
                        Active
                    </label>
                </div>
                @include('admin.partials.layout.form.button')
            {!! Form::close() !!}
        </div>
    </div>
@stop