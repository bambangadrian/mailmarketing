<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/vendor/bower_components/AdminLTE/dist/img/avatar5.png") }}" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $user->name or 'Administrator' }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Master</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Company</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> User</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Import From</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Template</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Mail</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Subscriber</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Mail List</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Group</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Group Detail</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share-alt"></i> <span>Search List</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Segment</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Segment Criteria</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Segment Detail</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Campaign</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Campaign List</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Campaign Schedule</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bookmark"></i> <span>Tracking</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Tracking Status</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Sent Mail</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Mail Tracking</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>