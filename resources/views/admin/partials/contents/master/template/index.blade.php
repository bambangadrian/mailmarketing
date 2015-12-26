@extends('admin.template.lte.layout.listing')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\TemplateController@index') }}"><i class="fa fa-code"></i> Template</a></li>
    </ol>
@stop

@section('data-listing')
    <table class="table table-bordered table-hover">
        <tr>
            <th style="width: 20px">#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Active</th>
        </tr>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $row->Tpl_Name }}</td>
                <td>{{ $row->Tpl_Description }}</td>
                <td>{{ $row->Tpl_Active }}</td>
            </tr>
        @endforeach
    </table>
@stop
