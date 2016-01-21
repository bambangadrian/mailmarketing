@extends('admin.template.lte.layout.detail')

{{ $breadCrumb }}

@section('data-form')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['url' => $formAction]) !!}
                <div class="data-matrix">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="table-title">Matrix</th>
                            @foreach($model->criterias as $criteria)
                                <th class="table-compare">
                                    {!! Form::hidden('Criteria', $criteria->Dcr_ID) !!}
                                    {{ $criteria->Dcr_Name }}
                                </th>
                            @endforeach
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
                                        $fieldAttribute = null;
                                        $defaultMatrixValue = null;
                                        if($rowNumber >= $colNumber){
                                            $fieldAttribute = 'readonly';
                                            if($rowNumber === $colNumber){
                                                $defaultMatrixValue = 1;
                                            }
                                        }
                                    ?>
                                    <td>{!! Form::text('Dcd_ComparisonMatrixValue['.$criteria->Dcr_ID.']['.$compare->Dcr_ID.']', $defaultMatrixValue, ['class' => 'form-control', $fieldAttribute]) !!}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
        var i, criteriaField = $('input[name="Criteria"]'), criteriaLength = criteriaField.length;
        for(i=0;i<criteriaLength;i++){
            $('input[name^="Dcd_ComparisonMatrixValue[' + criteriaField[i].value + ']"]').each(function (index){
                var rowIndex, colIndex;
                rowIndex= criteriaField[i].value;
                colIndex = criteriaField[index].value;
                $(this).change(function(){
                    $('input[name^="Dcd_ComparisonMatrixValue[' + colIndex + '][' + rowIndex + ']"]').val(parseFloat(1/$(this).val()));
                });
            });
        }
    </script>
@stop
