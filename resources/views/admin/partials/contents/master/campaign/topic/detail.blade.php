@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                {{ $formMethodField }}
                <div class="form-group">
                    {!! Form::label('Cto_Name', 'Topic Name', ['class' => 'required']) !!}
                    {!! Form::text('Cto_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Campaign Topic Name']) !!}
                </div>
                <div class="checkbox">
                    <label for="Cto_Active">
                        {!! Form::hidden('Cto_Active', 0) !!}
                        {!! Form::checkbox('Cto_Active', 1) !!}
                        Active
                    </label>
                </div>
                @include('admin.partials.layout.form.button')
            {!! Form::close() !!}
            @include('admin.partials.layout.form.delete')
        </div>
    </div>
@stop