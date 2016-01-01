@extends('admin.template.lte.layout.listing')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-envelope"></i> Mail</li>
        <li><a href="{{ action('Admin\CampaignController@index') }}"><i class="fa fa-indent"></i> Campaign</a></li>
    </ol>
@stop

@section('data-listing')
    <table class="table table-bordered table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Type</th>
            <th>Category</th>
            <th>Topic</th>
            <th>Subject</th>
        </tr>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $row->Cpg_Name }}</td>
                <td>{{ $row->campaignType->Cgt_Name }}</td>
                <td>{{ $row->campaignTopic->Cto_Name }}</td>
                <td>{{ $row->Cpg_EmailSubject }}</td>
            </tr>
        @endforeach
    </table>
@stop
