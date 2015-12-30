@extends('admin.template.lte.index')

@section('content-layout')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.template.lte.message')
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
                        <div class="box box-solid box-primary">
                            <div class="box-header with-border">
                                @yield('content-title')
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
        @if(\DB::logging() === true)
            <section class="content-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box box-default box-solid collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-exchange"></i> Database Query Log</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                {{ \BootstrapHelper::dump(\DB::getQueryLog()) }}
                            </div>
                            <div class="box-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div><!-- /.content-wrapper -->
@stop

@section('add-css')
    @if(isset($css) === true)
        @foreach($css as $item)
            <link rel="stylesheet" href="{{ $item }}">
        @endforeach
    @endif
@stop

@section('add-js')
    @if(isset($js) === true)
        @foreach($js as $item)
            <script src="{{ $item }}"></script>
        @endforeach
    @endif
    <script>
        $(function () {
            $('div.alert').not('.alert-important').delay(5000).slideUp(300);
        });
    </script>
@stop

