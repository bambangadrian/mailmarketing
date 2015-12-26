@extends('admin.template.lte.layout.basic')

@section('content-title')
    <h3 class="box-title"></h3>

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
    @section('data-control')
        <div class="row btn-group col-sm-12" role="group" aria-label="Toolbox" style="margin-bottom:10px;">
            <a class="btn btn-flat btn-default" href="{{ action($controller.'@create') }}"><i class="fa fa-plus"></i> Insert New Record</a>
        </div>
    @show

    @yield('data-listing')

    @section('data-pagination')
        <div class="pull-right">
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

