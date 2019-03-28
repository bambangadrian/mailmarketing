@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="rowNumber">No</th>
                <th>User Name</th>
                <th>Email</th>
                <th class="rowActive">Active</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            @foreach($model as $index => $row)
                <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                    <td class="rowNumber">{{ $no }}</td>
                    <td>{{ $row->Usr_Name }}</td>
                    <td>{{ $row->Usr_Email }}</td>
                    <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Usr_Email) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
