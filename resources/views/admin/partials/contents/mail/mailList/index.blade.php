@extends('admin.template.lte.layout.listing')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-envelope"></i> Mail</li>
        <li><a href="{{ action('Admin\MailListController@index') }}"><i class="fa fa-bookmark"></i> List</a></li>
    </ol>
@stop

@section('data-listing')
    <table class="table table-bordered table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email Address</th>
            <th>Company</th>
            <th>Address</th>
        </tr>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $row->Mls_Name }}</td>
                <td>{{ $row->Mls_EmailAddressFrom }}</td>
                <td>{{ $row->Mls_CompanyName }}</td>
                <td>{{ $row->Mls_Address1 . ' ' . $row->Mls_Address2 }}</td>
            </tr>
        @endforeach
    </table>
@stop
