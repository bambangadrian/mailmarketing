@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                {{ $formMethodField }}
                <fieldset>
                    <legend>General Data:</legend>
                    <div class="form-group">
                        {!! Form::label('Cpy_Name', 'Name',  ['class' => 'required']) !!}
                        {!! Form::text('Cpy_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Company Name']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Cpy_Email', 'Email',  ['class' => 'required']) !!}
                        {!! Form::email('Cpy_Email', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Company Email']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Cpy_WebsiteUrl', 'Website URL',  ['class' => 'required']) !!}
                        {!! Form::text('Cpy_WebsiteUrl', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Company Website URL']) !!}
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Address and TimeZone Setup:</legend>
                    <div class="form-group">
                        {!! Form::label('Cpy_Address1', 'Address') !!}
                        {!! Form::text('Cpy_Address1', null, ['class' => 'form-control', 'placeholder' => 'Enter Address Line 1']) !!}
                        {!! Form::text('Cpy_Address2', null, ['class' => 'form-control', 'placeholder' => 'Enter Address Line 2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Cpy_City', 'City') !!}
                        {!! Form::text('Cpy_City', null, ['class' => 'form-control', 'placeholder' => 'Enter City']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Cpy_PostCode', 'Postal Code') !!}
                        {!! Form::text('Cpy_PostCode', null, ['class' => 'form-control', 'placeholder' => 'Enter Postal Code']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Cpy_Country', 'Country', ['class' => 'required']) !!}
                        {!! Form::select('Cpy_Country', $countryOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Cpy_TimeZone', 'Time Zone', ['class' => 'required']) !!}
                        {!! Form::select('Cpy_TimeZone', $timeZoneOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                    </div>
                </fieldset>
                <div class="checkbox">
                    <label for="Cc_Active">
                        {!! Form::hidden('Cpy_Active', 0) !!}
                        {!! Form::checkbox('Cpy_Active', 1) !!}
                        Active
                    </label>
                </div>
                @include('admin.partials.layout.form.button')
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('add-js')
    @parent
    <script>
        $('#Cpy_Country, #Cpy_TimeZone').select2();
    </script>
@stop