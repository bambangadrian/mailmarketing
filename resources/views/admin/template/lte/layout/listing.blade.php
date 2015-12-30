@extends('admin.template.lte.layout.basic')

@section('content-title')
    <h3 class="box-title">
        <i class="fa fa-th-list"></i>
        Listing Data
    </h3>

    @section('content-search')
        <div class="box-tools">
            <div class="input-group" style="width: 200px;">
                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                <div class="input-group-btn">
                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    @show
@stop

@section('content-page')
    <div class="data-toolbar" style="margin-bottom:10px;">
        @if((isset($enableInsert) === false or $enableInsert === true))
            <a class="btn btn-default btn-flat  " href="{!! action($controllerName.'@create') !!}"><i class="fa fa-download"></i> New Record</a>
        @endif
        {!! $buttons !!}
    </div>
    <div class="data-listing">
        @yield('data-listing')
    </div>

    @section('data-pagination')
        <div class="text-center">
            {!! $model->render() !!}
        </div>
    @show
@stop

@section('content-status')
    <div class="text-muted small">
        @if($model->total()>0)
            Showing {{ $model->firstItem() }}-{{ $model->lastItem() }} from {{ $model->total() }} data
        @else
            <span style="color:#a22;">Data not found !!</span>
        @endif
    </div>
@stop

