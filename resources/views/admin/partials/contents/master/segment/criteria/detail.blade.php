@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
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
            @include('admin.partials.layout.form.delete')
        </div>
    </div>
@stop