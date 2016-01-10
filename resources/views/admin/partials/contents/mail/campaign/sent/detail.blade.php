@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    {!! Form::model($model, ['url' => $formAction]) !!}
    {{ $formMethodField }}
    <div class="form-group">
        {!! Form::label('Msd_CampaignID', 'Mailing List', ['class' => 'required']) !!}
        {!! Form::select('Msd_CampaignID', $mailListOptions, null, ['class' => 'form-control']) !!}
    </div>
    <div class="checkbox">
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
            {!! Form::text('Msd_ExecutedDate', null, ['required', 'class' => 'form-control pull-right active', 'placeholder' => 'Enter Schedule Date Time']) !!}
        </div>
    </div>
    @include('admin.partials.layout.form.button')
    {!! Form::close() !!}
@stop

@section('add-js')
    @parent
    <script>
        $(function(){
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
                    scheduleDateTimeElement.prop('disabled', true);
                    scheduleDateTimeElement.val(moment().format('YYYY-MM-DD HH:mm:ss'));
                }else{
                    scheduleDateTimeElement.prop('disabled', false)
                }
            });
        });
    </script>
@stop

@section('content-status-item')
    <div>&rarr; Date time format is : YYYY-MM-DD hh:mm:ss</div>
@endsection


@section('add-js')
    @parent
    <script>
        $('#Msd_CampaignID').select2({theme: 'classic'});
    </script>
@stop