@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                <div class="row">
                    <div class="col-md-6">
                        {{ $formMethodField }}
                        <?php $calculatedFieldAttribute = 'disabled';?>
                        <div class="form-group">
                            {!! Form::label('Dcr_DssID', 'DSS Period', ['class' => 'required']) !!}
                            {!! Form::select('Dcr_DssID', $dssOptions, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Dcr_Name', 'Criteria Name',['class' => 'required']) !!}
                            {!! Form::text('Dcr_Name', null, ['class' => 'form-control', 'placeholder' => 'Enter DSS Criteria Name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Dcr_Description', 'Description') !!}
                            {!! Form::textarea('Dcr_Description', null, ['class' => 'form-control', 'placeholder' => 'Enter DSS Criteria Description', 'rows' => 3]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('Dcr_EigenVector', 'Eigen Vector') !!}
                            {!! Form::text('Dcr_EigenVector', null, ['class' => 'form-control', $calculatedFieldAttribute]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Dcr_MatrixTotal', 'Matrix Total') !!}
                            {!! Form::text('Dcr_MatrixTotal', null, ['class' => 'form-control', $calculatedFieldAttribute]) !!}
                        </div>
                        <div class="checkbox">
                            <label for="Dcr_Active">
                                {!! Form::hidden('Dcr_Active', 0) !!}
                                {!! Form::checkbox('Dcr_Active', 1) !!}
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
        $('#Dcr_DssID').select2();
    </script>
@stop