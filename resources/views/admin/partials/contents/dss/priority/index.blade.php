@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="rowNumber">No</th>
                <th>Name</th>
                <th>Start Period</th>
                <th>End Period</th>
                <th class="rowFloat">CI</th>
                <th class="rowFloat">CR</th>
                <th class="rowActive">Active</th>
                <th class="rowActive">Consistent</th>
                <th class="rowActive">Calculated</th>
            </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <?php
                $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++;
                $isConsistent = false;
                $isCalculated = false;
                if($row->Dss_CriteriaConsistencyRatio !== null and $row->Dss_CriteriaConsistencyRatio < 0.1){
                    $isConsistent = true;
                }
                if($row->Dss_RunOn !== null){
                    $isCalculated = true;
                }
            ?>
            <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                <td class="rowNumber">{{ $no }}</td>
                <td>{{ $row->Dss_Name }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $row->Dss_StartPeriod)->format('d F Y') }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $row->Dss_EndPeriod)->format('d F Y') }}</td>
                <td class="rowFloat">{{ $row->Dss_CriteriaConsistencyIndex or '-' }}</td>
                <td class="rowFloat">{{ $row->Dss_CriteriaConsistencyRatio or '-' }}</td>
                <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Dss_Active) !!}</td>
                <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($isConsistent) !!}</td>
                <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($isCalculated) !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop