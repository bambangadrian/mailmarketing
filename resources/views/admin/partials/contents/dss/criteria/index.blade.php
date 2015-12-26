@extends('admin.template.lte.layout.listing')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-database"></i> DSS</li>
        <li><a href="{{ action('Admin\Dss\DssCriteriaController@index') }}"><i class="fa fa-server"></i> Criteria</a></li>
    </ol>
@stop

@section('data-listing')
    <table class="table table-bordered table-hover">
        <tr>
            <th style="width: 20px">#</th>
            <th>Name</th>
            <th>Description</th>
            <th>EV</th>
        </tr>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $row->Dcr_Name }}</td>
                <td>{{ $row->Dcr_Description }}</td>
                <td>{{ $row->Dcr_EigenVector }}</td>
            </tr>
        @endforeach
    </table>
@stop