@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="rowNumber">No</th>
                <th>Name</th>
                <th>Period</th>
                <th class="rowActive">Active</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            @foreach($model as $index => $row)
                <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                    <td class="rowNumber">{{ $no }}</td>
                    <td>{{ $row->Dal_Name }}</td>
                    <td>{{ $row->dss->Dss_Name . ' - (' . $row->dss->Dss_StartPeriod . ' until ' . $row->dss->Dss_EndPeriod . ')' }}</td>
                    <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Dal_Active) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop