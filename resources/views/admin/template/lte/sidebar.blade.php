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
                <a href="{{ action('DashboardController@index') }}">
                    <i class="fa fa-support"></i> <span>Dashboard</span>
                </a>
            </li>
            <li @if($activeMenu === 'template')  class="active" @endif><a href="{{ action('TemplateController@index') }}"><i class="fa fa-th"></i> Template</a></li>
            <li @if($activeMenu === 'maillist')  class="active" @endif><a href="{{ action('MailListController@index') }}"><i class="fa fa-bookmark"></i> Mailing List</a>
            <li @if($activeMenu === 'subscriber')  class="active" @endif><a href="{{ action('SubscriberController@index') }}"><i class="fa fa-user-md"></i> Subscribers</a>
            <li @if($activeMenu === 'master')  class="active" @endif class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Master</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ action('ImportFromController@index') }}"><i class="fa fa-caret-right"></i> Import From</a></li>
                    <li><a href="{{ action('SegmentController@index') }}"><i class="fa fa-caret-right"></i> Segment</a></li>
                    <li><a href="{{ action('SegmentCriteriaController@index') }}"><i class="fa fa-caret-right"></i> Segment Criteria</a></li>
                    <li><a href="{{ action('TrackingStatusController@index') }}"><i class="fa fa-caret-right"></i> Tracking Status</a></li>
                    <li><a href="{{ action('UserController@index') }}"><i class="fa fa-caret-right"></i> User</a></li>
                </ul>
            </li>
            </li>
            <li @if($activeMenu === 'mail')  class="active" @endif class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Mail</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ action('CampaignController@index') }}"><i class="fa fa-caret-right"></i> Campaign</a></li>
                    <li><a href="{{ action('CampaignScheduleController@index') }}"><i class="fa fa-caret-right"></i> Scheduled Campaign</a></li>
                    <li><a href="{{ action('MailTrackingController@index') }}"><i class="fa fa-caret-right"></i> Tracking</a></li>
                </ul>
            </li>
            <li @if($activeMenu === 'report')  class="active" @endif><a href="{{ action('SentMailController@index') }}"><i class="fa fa-bar-chart"></i> Tracking Report</a></li>
            <li @if($activeMenu === 'company')  class="active" @endif><a href="{{ action('CompanyController@index') }}"><i class="fa fa-laptop"></i> Company Profile</a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>