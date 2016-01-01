@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    {!! Form::model($model, ['url' => $formAction]) !!}
        {{ $formMethodField }}
        <div class="form-group">
            {!! Form::label('Sc_Name', 'Criteria Name', ['class' => 'required']) !!}
            {!! Form::text('Sc_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Segment Criteria Name']) !!}
        </div>
        <div class="checkbox">
            <label for="Sc_Active">
                {!! Form::hidden('Sc_Active', 0) !!}
                {!! Form::checkbox('Sc_Active', 1) !!}
                Active
            </label>
        </div>
        @include('admin.partials.layout.form.button')
    {!! Form::close() !!}
@stop