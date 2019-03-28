@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                {{ $formMethodField }}
                <div class="form-group">
                    {!! Form::label('Seg_Name', 'Segment Name', ['class' => 'required']) !!}
                    {!! Form::text('Seg_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Segment Name']) !!}
                </div>
                <div class="checkbox">
                    <label for="Seg_Active">
                        {!! Form::hidden('Seg_Active', 0) !!}
                        {!! Form::checkbox('Seg_Active', 1) !!}
                        Active
                    </label>
                </div>
                @include('admin.partials.layout.form.button')
            {!! Form::close() !!}
            @include('admin.partials.layout.form.delete')
        </div>
    </div>
@stop