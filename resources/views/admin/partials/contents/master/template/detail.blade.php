@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    {!! Form::model($model, ['url' => $formAction, 'files' => true]) !!}
        {{ $formMethodField }}
        <div class="form-group">
            {!! Form::label('Tpl_Name', 'Template Name', ['class' => 'required']) !!}
            {!! Form::text('Tpl_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Template Name']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Tpl_Description', 'Description') !!}
            {!! Form::textarea('Tpl_Description', null, ['class' => 'form-control', 'placeholder' => 'Enter Template Description', 'rows' => 4]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Tpl_File', 'Upload File', ['class' => 'required']) !!}
            {!! Form::file('Tpl_File', ['class' => 'form-control']) !!}
        </div>
        <div class="checkbox">
            <label for="Tpl_Active">
                {!! Form::hidden('Tpl_Active', 0) !!}
                {!! Form::checkbox('Tpl_Active', 1) !!}
                Active
            </label>
        </div>
        @include('admin.partials.layout.form.button')
    {!! Form::close() !!}
@stop