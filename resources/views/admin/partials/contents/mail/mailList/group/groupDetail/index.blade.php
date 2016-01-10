@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th class="rowNumber">No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Group</th>
            <th class="rowActive">Active</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
            <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', [$row->subscriberGroup->Sbg_MailListID, $row->Sbg_ID, $row->getKey()]) }}'">
                <td class="rowNumber">{{ $no }}</td>
                <td>{{ $row->subscriber->Sbr_FirstName . ' ' . $row->subscriber->Sbr_LastName }}</td>
                <td>{{ $row->subscriber->Sbr_EmailAdress }}</td>
                <td>{{ $row->subscriberGroup->Sbg_Name }}</td>
                <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Sgd_Active) !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
