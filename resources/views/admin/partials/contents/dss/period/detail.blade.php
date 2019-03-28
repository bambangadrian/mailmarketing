@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
            <?php
            $lockAttribute = 'disabled';
            ?>
            <div class="row">
                <div class="col-md-6">
                    {{ $formMethodField }}
                    <div class="form-group">
                        {!! Form::label('Dss_Name', 'Dss Name', ['class' => 'required']) !!}
                        {!! Form::text('Dss_Name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Dss Name']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Dss_Description', 'Description') !!}
                        {!! Form::textarea('Dss_Description', null, ['class' => 'form-control', 'placeholder' => 'Enter Dss Description', 'rows' => 4]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Dss_StartPeriod', 'Start Period', ['class' => 'required']) !!}
                        {!! Form::text('Dss_StartPeriod', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Dss Start Period']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Dss_EndPeriod', 'End Period', ['class' => 'required']) !!}
                        {!! Form::text('Dss_EndPeriod', null, ['required', 'class' => 'form-control', 'placeholder' => 'Enter Dss End Period']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('Dss_RandomIndexID', 'Random Index') !!}
                        {!! Form::text('Dss_RandomIndexID', null, ['class' => 'form-control', $lockAttribute]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Dss_CriteriaEigenValue', 'Criteria Eigen Value') !!}
                        {!! Form::text('Dss_CriteriaEigenValue', null, ['class' => 'form-control', $lockAttribute]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Dss_CriteriaConsistencyIndex', 'Criteria Consistency Criteria') !!}
                        {!! Form::text('Dss_CriteriaConsistencyIndex', null, ['class' => 'form-control', $lockAttribute]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Dss_CriteriaConsistencyRatio', 'Criteria Consistency Ratio') !!}
                        {!! Form::text('Dss_CriteriaConsistencyRatio', null, ['class' => 'form-control', $lockAttribute]) !!}
                    </div>
                    <div class="checkbox">
                        <label for="Dss_Active">
                            {!! Form::hidden('Dss_Active', 0) !!}
                            {!! Form::checkbox('Dss_Active', 1) !!}
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
        $('#Dss_StartPeriod, #Dss_EndPeriod').daterangepicker(
                {
                    singleDatePicker: true,
                    format: 'YYYY-MM-DD'
                }
        );
    </script>
@stop

@section('content-status-item')
    <div>&rarr; Date time format is : YYYY-MM-DD hh:mm:ss</div>
@endsection