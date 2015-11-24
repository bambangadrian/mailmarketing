<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $pageTitle or 'CBN Mail Marketing System' }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href="{{ asset('/assets/img/favicon.png') }}" >
    <link rel="stylesheet" href="{{ asset("/vendor/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset("/assets/css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("/vendor/bower_components/AdminLTE/dist/css/AdminLTE.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/vendor/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css") }}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
    @include('admin.template.lte.header')
    @include('admin.template.lte.sidebar')
    @include('admin.template.lte.content')
    {{--@include('admin.template.lte.control')--}}
    @include('admin.template.lte.footer')
</div>
<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset("/vendor/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
<script src="{{ asset("/vendor/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
<!-- Slimscroll -->
<script src="{{ asset("/vendor/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<script src="{{ asset("/vendor/bower_components/AdminLTE/dist/js/app.min.js") }}"></script>
@yield('add-css')
@yield('add-js')
</body>
</html>
