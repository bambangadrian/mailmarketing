@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
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
            @include('admin.partials.layout.form.delete')
        </div>
    </div>
@stop