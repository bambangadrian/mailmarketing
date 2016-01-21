@extends('admin.template.lte.layout.listing')

{{ $breadCrumb }}

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="rowNumber">No</th>
                <th>Number of Criteria</th>
                <th>Random Index</th>
                <th class="rowActive">Active</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            @foreach($model as $index => $row)
                <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                <tr ondblclick="window.location.href='{{ action($controllerName . '@edit', $row->getKey()) }}'">
                    <td class="rowNumber">{{ $no }}</td>
                    <td>{{ $row->Dri_NumberColumn }}</td>
                    <td>{{ $row->Dri_RandomIndex }}</td>
                    <td class="rowActive">{!! \BootstrapHelper::getIconYesNo($row->Dri_Active) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
