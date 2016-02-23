@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction, 'files' => true, 'id' => 'templateForm']) !!}
                {{ $formMethodField }}
                <div class="form-group">
                    {!! Form::label('Tpl_Name', 'Template Name', ['class' => 'required']) !!}
                    {!! Form::text('Tpl_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Template Name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Tpl_Description', 'Description') !!}
                    {!! Form::textarea('Tpl_Description', null, ['class' => 'form-control', 'placeholder' => 'Enter Template Description', 'rows' => 4]) !!}
                </div>
                <div class="form-group" id="templateBuilderGroup">
                    {!! Form::label('Tpl_Code', 'Template Content', ['class' => 'required']) !!}
                    <iframe id="templateBuilder" src="{{ url('mosaico/editor.html#9tmwhjg') }}"></iframe>
                    {!! Form::hidden('Tpl_Code', null, ['id' => 'Tpl_Code']) !!}
                </div>
                <div class="form-group" id="templateFileUploadGroup">
                    {!! Form::label('Tpl_File', 'Upload File', ['class' => 'required', 'id' => 'Tpl_File']) !!}
                    {!! Form::file('Tpl_File', ['class' => 'form-control']) !!}
                </div>
                <div class="checkbox">
                    <label for="Tpl_Active">
                        {!! Form::hidden('Tpl_Active', 0) !!}
                        {!! Form::checkbox('Tpl_Active', 1) !!}
                        Active
                    </label>
                </div>
                @include('admin.partials.layout.form.button')
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('add-css')
    @parent
    <style>
        #templateBuilderGroup{
            display: none;
        }
        iframe{
            width: 100%;
            min-height: 500px;
        }
    </style>
@stop
@section('add-js')
    @parent
    <script>
        $('#templateBuilderButton').click(function(){
            var self = $(this);
            var icon = '<i class="fa fa-code"></i> ';
            var buttonText = $(this).text().trim();
            $('#templateBuilderGroup').toggle(0, function(){
                $('#templateFileUploadGroup').toggle();
                if(buttonText === 'Show Template Builder'){
                    self.html(icon + ' Hide Template Builder');
                    $('#templateBuilder').contents().find('#downloadForm input[name="action"]').val('ajax');
                }else{
                    self.html(icon + ' Show Template Builder');
                }
            });
        });
        $('button[type="submit"]').click(function(){
            if($('#templateFileUploadGroup').css('display') == 'none') {
                $('#Tpl_Code').val('<!DOCTYPE html>\n<html>\n' + $('#templateBuilder').contents().find('html').html() + '\n</html>');
            }
            $('#templateForm').submit();
        });
    </script>
@stop