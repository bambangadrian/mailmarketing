@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="rowNumber">No</th>
                <th>Email</th>
                <th>Campaign</th>
                <th>Mailing List</th>
                <th class="rowActive">Executed</th>
                <th class="rowActive">Active</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            @foreach($model as $index => $row)
                <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                    <td class="rowNumber">{{ $no }}</td>
                    <td>{{ $row->subscriberList->subscriber->Sbr_EmailAddress }}</td>
                    <td>{{ $row->mailSchedule->campaign->Cpg_Name }}</td>
                    <td>{{ $row->subscriberList->subscriberGroup->mailList->Mls_Name . ' - ['. $row->subscriberList->subscriberGroup->Sbg_Name . ']' }}</td>
                    <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->mailSchedule->Msd_IsExecuted) !!}</td>
                    <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Sm_Active) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
