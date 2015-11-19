<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $pageTitle or 'Login' }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset("/vendor/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset("/vendor/bower_components/AdminLTE/dist/css/AdminLTE.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/assets/css/login.css") }}">
    <link rel="stylesheet" href="{{ asset("/vendor/bower_components/AdminLTE/plugins/iCheck/square/blue.css") }}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <div class="login-logo">
        <a href="#" style="text-shadow: 1px 1px 1px #fff;">
            <b style="color:darkkhaki;">CBN</b> <span style="color:darkred;font-weight: bolder;">Mail Marketing</span>
        </a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">{{ $pageHeader or 'Sign in to start your session' }}</p>
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                @foreach ($errors->all() as $error)
                    {{ $error }} <br/>
                @endforeach
            </div>
        @endif
        {!! Form::open() !!}
        <div class="form-group has-feedback">
            <input type="email" name="Usr_Email" class="form-control" placeholder="Email"
                   value="{{ old('Usr_Email') }}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
        </div>
        {!! Form::close() !!}
        <a href="#">I forgot my password</a><br>
    </div>
</div>

<div class="text-muted small text-right" id="fixedCopyRight">
    <div>CopyRights&copy; : BRainsFusion Production&trade;</div>
    <div>Design Modified By : Yuh7Predators</div>
</div>

<script src="{{ asset("/vendor/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
<script src="{{ asset("/vendor/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("/vendor/bower_components/AdminLTE/plugins/iCheck/icheck.min.js") }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
</script>
</body>
</html>
