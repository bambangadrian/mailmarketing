@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="rowNumber">No</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>Import From</th>
                <th class="rowNumber">Rating</th>
                <th class="rowActive">Active</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            @foreach($model as $index => $row)
                <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                    <td class="rowNumber">{{ $no }}</td>
                    <td>{{ $row->Sbr_EmailAddress }}</td>
                    <td>{{ $row->Sbr_FirstName . ' ' . $row->Sbr_LastName }}</td>
                    <td>{{ $row->Sbr_Address1 . ' ' . $row->Sbr_Address2 }}</td>
                    <td>{{ $row->importFrom->Imf_Name }}</td>
                    <td class="rowNumber">{{ $row->Sbr_MemberRating }}</td>
                    <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Sbr_Active) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
