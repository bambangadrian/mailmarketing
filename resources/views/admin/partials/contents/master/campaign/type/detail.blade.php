@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    {!! Form::model($model, ['url' => $formAction]) !!}
        {{ $formMethodField }}
        <div class="form-group">
            {!! Form::label('Cgt_Name', 'Type Name', ['class' => 'required']) !!}
            {!! Form::text('Cgt_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Campaign Type Name']) !!}
        </div>
        <div class="checkbox">
            <label for="Cgt_Active">
                {!! Form::hidden('Cgt_Active', 0) !!}
                {!! Form::checkbox('Cgt_Active', 1) !!}
                Active
            </label>
        </div>
        @include('admin.partials.layout.form.button')
    {!! Form::close() !!}
@stop