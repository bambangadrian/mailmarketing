@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-database"></i> DSS</li>
        <li><a href="{{ action('Admin\Dss\DssAlternativeController@index') }}"><i class="fa fa-server"></i> Criteria</a></li>
    </ol>
@stop