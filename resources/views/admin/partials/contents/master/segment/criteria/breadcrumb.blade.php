@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\Master\SegmentController@index') }}"><i class="fa fa-filter"></i> Segment</a></li>
        <li><a href="{{ action('Admin\Master\SegmentCriteriaController@index') }}"><i class="fa fa-code-fork"></i> Criteria</a></li>
    </ol>
@stop