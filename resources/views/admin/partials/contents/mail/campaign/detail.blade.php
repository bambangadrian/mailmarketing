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
                        {!! Form::label('Cpg_TypeID', 'Campaign Type', ['class' => 'required']) !!}
                        {!! Form::select('Cpg_TypeID', $campaignTypeOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Cpg_CategoryID', 'Campaign Category', ['class' => 'required']) !!}
                        {!! Form::select('Cpg_CategoryID', $campaignCategoryOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Cpg_TopicID', 'Campaign Topic', ['class' => 'required']) !!}
                        {!! Form::select('Cpg_TopicID', $campaignTopicOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Cpg_TemplateID', 'Template') !!}
                        {!! Form::select('Cpg_TemplateID', $templateOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('Cpg_Name', 'Campaign Name',['class' => 'required']) !!}
                        {!! Form::text('Cpg_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Campaign Name']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Cpg_EmailSubject', 'Email Subject') !!}
                        {!! Form::text('Cpg_EmailSubject', null, ['class' => 'form-control', 'placeholder' => 'Enter Eail Subject']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Cpg_EmailAddressFrom', 'Email Address From') !!}
                        {!! Form::text('Cpg_EmailAddressFrom', null, ['class' => 'form-control', 'placeholder' => 'Enter Email Address From']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Cpg_EmailNameFrom', 'Email Name From') !!}
                        {!! Form::text('Cpg_EmailNameFrom', null, ['class' => 'form-control', 'placeholder' => 'Enter Email Name From']) !!}
                    </div>
                    <div class="checkbox">
                        <label for="Mls_Active">
                            {!! Form::hidden('Cpg_Active', 0) !!}
                            {!! Form::checkbox('Cpg_Active', 1) !!}
                            Active
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        {!! Form::label('Cpg_Content', 'Email Body') !!}
                        {!! Form::textarea('Cpg_Content', null, ['class' => 'form-control', 'placeholder' => 'Enter Email Body Content', 'rows' => 4]) !!}
                    </div>
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
        CKEDITOR.replace('Cpg_Content');
        $('#Cpg_TypeID, #Cpg_CategoryID, #Cpg_TopicID, #Cpg_TemplateID').select2();
    </script>
@stop