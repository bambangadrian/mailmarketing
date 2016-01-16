@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                {{ $formMethodField }}
                <div class="form-group">
                    {!! Form::label('Sbr_ImportFromID', 'Import From') !!}
                    {!! Form::select('Sbr_ImportFromID', $importOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Sbr_EmailAddress', 'Email Address',['class' => 'required']) !!}
                    {!! Form::email('Sbr_EmailAddress', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Email Address']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Sbr_FirstName', 'First Name',['class' => 'required']) !!}
                    {!! Form::text('Sbr_FirstName', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter First Name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Sbr_LastName', 'Last Name') !!}
                    {!! Form::text('Sbr_LastName', null, ['class' => 'form-control', 'placeholder' => 'Enter Last Name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Sbr_Address1', 'Address 1') !!}
                    {!! Form::textarea('Sbr_Address1', null, ['class' => 'form-control', 'placeholder' => 'Enter Address 1', 'rows' => 4]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Sbr_Address2', 'Address 2') !!}
                    {!! Form::textarea('Sbr_Address2', null, ['class' => 'form-control', 'placeholder' => 'Enter Address 2', 'rows' => 4]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Sbr_Address3', 'Address 3') !!}
                    {!! Form::text('Sbr_Address3', null, ['class' => 'form-control', 'placeholder' => 'Enter Address 3', 'rows' => 4]) !!}
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
                @include('admin.partials.layout.form.button')
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('add-js')
    @parent
    <script>
        $('#Sbr_ImportFromID').select2();
    </script>
@endsection