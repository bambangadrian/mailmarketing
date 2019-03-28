@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="rowNumber">No</th>
                <th>Event</th>
                <th>Recipient</th>
                <th>IP Address</th>
                <th>Domain Sender</th>
                <th>Client Type </th>
                <th>Date Time</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            @foreach($model as $index => $row)
                <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                    <td class="rowNumber">{{ $no }}</td>
                    <td>{{ $row->Mtr_EventName }}</td>
                    <td>{{ $row->Mtr_Recipient }}</td>
                    <td>{{ $row->Mtr_IpAddress }}</td>
                    <td>{{ $row->Mtr_DomainSender }}</td>
                    <td>{{ $row->Mtr_ClientType }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->Mtr_CreatedOn)->format('d F Y h:i:s A') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
