@extends('admin.template.lte.layout.detail')
@include('admin.partials.contents.dss.alternative.breadcrumb')

@section('data-form')
    {!! Form::model($model, ['url' => $formAction]) !!}
        <div class="form-group">
            {!! Form::label('Dal_Name', 'Alternative Name', ['class' => 'required']) !!}
            {!! Form::text('Dal_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Alternative Name']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Dal_DssID', 'DSS Period', ['class' => 'required']) !!}
            {!! Form::select('Dal_DssID', $dssOptions, null, ['class' => 'form-control']) !!}
        </div>

        <div class="checkbox">
            <label for="Dal_Active">
                {!! Form::hidden('Dal_Active', 'N') !!}
                {!! Form::checkbox('Dal_Active', 'Y', true) !!}
                Active
            </label>
        </div>
        @include('admin.partials.layout.form.button')
    {!! Form::close() !!}
@stop