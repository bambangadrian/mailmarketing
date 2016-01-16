@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\Master\CampaignTopicController@index') }}"><i class="fa fa-map"></i> Campaign Topic</a></li>
    </ol>
@stop