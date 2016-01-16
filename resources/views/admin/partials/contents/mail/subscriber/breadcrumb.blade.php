@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Mail</li>
        <li><a href="{{ action('Admin\Mail\SubscriberController@index') }}"><i class="fa fa-user-md"></i> Subcriber</a></li>
    </ol>
@stop