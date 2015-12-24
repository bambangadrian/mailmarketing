@extends('admin.template.lte.index')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-table"></i> Master</li>
        <li><a href="{{ action('Admin\UserController@index') }}"><i class="fa fa-user"></i> User Account</a></li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <div class="box-tools">
                        <div class="input-group" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <div class="row btn-group col-sm-12" role="group" aria-label="Toolbox" style="margin-bottom:10px;">
                        <a class="btn btn-flat btn-default" href="#"><i class="fa fa-plus"></i> Insert New Record</a>
                    </div>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th style="width: 20px">#</th>
                            <th>User Name</th>
                            <th>Email</th>
                        </tr>
                        <?php $counter = 1; ?>
                        @foreach($model as $index => $row)
                            <?php $no = (($model->currentPage() - 1) * $model->perPage()) + $counter++; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td> {{ $row->Usr_Name }}</td>
                                <td>
                                    {{ $row->Usr_Email }}
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-flat btn-default">Action</button>
                                        <button type="button" class="btn btn-flat btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <li><a href="#"><i class="fa fa-edit"></i> Edit</a></li>
                                            <li><a href="#"><i class="fa fa-trash-o"></i> Deactivated</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    <div class="pull-right">
                        {!! $model->render() !!}
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="text-muted small">
                        @if($model->total()>0)
                            Showing {{ $model->firstItem() }}-{{ $model->lastItem() }} from {{ $model->total() }} data
                        @else
                            <span style="color:#a22;">Data not found !!</span>
                        @endif
                    </div>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
@stop
