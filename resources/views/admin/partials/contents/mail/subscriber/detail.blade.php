@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                {{ $formMethodField }}
                <fieldset>
                    <legend>Personal Data</legend>
                    <div class="form-group">
                        {!! Form::label('Sbr_FirstName', 'First Name',['class' => 'required']) !!}
                        {!! Form::text('Sbr_FirstName', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter First Name']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Sbr_LastName', 'Last Name') !!}
                        {!! Form::text('Sbr_LastName', null, ['class' => 'form-control', 'placeholder' => 'Enter Last Name']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Sbr_BirthDay', 'Birth Date') !!}
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            {!! Form::text('Sbr_BirthDay', null, ['class' => 'form-control pull-right', 'placeholder' => 'Enter Birth Date']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Sbr_Gender', 'Gender') !!}
                        {!! Form::select('Sbr_Gender', $genderOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Contact and Address</legend>
                    <div class="form-group">
                        {!! Form::label('Sbr_EmailAddress', 'Email Address',['class' => 'required']) !!}
                        {!! Form::email('Sbr_EmailAddress', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Email Address']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Sbr_Address1', 'Address') !!}
                        {!! Form::text('Sbr_Address1', null, ['class' => 'form-control', 'placeholder' => 'Enter Address Line 1']) !!}
                        {!! Form::text('Sbr_Address2', null, ['class' => 'form-control', 'placeholder' => 'Enter Address Line 2']) !!}
                        {!! Form::text('Sbr_Address3', null, ['class' => 'form-control', 'placeholder' => 'Enter Address Line 3']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Sbr_Phone', 'Phone Number') !!}
                        {!! Form::text('Sbr_Phone', null, ['class' => 'form-control', 'placeholder' => 'Enter Main Phone Number']) !!}
                        {!! Form::text('Sbr_Phone', null, ['class' => 'form-control', 'placeholder' => 'Enter Alternative Phone Number']) !!}
                    </div>
                </fieldset>
                <fieldset>
                    <legend>General Information</legend>
                    <div class="form-group">
                        {!! Form::label('Sbr_ImportFromID', 'Import From') !!}
                        {!! Form::select('Sbr_ImportFromID', $importOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Sbr_MemberRating', 'Member Rating') !!}
                        {!! Form::text('Sbr_MemberRating', null, ['class' => 'form-control', 'placeholder' => 'Enter Member Rating']) !!}
                    </div>
                    <div class="checkbox">
                        <label for="Sbr_Active">
                            {!! Form::hidden('Sbr_Active', 0) !!}
                            {!! Form::checkbox('Sbr_Active', 1) !!}
                            Active
                        </label>
                    </div>
                </fieldset>
                @include('admin.partials.layout.form.button')
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('add-js')
    @parent
    <script>
        $('#Sbr_ImportFromID, #Sbr_Gender').select2();

        $('#Sbr_BirthDay').daterangepicker(
            {
                singleDatePicker: true,
                showDropdowns: true,
                format: 'YYYY-MM-DD',
                minDate: '1940-01-01',
                maxDate: (new Date().getFullYear() - 10) + '-01-01'
            }
        );
    </script>
@endsection