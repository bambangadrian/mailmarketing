@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                {{ $formMethodField }}
                <?php
                    $dalNameValue = null;
                    if($isUpdate === true){
                        $dalNameValue = $model->Dal_Name;
                    }
                ?>
                {!! Form::hidden('Dal_Name', $dalNameValue) !!}
                <div class="form-group">
                    {!! Form::label('Dal_ReferenceID', 'Alternative Name', ['class' => 'required']) !!}
                    {!! Form::select('Dal_ReferenceID', $topicOptions, null, ['required', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Dal_DssID', 'DSS Period', ['class' => 'required']) !!}
                    {!! Form::select('Dal_DssID', $dssOptions, null, ['class' => 'form-control']) !!}
                </div>
                <div class="checkbox">
                    <label for="Dal_Active">
                        {!! Form::hidden('Dal_Active', 0) !!}
                        {!! Form::checkbox('Dal_Active', 1) !!}
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
        $('#Dal_DssID, #Dal_ReferenceID').select2();
        $('#Dal_ReferenceID').on('change', function(e){
            if(e.target.value !== ''){
                $('input[name="Dal_Name"]').val($(this).find("option:selected").text());
            }else{
                $('input[name="Dal_Name"]').val('');
            }
        });
    </script>
@stop