@extends('admin.template.lte.layout.basic')

@section('content-title')
    <h3 class="box-title">
        <i class="fa fa-file-text"></i>
        {{ isset($contentTitle) ? $contentTitle : 'Detail Data' }}
    </h3>
@stop

@section('content-page')
    @yield('data-form')

    @if ($errors->any())
        <div class="alert alert-danger alert-important">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="icon fa fa-warning"></i> Invalid data found
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@stop

@section('content-status')
    <div class="text-muted small">
        <i style="color:red;">* Required field, you must fill this item.</i>
    </div>
@stop

@section('sample-tabs')
    <h1>Simple Tabs</h1>
    <ul id="tabs">
        <li><a href="#java">Java</a></li>
        <li><a href="#php">PHP</a></li>
        <li><a href="#python">Python</a></li>
        <li><a href="#ruby">Ruby</a></li>
        <li><a href="#perl">Perl</a></li>
    </ul>

    <div class="tab-content">
        <div id="java" class="tab-section">
            <h2>Here we place title - Java</h2>
            <p>Here we place details </p>
        </div>
        <div id="php" class="tab-section">
            <h2>Here we place title - PHP</h2>
            <p>Here we place details </p>
        </div>
        <div id="python" class="tab-section">
            <h2>Here we place title - Python</h2>
            <p>Here we place details </p>
        </div>
        <div id="ruby" class="tab-section">
            <h2>Here we place title</h2>
            <p>Here we place details </p>
        </div>
        <div id="perl" class="tab-section">
            <h2>Here we place title</h2>
            <p>Here we place details </p>
        </div>
    </div>
@stop


@section('add-js')
    @parent
    <script>
        $(function(){
            $('.tab-section').hide();
            $('#tabs a').bind('click', function(e){
                $('#tabs a.current').removeClass('current');
                $('.tab-section:visible').hide();
                $(this.hash).show();
                $(this).addClass('current');
                e.preventDefault();
            }).filter(':first').click();
        });
    </script>
@stop

