@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                {{ $formMethodField }}
                <div class="form-group">
                    {!! Form::label('Dri_NumberColumn', 'Number of Criteria',['class' => 'required']) !!}
                    {!! Form::text('Dri_NumberColumn', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Number of Criteria']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Dri_RandomIndex', 'Random Index',['class' => 'required']) !!}
                    {!! Form::text('Dri_RandomIndex', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Random Index Value']) !!}
                </div>
                <div class="checkbox">
                    <label for="Dri_Active">
                        {!! Form::hidden('Dri_Active', 0) !!}
                        {!! Form::checkbox('Dri_Active', 1) !!}
                        Active
                    </label>
                </div>
                @include('admin.partials.layout.form.button')
            {!! Form::close() !!}
        </div>
    </div>
@stop