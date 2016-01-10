@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="rowNumber">No</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Company</th>
                <th>Address</th>
                <th class="rowActive">Active</th>
            </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
            @foreach($model as $index => $row)
                <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                    <td class="rowNumber">{{ $no }}</td>
                    <td>{{ $row->Mls_Name }}</td>
                    <td>{{ $row->Mls_EmailAddressFrom }}</td>
                    <td>{{ $row->Mls_CompanyName }}</td>
                    <td>{{ $row->Mls_Address1 . ' ' . $row->Mls_Address2 }}</td>
                    <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Mls_Active) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
