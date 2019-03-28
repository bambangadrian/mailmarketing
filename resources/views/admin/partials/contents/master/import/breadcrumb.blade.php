@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\Master\ImportFromController@index') }}"><i class="fa fa-folder-open-o"></i> Import From</a></li>
    </ol>
@stop
