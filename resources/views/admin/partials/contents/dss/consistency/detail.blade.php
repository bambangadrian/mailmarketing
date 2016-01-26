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
                <div class="data-matrix">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="table-title">Matrix</th>
                            @foreach($model->criterias as $key => $criteria)
                                <th class="table-compare">
                                    {!! Form::hidden('Criteria[' . $key . ']', $criteria->Dcr_ID, ['class' => 'criteriaField']) !!}
                                    {{ $criteria->Dcr_Name }}
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
                            @foreach($model->criterias as $criteria)
                                <tr>
                                    <?php $rowNumber++;$colNumber = 0;?>
                                    <td class="table-compare">{{ $criteria->Dcr_Name }}</td>
                                    @foreach($model->criterias as $compare)
                                        <?php
                                            $colNumber++;
                                            $fieldAttribute = [];
                                            $cellAttribute = null;
                                            $defaultMatrixValue = null;
                                            if($rowNumber >= $colNumber){
                                                $fieldAttribute = ['style' => 'border-color: red;'];
                                                $cellAttribute = 'style="background-color: #eee;"';
                                                if($rowNumber === $colNumber){
                                                    $defaultMatrixValue = 1;
                                                }
                                            }
                                            $selectedLeftValue = 1;
                                            $selectedRightValue = 1;
                                            if(isset($leftValue[$criteria->Dcr_ID][$compare->Dcr_ID]) === true and empty($leftValue[$criteria->Dcr_ID][$compare->Dcr_ID]) === false){
                                                $selectedLeftValue = $leftValue[$criteria->Dcr_ID][$compare->Dcr_ID];
                                            }
                                            if(isset($rightValue[$criteria->Dcr_ID][$compare->Dcr_ID]) === true and empty($rightValue[$criteria->Dcr_ID][$compare->Dcr_ID]) === false){
                                                $selectedRightValue = $rightValue[$criteria->Dcr_ID][$compare->Dcr_ID];
                                            }
                                        ?>
                                        <td {!! $cellAttribute !!}>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    {!! \BootstrapHelper::getRatioIndexToCombo('LeftValue['.$criteria->Dcr_ID.']['.$compare->Dcr_ID.']', $selectedLeftValue) !!}
                                                </div>
                                                <div class="col-md-1">
                                                    :
                                                </div>
                                                <div class="col-md-5">
                                                    {!! \BootstrapHelper::getRatioIndexToCombo('RightValue['.$criteria->Dcr_ID.']['.$compare->Dcr_ID.']', $selectedRightValue) !!}
                                                </div>
                                            </div>
                                        </td>
                                    @endforeach
                                    @if(isset($hasCalculated))
                                        <td style="background-color: #eee;">
                                            <strong>{{ $criteria->Dcr_EigenVector }}</strong>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            @if(isset($hasCalculated))
                                <tr>
                                    <td class="table-title">
                                        Total/Column
                                    </td>
                                    @foreach($model->criterias as $criteria)
                                        <td style="background-color: #ddd;">
                                            <strong>{{ number_format($criteria->Dcr_MatrixTotal, 8) }}</strong>
                                        </td>
                                    @endforeach
                                    <td style="background-color: red">
                                        <strong style="color:white;">{{ number_format($model->Dss_CriteriaEigenValue, 8) }}</strong>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-right">
                        @if(isset($hasCalculated))
                            <h5>
                                <i style="color: #e8630c">Consistency Index (CI) : {{ $model->Dss_CriteriaConsistencyIndex }}</i> <br />
                                <i style="color: #e8630c">Consistency Ratio (CR) : {{ $model->Dss_CriteriaConsistencyRatio }}</i>
                            </h5>

                            <h4>
                                <b>&rarr; Result : </b>
                                @if($model->Dss_CriteriaConsistencyRatio < 0.1)
                                     <i style="font-weight:bold;color:#59a600;text-decoration:underline;">Consistent</i>
                                    @else
                                    <i style="font-weight:bold;color:red;text-decoration:underline;">Not Consistent</i>
                                @endif
                            </h4>
                        @endif
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