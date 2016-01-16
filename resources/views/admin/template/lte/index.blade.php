<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CBN Mail Marketing System {{ isset($pageTitle) ? ' | ' . $pageTitle: '' }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" type="image/x-ico" href="{{ asset('/assets/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset("/vendor/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/vendor/bower_components/AdminLTE/plugins/font-awesome-4.5.0/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/vendor/bower_components/AdminLTE/plugins/ionicons-2.0.1/css/ionicons.min.css") }}">
    @yield('add-css')
    <link rel="stylesheet" href="{{ asset("/vendor/bower_components/AdminLTE/dist/css/AdminLTE.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/vendor/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/assets/css/app.css") }}">
    <!--[if lt IE 9]>
    <script src="{{ asset("/vendor/bower_components/AdminLTE/plugins/respond/respond.min.js") }}"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="{{ asset("/vendor/bower_components/AdminLTE/plugins/html5shiv/html5shiv.min.js") }}"></script>
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
    @yield('content-layout')
    {{--@include('admin.template.lte.control')--}}
    @include('admin.template.lte.footer')
</div>
<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset("/vendor/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
<script src="{{ asset("/vendor/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
@yield('add-js')
<!-- Slimscroll -->
<script src="{{ asset("/vendor/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<script src="{{ asset("/vendor/bower_components/AdminLTE/dist/js/app.min.js") }}"></script>
</body>
</html>
