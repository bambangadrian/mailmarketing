@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                <div class="row">
                    <div class="col-md-6">
                        {{ $formMethodField }}
                        <div class="form-group">
                            {!! Form::label('Mls_Name', 'Mailing List Name',['class' => 'required']) !!}
                            {!! Form::text('Mls_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Mailing List Name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Mls_EmailAddressFrom', 'Email Address From',['class' => 'required']) !!}
                            {!! Form::text('Mls_EmailAddressFrom', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Email Address From']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Mls_EmailNameFrom', 'Email Name From',['class' => 'required']) !!}
                            {!! Form::text('Mls_EmailNameFrom', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Email Name From']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Mls_CompanyName', 'Company Name',['class' => 'required']) !!}
                            {!! Form::text('Mls_CompanyName', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Company Name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Mls_Description', 'Description') !!}
                            {!! Form::text('Mls_Description', null, ['class' => 'form-control', 'placeholder' => 'Enter Description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Mls_Country', 'Country') !!}
                            {!! Form::select('Mls_Country', $countryOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('Mls_Address1', 'Address 1') !!}
                            {!! Form::text('Mls_Address1', null, ['class' => 'form-control', 'placeholder' => 'Enter Address 1']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Mls_Address2', 'Address 2') !!}
                            {!! Form::text('Mls_Address1', null, ['class' => 'form-control', 'placeholder' => 'Enter Address 2']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Mls_City', 'City') !!}
                            {!! Form::text('Mls_City', null, ['class' => 'form-control', 'placeholder' => 'Enter City']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Mls_Phone', 'Phone Number') !!}
                            {!! Form::text('Mls_Phone', null, ['class' => 'form-control', 'placeholder' => 'Enter Phone Number']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Mls_AccessLevel', 'Access Level', ['class' => 'required']) !!}
                            {!! Form::select('Mls_AccessLevel', $accessLevelOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                        </div>
                        <div class="checkbox">
                            <label for="Mls_Active">
                                {!! Form::hidden('Mls_Active', 0) !!}
                                {!! Form::checkbox('Mls_Active', 1) !!}
                                Active
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        @include('admin.partials.layout.form.button')
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('add-js')
    @parent

    <script>
        $('#Mls_AccessLevel, #Mls_Country').select2();
    </script>

@stop