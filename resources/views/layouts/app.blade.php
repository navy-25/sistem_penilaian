<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>AdminLTE 3 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Font Awesome -->
        <link rel="stylesheet"
        href="../../plugins/fontawesome-free/css/all.min.css"/>
        <!-- Ionicons -->
        <link rel="stylesheet"
        href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
        <!-- icheck bootstrap -->
        <link rel="stylesheet"
        href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"/>
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
        rel="stylesheet"/>
    </head>
    <body class="hold-transition login-page" style="background: none;
        background-image: url('{{asset('../banner/004.jpg')}}');background-size: cover;background-position: center;background-repeat: no-repeat;">
        @yield('content')
        <!-- jQuery -->
        <script src="{{asset('../../plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('../../dist/js/adminlte.min.js')}}"></script>
    </body>
</html>
