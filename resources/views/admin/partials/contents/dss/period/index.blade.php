@extends('admin.template.lte.layout.listing')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-database"></i> DSS</li>
        <li><a href="{{ action('Admin\Dss\DssPeriodController@index') }}"><i class="fa fa-cube"></i> Period</a></li>
    </ol>
@stop

@section('data-listing')
    <table class="table table-bordered table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Period</th>
            <th>RI</th>
        </tr>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $row->Dss_Name }}</td>
                <td>{{ $row->Dss_Description }}</td>
                <td>{{ $row->Dss_StartPeriod }}</td>
                <td>{{ $row->Imf_Description }}</td>
            </tr>
        @endforeach
    </table>
@stop