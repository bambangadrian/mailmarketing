@extends('admin.template.lte.layout.listing')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\UserController@index') }}"><i class="fa fa-user"></i> User Account</a></li>
    </ol>
@stop

@section('data-listing')
    <table class="table table-bordered table-hover">
        <tr>
            <th>#</th>
            <th>User Name</th>
            <th>Email</th>
        </tr>
        <?php $counter = 1; ?>
        @foreach($model as $index => $row)
            <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $row->Usr_Name }}</td>
                <td>{{ $row->Usr_Email }}</td>
            </tr>
        @endforeach
    </table>
@stop
