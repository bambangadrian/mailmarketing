@extends('admin.template.lte.index')

@section('content-layout')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @section('segment-title')
                    {{ $pageHeader or 'Page Header' }}
                @show

                @section('segment-desc')
                    <small><i>{{ $pageDescription or 'Optional Description' }}</i></small>
                @show

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
            @section('content')
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                @yield('content-title')
                                @yield('content-message')
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                @yield('content-page')
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                @yield('content-status')
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            @show
        </section>
        <!-- /.content -->
    </div><!-- /.content-wrapper -->
@stop



