@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    {!! Form::model($model, ['url' => $formAction]) !!}
        {{ $formMethodField }}
        <div class="form-group">
            {!! Form::label('Cc_Name', 'Category Name',  ['class' => 'required']) !!}
            {!! Form::text('Cc_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Campaign Category Name']) !!}
        </div>
        <div class="checkbox">
            <label for="Cc_Active">
                {!! Form::hidden('Cc_Active', 0) !!}
                {!! Form::checkbox('Cc_Active', 1) !!}
                Active
            </label>
        </div>
        @include('admin.partials.layout.form.button')
    {!! Form::close() !!}
@stop