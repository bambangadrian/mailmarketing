@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="rowNumber">No</th>
                <th>Campaign</th>
                <th>Execution Date</th>
                <th class="rowActive">IsExecuted</th>
                <th class="rowActive">Active</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            @foreach($model as $index => $row)
                <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                    <td class="rowNumber">{{ $no }}</td>
                    <td>{{ $row->campaign->Cpg_Name }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->Msd_ExecutedDate)->format('d F Y h:i:s A') }}</td>
                    <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Msd_IsExecuted) !!}</td>
                    <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Msd_Active) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
