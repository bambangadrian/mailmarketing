@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
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
            @include('admin.partials.layout.form.delete')
        </div>
    </div>
@stop