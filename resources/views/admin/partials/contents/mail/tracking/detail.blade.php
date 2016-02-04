@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                {{ $formMethodField }}
                <?php
                    $fieldAttribute = 'disabled';
                    $activeFieldAttribute = null;
                    if($model->mailSchedule->Msd_IsExecuted === 1){
                        $activeFieldAttribute = ['onclick' => 'alert("This sent mail has been executed");return false;'];
                    }
                ?>
                <div class="form-group">
                    {!! Form::label('Email', 'Email Address') !!}
                    {!! Form::text('Email', $model->subscriberList->subscriber->Sbr_EmailAddress, ['class' => 'form-control', $fieldAttribute]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Campaign', 'Campaign Name') !!}
                    {!! Form::text('Campaign', $model->mailSchedule->campaign->Cpg_Name, ['class' => 'form-control', $fieldAttribute]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('MailList', 'Mailing List') !!}
                    {!! Form::text('MailList', $model->subscriberList->subscriberGroup->mailList->Mls_Name . ' - ['. $model->subscriberList->subscriberGroup->Sbg_Name . ']', ['class' => 'form-control', $fieldAttribute]) !!}
                </div>
                <div class="checkbox">
                    <label for="Sm_Active">
                        {!! Form::hidden('Sm_Active', 0) !!}
                        {!! Form::checkbox('Sm_Active', 1, null, $activeFieldAttribute) !!}
                        Active
                    </label>
                </div>
                @include('admin.partials.layout.form.button')
            {!! Form::close() !!}
        </div>
    </div>
@stop