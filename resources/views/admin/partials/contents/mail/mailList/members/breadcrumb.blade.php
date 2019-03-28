@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-envelope"></i> Mail</li>
        <li><a href="{{ action('Admin\Mail\MailListController@edit', $listID) }}"><i class="fa fa-bookmark"></i> Mailing List</a></li>
        <li><a href="{{ action('Admin\Mail\MailListMemberController@index', $listID) }}"><i class="fa fa-users"></i> Subscribers</a></li>
    </ol>
@stop