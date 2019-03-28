@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="rowNumber">No</th>
                <th>Name</th>
                <th>Type</th>
                <th>Category</th>
                <th>Topic</th>
                <th>Subject</th>
                <th class="rowActive">Active</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            @foreach($model as $index => $row)
                <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                    <td class="rowNumber">{{ $no }}</td>
                    <td>{{ $row->Cpg_Name }}</td>
                    <td>{{ $row->campaignType->Cgt_Name }}</td>
                    <td>{{ $row->campaignCategory->Cc_Name }}</td>
                    <td>{{ $row->campaignTopic->Cto_Name }}</td>
                    <td>{{ $row->Cpg_EmailSubject }}</td>
                    <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Cpg_Active) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
