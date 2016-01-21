@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-database"></i> Dss</li>
        <li><a href="{{ action('Admin\Dss\DssRandomIndexController@index') }}"><i class="fa fa-rss"></i> Random Index</a></li>
    </ol>
@stop