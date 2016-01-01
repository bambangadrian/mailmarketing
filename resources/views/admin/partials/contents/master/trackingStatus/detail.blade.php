@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    {!! Form::model($model, ['url' => $formAction]) !!}
        {{ $formMethodField }}
        <div class="form-group">
            {!! Form::label('Mts_Name', 'Tracking Status Name',['class' => 'required']) !!}
            {!! Form::text('Mts_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Tracking Status Name']) !!}
        </div>
        <div class="checkbox">
            <label for="Mts_Active">
                {!! Form::hidden('Mts_Active', 0) !!}
                {!! Form::checkbox('Mts_Active', 1) !!}
                Active
            </label>
        </div>
        @include('admin.partials.layout.form.button')
    {!! Form::close() !!}
@stop