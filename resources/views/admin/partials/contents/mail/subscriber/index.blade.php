@extends('admin.template.lte.layout.listing')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-envelope"></i> Mail</li>
        <li><a href="{{ action('Admin\SubscriberController@index') }}"><i class="fa fa-user-md"></i> Subscriber</a></li>
    </ol>
@stop

@section('data-listing')
    <table class="table table-bordered table-hover">
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Active</th>
            <th>Import From</th>
        </tr>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $row->Sbr_EmailAddress }}</td>
                <td>{{ $row->Sbr_FirstName . ' ' . $row->Sbr_LastName }}</td>
                <td>{{ $row->Sbr_Address1 . ' ' . $row->Sbr_Address2 }}</td>
                <td>{{ $row->Sbr_Active }}</td>
                <td>{{ $row->importFrom->Imf_Name }}</td>
            </tr>
        @endforeach
    </table>
@stop
