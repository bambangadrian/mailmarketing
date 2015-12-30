@extends('admin.template.lte.layout.listing')
@include('admin.partials.contents.dss.alternative.breadcrumb')

@section('data-listing')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="width: 20px">#</th>
                <th>Name</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            @foreach($model as $index => $row)
                <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                <tr ondblclick="window.location.href='{{ action('Admin\Dss\DssAlternativeController@edit', $row->Dal_ID) }}'">
                    <td>{{ $no }}</td>
                    <td>{{ $row->Dal_Name }}</td>
                    <td>{{ $row->Dal_Active }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop