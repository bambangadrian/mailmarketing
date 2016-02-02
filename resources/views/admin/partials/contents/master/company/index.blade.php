@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="rowNumber">No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th class="rowActive">Active</th>
            </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
            <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                <td class="rowNumber">{{ $no }}</td>
                <td>{{ $row->Cpy_Name }}</td>
                <td>{{ $row->Cpy_Email }}</td>
                <td>{{ $row->Cpy_WebsiteUrl }}</td>
                <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Cpy_Active) !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop