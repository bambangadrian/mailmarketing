@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            <h3>
                {{ $model->Dss_Name }} - (
                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $model->Dss_StartPeriod)->format('d F Y') }} Until
                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $model->Dss_EndPeriod)->format('d F Y') }} )
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                {{ $formMethodField }}
                @foreach($model->alternatives as $alternativeKey => $alternative)
                    {!! Form::hidden('Alternative[' . $alternativeKey . ']', $alternative->Dal_ID, ['class' => 'alternativeField']) !!}
                @endforeach
                @foreach($model->criterias as $criteriaKey => $criteria)
                    <div class="data-matrix">
                        {!! Form::hidden('Criteria[' . $criteriaKey . ']', $criteria->Dcr_ID, ['class' => 'criteriaField']) !!}
                        <h4 class="data-matrix-title">
                            <i class="fa fa-folder-open"></i>
                            {{ $criteria->Dcr_Name }}
                            <i style="color:#e8630c">(EV : {{ $criteria->Dcr_EigenVector }})</i>
                        </h4>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="table-title">Matrix</th>
                                @foreach($model->alternatives as $alternative)
                                    <th class="table-compare">
                                        {{ $alternative->Dal_Name }}
                                    </th>
                                @endforeach
                                @if(isset($hasCalculated))
                                    <th class="table-title">
                                        EV
                                    </th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            <?php $rowNumber = 0;?>
                            @foreach($model->alternatives as $alternative)
                                <tr>
                                    <?php $rowNumber++; $colNumber = 0;?>
                                    <td class="table-compare">{{ $alternative->Dal_Name }}</td>
                                    @foreach($model->alternatives as $compare)
                                        <?php
                                            $colNumber++;
                                            $cellAttribute = null;
                                            $defaultMatrixValue = null;
                                            if($rowNumber >= $colNumber){
                                                $cellAttribute = 'style="background-color: #eee;"';
                                                if($rowNumber === $colNumber){
                                                    $defaultMatrixValue = 1;
                                                }
                                            }
                                            $selectedLeftValue = 1;
                                            $selectedRightValue = 1;
                                            if(isset($leftValue[$criteria->Dcr_ID][$alternative->Dal_ID][$compare->Dal_ID]) === true and empty($leftValue[$criteria->Dcr_ID][$alternative->Dal_ID][$compare->Dal_ID]) === false){
                                                $selectedLeftValue = $leftValue[$criteria->Dcr_ID][$alternative->Dal_ID][$compare->Dal_ID];
                                            }
                                            if(isset($rightValue[$criteria->Dcr_ID][$alternative->Dal_ID][$compare->Dal_ID]) === true and empty($rightValue[$criteria->Dcr_ID][$alternative->Dal_ID][$compare->Dal_ID]) === false){
                                                $selectedRightValue = $rightValue[$criteria->Dcr_ID][$alternative->Dal_ID][$compare->Dal_ID];
                                            }
                                        ?>
                                        <td {!! $cellAttribute !!}>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    {!! \BootstrapHelper::getRatioIndexToCombo('LeftValue['.$criteria->Dcr_ID.']['.$alternative->Dal_ID.']['.$compare->Dal_ID.']', $selectedLeftValue) !!}
                                                </div>
                                                <div class="col-md-1">
                                                    :
                                                </div>
                                                <div class="col-md-5">
                                                    {!! \BootstrapHelper::getRatioIndexToCombo('RightValue['.$criteria->Dcr_ID.']['.$alternative->Dal_ID.']['.$compare->Dal_ID.']', $selectedRightValue) !!}
                                                </div>
                                            </div>
                                        </td>
                                    @endforeach
                                    @if(isset($hasCalculated))
                                        <td style="background-color: #eee;">
                                            <strong>{{ $eigen[$criteria->Dcr_ID][$alternative->Dal_ID] }}</strong>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            @if(isset($hasCalculated))
                                <tr>
                                    <td class="table-title">
                                        Total/Column
                                    </td>
                                    @foreach($model->alternatives as $alternative)
                                        <td style="background-color: #ddd;">
                                            <strong>{{ $columnTotal[$criteria->Dcr_ID][$alternative->Dal_ID] }}</strong>
                                        </td>
                                    @endforeach
                                    <td style="background-color: red">
                                        <strong style="color:white;">1</strong>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                @endforeach
                <div class="row">
                    <div class="col-xs-12">
                        @include('admin.partials.layout.form.button')
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop