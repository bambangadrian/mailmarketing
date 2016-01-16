@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                {{ $formMethodField }}
                <div class="form-group">
                    {!! Form::label('Imf_Name', 'Import Name', ['class' => 'required']) !!}
                    {!! Form::text('Imf_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Import From Name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Imf_Description', 'Description') !!}
                    {!! Form::textarea('Imf_Description', null, ['rows'=> 4, 'class' => 'form-control', 'placeholder' => 'Enter Import From Description']) !!}
                </div>
                <div class="checkbox">
                    <label for="Imf_Active">
                        {!! Form::hidden('Imf_Active', 0) !!}
                        {!! Form::checkbox('Imf_Active', 1) !!}
                        Active
                    </label>
                </div>
                @include('admin.partials.layout.form.button')
            {!! Form::close() !!}
            @include('admin.partials.layout.form.delete')
        </div>
    </div>

@stop