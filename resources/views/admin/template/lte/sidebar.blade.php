<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/vendor/bower_components/AdminLTE/dist/img/avatar5.png") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->Usr_Name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
        {{--<div class="input-group">--}}
        {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
        {{--<span class="input-group-btn">--}}
        {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
        {{--</button>--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li @if($activeMenu === 'dashboard') class="active" @endif>
                <a href="{{ action('Admin\DashboardController@index') }}">
                    <i class="fa fa-support"></i> <span>Dashboard</span>
                </a>
            </li>
            <li @if($activeMenu === 'master')  class="active" @endif class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Master</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if($activeSubMenu === 'campaignType') class="active" @endif><a href="{{ action('Admin\CampaignTypeController@index') }}"><i class="fa fa-briefcase"></i> Campaign Type</a></li>
                    <li @if($activeSubMenu === 'campaignCategory') class="active" @endif><a href="{{ action('Admin\CampaignCategoryController@index') }}"><i class="fa fa-gavel"></i> Campaign Category</a></li>
                    <li @if($activeSubMenu === 'campaignTopic') class="active" @endif><a href="{{ action('Admin\CampaignTopicController@index') }}"><i class="fa fa-map"></i> Campaign Topic</a></li>
                    <li @if($activeSubMenu === 'import') class="active" @endif><a href="{{ action('Admin\ImportFromController@index') }}"><i class="fa fa-folder-open-o"></i> Import From</a></li>
                    <li @if($activeSubMenu === 'segment') class="active" @endif><a href="{{ action('Admin\SegmentController@index') }}"><i class="fa fa-filter"></i> Segment</a></li>
                    <li @if($activeSubMenu === 'segmentCriteria') class="active" @endif><a href="{{ action('Admin\SegmentCriteriaController@index') }}"><i class="fa fa-code-fork"></i> Segment Criteria</a></li>
                    <li @if($activeSubMenu === 'trackStatus') class="active" @endif><a href="{{ action('Admin\TrackingStatusController@index') }}"><i class="fa fa-tags"></i> Tracking Status</a></li>
                    <li @if($activeSubMenu === 'user') class="active" @endif><a href="{{ action('Admin\UserController@index') }}"><i class="fa fa-user"></i> User Account</a></li>
                    <li @if($activeSubMenu === 'template') class="active" @endif><a href="{{ action('Admin\TemplateController@index') }}"><i class="fa fa-code"></i> Template</a></li>
                </ul>
            </li>
            </li>
            <li @if($activeMenu === 'mail')  class="active" @endif class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Mail</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if($activeSubMenu === 'mailCampaign') class="active" @endif><a href="{{ action('Admin\CampaignController@index') }}"><i class="fa fa-indent"></i> Campaign</a></li>
                    <li @if($activeSubMenu === 'mailList') class="active" @endif><a href="{{ action('Admin\MailListController@index') }}"><i class="fa fa-bookmark"></i> Mailing List</a>
                    <li @if($activeSubMenu === 'mailSubscriber') class="active" @endif><a href="{{ action('Admin\SubscriberController@index') }}"><i class="fa fa-user-md"></i> Subscribers</a>
                    <li @if($activeSubMenu === 'mailSchedule') class="active" @endif><a href="{{ action('Admin\CampaignScheduleController@index') }}"><i class="fa fa-calendar"></i> Schedule</a></li>
                    <li @if($activeSubMenu === 'mailTracking') class="active" @endif><a href="{{ action('Admin\MailTrackingController@index') }}"><i class="fa fa-random"></i> Tracking</a></li>
                    <li @if($activeSubMenu === 'mailSent') class="active" @endif><a href="{{ action('Admin\SentMailController@index') }}"><i class="fa fa-paper-plane"></i> Sent Mail</a></li>
                    <li @if($activeSubMenu === 'mailTrackingReport') class="active" @endif><a href="{{ action('Admin\TrackingReportController@index') }}"><i class="fa fa-bar-chart"></i> Tracking Report</a></li>
                </ul>
            </li>
            <li @if($activeMenu === 'dss')  class="active" @endif class="treeview">
                <a href="#">
                    <i class="fa fa-database"></i> <span>DSS</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if($activeSubMenu === 'dssPeriod') class="active" @endif><a href="{{ action('Admin\Dss\DssPeriodController@index') }}"><i class="fa fa-cube"></i> Period Item</a></li>
                    <li @if($activeSubMenu === 'dssCriteria') class="active" @endif><a href="{{ action('Admin\Dss\DssCriteriaController@index') }}"><i class="fa fa-server"></i> Criteria</a></li>
                    <li @if($activeSubMenu === 'dssAlternative') class="active" @endif><a href="{{ action('Admin\Dss\DssAlternativeController@index') }}"><i class="fa fa-gg"></i> Alternative</a></li>
                    <li @if($activeSubMenu === 'dssConsistency') class="active" @endif><a href="{{ action('Admin\Dss\DssConsistencyController@index') }}"><i class="fa fa-arrows-alt"></i> Consistency</a></li>
                    <li @if($activeSubMenu === 'dssPriority') class="active" @endif><a href="{{ action('Admin\Dss\DssPriorityController@index') }}"><i class="fa fa-sort-amount-asc"></i> Priority</a></li>
                    <li @if($activeSubMenu === 'dssResult') class="active" @endif><a href="{{ action('Admin\Dss\DssResultController@index') }}"><i class="fa fa-th-list"></i> Result</a></li>
                    <li @if($activeSubMenu === 'randomIndex') class="active" @endif><a href="{{ action('Admin\RandomIndexController@index') }}"><i class="fa fa-rss"></i> RandomIndex</a></li>
                </ul>
            </li>
            <li @if($activeMenu === 'company')  class="active" @endif><a href="{{ action('Admin\CompanyController@index') }}"><i class="fa fa-laptop"></i> Company</a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>