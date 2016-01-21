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
                <th class="rowActive">Active</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            @foreach($model as $index => $row)
                <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                    <td class="rowNumber">{{ $no }}</td>
                    <td>{{ $row->Dss_Name }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $row->Dss_StartPeriod)->format('d F Y') }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $row->Dss_EndPeriod)->format('d F Y') }}</td>
                    <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Dss_Active) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop