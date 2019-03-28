@extends('admin.template.lte.layout.basic')

@section('content-title')
    <h3 class="box-title">
        <i class="fa fa-th-list"></i>
        {{ isset($contentTitle) ? $contentTitle : 'Listing Data' }}
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
        {!! $buttons !!}
        @if((isset($enableCreate) === false or $enableCreate === true))
            <a class="btn btn-default btn-flat  " href="{!! $createLinkAction !!}"><i class="fa fa-download"></i> New Record</a>
        @endif
    </div>

    @include('admin.template.lte.error')

    <div class="data-listing table-responsive">
        @yield('data-listing')
    </div>

    @section('data-pagination')
        @if(isset($enablePaging) === true and $enablePaging === true)
            <div class="text-center">
                {!! $model->render() !!}
            </div>
        @endif
    @show
@stop

@section('content-status')
    <div class="text-muted small">
        @if(isset($enablePaging) === true and $enablePaging === true)
            @if($model->total()>0)
                Showing {{ $model->firstItem() }}-{{ $model->lastItem() }} from {{ $model->total() }} data
            @else
                <span style="color:#a22;">Data not found !!</span>
            @endif
        @else
            {{ $contentFooterText or 'Showing Data' }}
        @endif
    </div>
@stop

