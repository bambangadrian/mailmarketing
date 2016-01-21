@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-envelope"></i> Mail</li>
        <li><a href="{{ action('Admin\Mail\MailScheduleController@index') }}"><i class="fa fa-calendar"></i> Schedule</a></li>
    </ol>
@stop