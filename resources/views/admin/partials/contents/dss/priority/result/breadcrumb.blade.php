@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-database"></i> DSS</li>
        <li><a href="{{ action('Admin\Dss\DssPriorityController@edit', $referenceValue) }}"><i class="fa fa-sort-amount-asc"></i> Priority</a></li>
        <li><a href="{{ action('Admin\Dss\DssResultController@index', $referenceValue) }}"><i class="fa fa-th-list"></i> Ranking Result</a></li>
    </ol>
@stop