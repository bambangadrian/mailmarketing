@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-envelope"></i> Mail</li>
        <li><a href="{{ action('Admin\Mail\CampaignController@index') }}"><i class="fa fa-indent"></i> Campaign</a></li>
    </ol>
@stop