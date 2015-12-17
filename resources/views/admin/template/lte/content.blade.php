<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @section('segment-title')
                {{ $pageHeader or 'Page Header' }}
            @show

            <small>
                @section('segment-desc')
                    <i>{{ $pageDescription or 'Optional Description' }}</i>
                @show
            </small>

        </h1>
        @section('breadcrumb')
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-support"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        @show
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        @yield('content')

    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->