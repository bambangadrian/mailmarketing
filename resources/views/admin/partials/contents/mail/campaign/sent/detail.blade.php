@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                {{ $formMethodField }}
                {!! Form::hidden('Msd_CampaignID', $campaignID) !!}
                <div class="form-group">
                    {!! Form::label('Msd_MailListID', 'Mailing List', ['class' => 'required']) !!}
                    {!! Form::select('Msd_MailListID', $mailListOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Msd_SubscriberGroupID', 'Subscriber Group', ['class' => 'required']) !!}
                    {!! Form::select('Msd_SubscriberGroupID', $subscriberGroupOptions, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
                </div>
                <div class="checkbcaox">
                    <label for="Msd_Active">
                        {!! Form::hidden('Msd_Active', 0) !!}
                        {!! Form::checkbox('Msd_Active', 1) !!}
                        Active
                    </label>
                </div>
                <div class="form-group">
                    {!! Form::label('Msd_ExecutedDate', 'Schedule Date Time', ['class' => 'required']) !!}
                    <div class="checkbox">
                        <label for="RealTime">
                            {!! Form::hidden('RealTime', 0) !!}
                            {!! Form::checkbox('RealTime', 1) !!}
                            Realtime (Set the current time as execution time)
                        </label>
                    </div>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        {!! Form::text('Msd_ExecutedDate', null, ['required', 'class' => 'form-control pull-right', 'placeholder' => 'Enter Schedule Date Time']) !!}
                    </div>
                </div>
                @include('admin.partials.layout.form.button')
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('add-js')
    @parent
    <script>
        $('#Msd_MailListID').on('change', function(e){
            console.log(e);
            var mailListID = e.target.value;
            // Call ajax.
            $.get('<?php echo url("ajax/subscriber-group") ?>', {mailListID: mailListID}, function(data){
                var model = $('#Msd_SubscriberGroupID');
                model.empty();
                model.append('<option>Please Select Subscriber Group ...</option>');
                console.log(data);
                $.each(data, function(index, element){
                    model.append('<option value="' + element.Sbg_ID + '">' + element.Sbg_Name + '</option>');
                });
                model.select2();
            })
        });
        $('#Msd_MailListID, #Msd_SubscriberGroupID').select2();
        $('#Msd_ExecutedDate').daterangepicker(
                {
                    singleDatePicker: true,
                    timePicker: true,
                    timePicker24Hour: true,
                    timePickerIncrement: 10,
                    format: 'YYYY-MM-DD HH:mm:ss'
                }
        );
        $('input[name="RealTime"]').change(function(){
            var scheduleDateTimeElement = $('#Msd_ExecutedDate'), realTime = $(this).is(':checked');
            console.log(realTime);
            if(realTime === true){
                scheduleDateTimeElement.val(moment().format('YYYY-MM-DD HH:mm:ss'));
            }
        });
    </script>
@stop

@section('content-status-item')
    <div>&rarr; Date time format is : YYYY-MM-DD hh:mm:ss</div>
@endsection
