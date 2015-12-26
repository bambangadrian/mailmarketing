@extends('admin.template.lte.layout.listing')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\SegmentController@index') }}"><i class="fa fa-filter"></i> Segment</a></li>
        <li><a href="{{ action('Admin\SegmentCriteriaController@index') }}"><i class="fa fa-code-fork"></i> Criteria</a></li>
    </ol>
@stop

@section('data-listing')
    <table class="table table-bordered table-hover">
        <tr>
            <th style="width: 20px">#</th>
            <th>Criteria</th>
            <th>Active</th>
        </tr>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $row->Sc_Name }}</td>
                <td>{{ $row->Sc_Active }}</td>
            </tr>
        @endforeach
    </table>
@stop
